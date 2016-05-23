<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Kalnoy\Nestedset\Node;
use Angrydeer\Attachfiles\AttachableTrait;
use Angrydeer\Attachfiles\AttachableInterface;
use Request;
use Sentinel;
use File;
use Dimsav\Translatable\Translatable;

class Page extends Node implements AttachableInterface
{
 use AttachableTrait;
 use Translatable;
 public $translationModel = 'App\PageTranslation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $translatedAttributes = ['code', 'name', 'description', 'text', 'slug'];
    public $imgPath              = 'images/uploads/pages/';

    protected $fillable = [
        'name', 'slug', '_lft', '_rgt', 'parent_id', 'description', 'text', 'meta_title', 'meta_description', 'meta_keyword', 'show_menu',
    ];
/*    public function translation($locale = null)
    {
        if ($locale == null) {
            $locale = 'ro';//App::getLocale();
        }
        return $this->hasMany('App\PageTranslation')->where('locale', '=', $locale);
    }*/
    public function headMenu(){
       return $this->where('show_menu_head',1)->published();
    }
    public function footerMenu(){
       return $this->where('show_menu_footer',1)->published();
    }
    public function collaborationMenu(){
       return $this->where('show_collaboration',1)->published();
    }
    public function scopePublished($query){
        return $query->where('show',1);
    }
    public function getPublished(){
        return $this->published();
    }    

    public function pageTranslation()
    {
        return $this->hasMany('App\PageTranslation');
    }
    public function getPhotosAttribute($value)
    {
        return array_pluck($this->attaches()->get()->toArray(), 'filename');
    }

    public function setPhotosAttribute($images)
    {
        $imgtitles = Request::get('imgtitle');
        $imgalts   = Request::get('imgalt');
        $imgdescs  = Request::get('imgdesc');
        $this->save();
        $i=0;
        foreach($images as $image)
        {
            $this->updateOrNewAttach($image, $imgtitles[$i], $imgalts[$i], $imgdescs[$i]);
            $i++;
        }

        /*
        * Очистка мусора за собой.  Функция updateOrNewAttach за собой приберает, но  могут оставаться картинки, которые не были поданы в сохранение 
        *(редактировали категорию, перебрали кучу картинок, в конце концов отменили 
        * сохранениe)
        * Для этого и нужен id админа, чтобы чистил за собой а не общую папку аплоадс
        * может в этот момент еще кто-то что-то правит.
        */

        $path  = config('admin.imagesUploadDirectory').'/'.Sentinel::check()->id;
        $files = glob(public_path($path)."/*");
        if (count($files) > 0) {
            foreach ($files as $file) {
                if (file_exists($file)) {
                    unlink($file);
                }
            }
        }


        $this->keepOnly($images);
    }


    public function getImageAttribute($value)
    {
        //add full path to image
        return '/'.$this->imgPath.$value;
    }

    public function setImageAttribute($value)
    {
        //remove file
        if (is_null($value)) {

            $image = $this->imgPath .$this->attributes['image'];
            if (File::exists($image)) {
                File::delete($image);
            }

            //clean field
            $this->attributes['image'] = null;

        } else { //add file

            //get name from path
            $imageName = last(explode('/', $value));

            //save in field only image name (without upload directory)
            $this->attributes['image'] = $imageName;

            //move image to a new directory
            if (File::exists($value)) {
                File::move($value, $this->imgPath . $imageName);
            }
        }
    }
}
