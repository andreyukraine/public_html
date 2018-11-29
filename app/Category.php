<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Category extends Model
{
    //
    protected $fillable = ['name', 'parent_id', 'slug', 'title', 'meta', 'keywords', 'description'];

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function childs() {

        return $this->hasMany('App\Category','parent_id','id') ;

    }
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
    public function tasks()
    {
        return $this->belongsToMany('App\Task');
    }
    public function options()
    {
        return $this->belongsToMany('App\Option');
    }

    public function getNameAttribute()
    {
        $locale = App::getLocale();
        $column = "name_" . $locale;
        if(empty($this->{$column})){
            $result = "нет перевода";
        }else{
            $result = $this->{$column};
        }
        return $result;
    }
    public function setNameAttribute($value)
    {
        $locale = App::getLocale();
        $column = "name_" . $locale;
        $this->attributes[$column] = $value;
    }

    public function getKeywordsAttribute()
{
    $locale = App::getLocale();
    $column = "keywords_" . $locale;
    if(empty($this->{$column})){
        $result = "нет перевода";
    }else{
        $result = $this->{$column};
    }
    return $result;
}
    public function setKeywordsAttribute($value)
    {
        $locale = App::getLocale();
        $column = "keywords_" . $locale;
        $this->attributes[$column] = $value;
    }

    public function getMetaAttribute()
    {
        $locale = App::getLocale();
        $column = "meta_" . $locale;
        if(empty($this->{$column})){
            $result = "нет перевода";
        }else{
            $result = $this->{$column};
        }
        return $result;
    }
    public function setMetaAttribute($value)
    {
        $locale = App::getLocale();
        $column = "meta_" . $locale;
        $this->attributes[$column] = $value;
    }

    public function getDescriptionAttribute()
    {
        $locale = App::getLocale();
        $column = "description_" . $locale;
        if(empty($this->{$column})){
            $result = "нет перевода";
        }else{
            $result = $this->{$column};
        }
        return $result;
    }
    public function setDescriptionAttribute($value)
    {
        $locale = App::getLocale();
        $column = "description_" . $locale;
        $this->attributes[$column] = $value;
    }

}
