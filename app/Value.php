<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Value extends Model
{
    protected $table = 'values';

    protected $fillable = [ 'name','sort','images'];

    public function options()
    {
        return $this->belongsToMany('App\Option', 'option_values');
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
    public function getValueAttribute()
    {
        $locale = App::getLocale();
        $column = "value_" . $locale;
        if(empty($this->{$column})){
            $result = "нет перевода";
        }else{
            $result = $this->{$column};
        }
        return $result;
    }
    public function setValueAttribute($value)
    {
        $locale = App::getLocale();
        $column = "value_" . $locale;
        $this->attributes[$column] = $value;
    }
}
