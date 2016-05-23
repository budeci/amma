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
use Carbon\Carbon;
use LaravelLocalization;

class Blog extends Node implements AttachableInterface
{
    use AttachableTrait;
    use Translatable;
    public $translationModel     = 'App\BlogTranslation';

    public $translatedAttributes = ['code', 'name', 'description', 'slug','text'];
    protected $primaryKey        = 'blog_id';
    public $imgPath              = 'images/uploads/blog/';
    protected $fillable = [
        'name', 'slug', 'image', 'published_at', '_lft', '_rgt', 'parent_id', 'description', 'text', 'meta_title', 'meta_description', 'meta_keyword',
    ];

    public function last(){
       return $this->latest()->published();
    }

    public function top(){
        return $this->orderBy('views','desc')->published();
    }

    public function getPublished(){
       return $this->latest()->published();
    }
    public function scopePublished($query){
        return $query->where('show',1)->where('published_at','<=',Carbon::now())->join('blog_translation', function($join)
        {
            $join->on('blogs.blog_id', '=', 'blog_translation.blog_id')
                 ->where('blog_translation.name', '!=', ' ')
                 ->where('blog_translation.locale', '=', LaravelLocalization::getCurrentLocale());
        });
    }
    public function blogTranslation()
    {
        return $this->hasMany('App\BlogTranslation');
    }
    public function getPublishedAtAttribute($date){
        $dt = Carbon::now();
        return $dt->parse($date)->format('d-m-Y');
    }
    public function setSlugAttribute($slug)
    {
        if($slug == '') $slug = str_slug(Request::get('name'));
        if($cat = self::where('slug',$slug)->first()){
            $idmax = self::max('blog_id')+1;
            if(isset($this->attributes['blog_id']))
            {
              if ($this->attributes['blog_id'] != $cat->blog_id ){
               $slug = $slug.'_'.++$idmax;
              }
            }
            else
           {
              if (self::where('slug',$slug)->count() > 0)
              $slug = $slug.'_'.++$idmax;
           }
         }
      $this->attributes['slug'] = $slug;
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

        $path = config('admin.imagesUploadDirectory').'/'.Sentinel::check()->id;
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
}
