<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;
class Partener extends Model
{
    protected $primaryKey = 'partner_id';
    public $imgPath = 'images/uploads/partener/';
    protected $fillable = [
        'name',
        'link',
        'image',
    ];
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
