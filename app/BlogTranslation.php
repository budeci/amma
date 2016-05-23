<?php
namespace App;
use \Cartalyst\Sentinel\Users\EloquentUser;
use Request;
class BlogTranslation extends EloquentUser {
    protected $table      = 'blog_translation';
    public $timestamps    = false;

    protected $fillable = [
        'blog_id',
        'locale',
        'name',
        'description',
        'text',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];

/*    protected $hidden = [
        'category_id',
        'language_id',
    ];*/

    public function setSlugAttribute($slug)
    {
        if($slug=='') $slug = str_slug(Request::get('name'));
        if($cat= self::where('slug',$slug)->first()){
            $idmax=self::max('id')+1;
            if(isset($this->attributes['id']))
            {
              if ($this->attributes['id'] != $cat->id ){
               $slug=$slug.'_'.++$idmax;
              }
            }
            else
           {
              if (self::where('slug',$slug)->count() > 0)
              $slug=$slug.'_'.++$idmax;
           }
         }
      $this->attributes['slug']=$slug;
    }

}



