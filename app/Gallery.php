<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    public $timestamps = false;

    protected $fillable = ['id','active','name'];

    public function files()
    {
        return $this->belongsToMany('App\File', 'file_gallery');
    }

}
