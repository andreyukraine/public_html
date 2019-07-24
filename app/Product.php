<?php

namespace App;

use App\Filters\ProductFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Product extends Model
{
    protected $table = 'product';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'active',
        'view',
        'name',
        'url',
        'title',
        'images',
        'excerpt',
        'desc',
        'prev_desc',
        'composition',
        'dose',
        'sort',
        'meta',
        'keywords'
    ];


    public function products()
    {
        return $this->hasMany('App\Product', 'id');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    public function options()
    {
        return $this->belongsToMany('App\Option', 'product_options');
    }
    public function files()
    {
        return $this->belongsToMany('App\File', 'file_product');
    }
    public function scopeFilter(Builder $query, $request)
    {
        $result = (new ProductFilter($request))->filter($query);
        return $result;
    }

    public function getRouteKeyName()
    {
        return 'url';
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
    public function getExcerptAttribute()
    {
        $locale = App::getLocale();
        $column = "excerpt_" . $locale;
        if(empty($this->{$column})){
            $result = "нет перевода";
        }else{
            $result = $this->{$column};
        }
        return $result;
    }
    public function setExcerptAttribute($value)
    {
        $locale = App::getLocale();
        $column = "excerpt_" . $locale;
        $this->attributes[$column] = $value;
    }
    public function getDescAttribute()
    {
        $locale = App::getLocale();
        $column = "desc_" . $locale;
        if(empty($this->{$column})){
            $result = "нет перевода";
        }else{
            $result = $this->{$column};
        }
        return $result;
    }
    public function setDescAttribute($value)
    {
        $locale = App::getLocale();
        $column = "desc_" . $locale;
        $this->attributes[$column] = $value;
    }
    public function getPrevDescAttribute()
    {
        $locale = App::getLocale();
        $column = "prev_desc_" . $locale;
        if(empty($this->{$column})){
            $result = "нет перевода";
        }else{
            $result = $this->{$column};
        }
        return $result;
    }
    public function setPrevDescAttribute($value)
    {
        $locale = App::getLocale();
        $column = "prev_desc_" . $locale;
        $this->attributes[$column] = $value;
    }
    public function getCompositionAttribute()
    {
        $locale = App::getLocale();
        $column = "composition_" . $locale;
        if(empty($this->{$column})){
            $result = "нет перевода";
        }else{
            $result = $this->{$column};
        }
        return $result;
    }
    public function setCompositionAttribute($value)
    {
        $locale = App::getLocale();
        $column = "composition_" . $locale;
        $this->attributes[$column] = $value;
    }
    public function getDoseAttribute()
    {
        $locale = App::getLocale();
        $column = "dose_" . $locale;

        if(empty($this->{$column})){
            $result = "нет перевода";
        }else{
            $result = $this->{$column};
        }
        return $result;
    }
    public function setDoseAttribute($value)
    {
        $locale = App::getLocale();
        $column = "dose_" . $locale;
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
    public function getTitleAttribute()
    {
        $locale = App::getLocale();
        $column = "title_" . $locale;

        if(empty($this->{$column})){
            $result = "нет перевода";
        }else{
            $result = $this->{$column};
        }
        return $result;
    }
    public function setTitleAttribute($value)
    {
        $locale = App::getLocale();
        $column = "title_" . $locale;
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


}
