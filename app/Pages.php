<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Pages extends Model
{
    protected $table = 'pages';

    protected $fillable = [
        'id',
        'active',
        'name',
        'url',
        'title',
        'desc',
        'meta',
        'keywords'
    ];

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
}
