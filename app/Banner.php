<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use File;
class Banner extends Model
{
    protected $table = 'banners';
    protected $primaryKey = 'banner_id';
    public $imgPath = 'images/uploads/banners/';
    //public $timestamps = false;
/*    protected $fillable = [
        'name', 'show', 'link','image','views',
    ];*/



    public function topBanners(){
       return $this->latest()->where('showtop',1)->published();
    }

    public function middleBanners(){
       return $this->latest()->where('showmiddle',1)->published();
    }

    public function bottomBanners(){
       return $this->latest()->where('showbottom',1)->published();
    }

    public function scopePublished($query){
        return $query->where('show',1);
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
