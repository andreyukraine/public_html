<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Option extends Model
{
    protected $table = 'option';
    protected $fillable = ['name', 'type', 'sort'];


    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    public function values()
    {
        return $this->belongsToMany('App\Value', 'option_values');
    }

    public function products(){
        return $this->belongsToMany('App\Product');
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
}

