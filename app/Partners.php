<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    protected $table = 'partners';
    public $timestamps = false;

    protected $fillable = ['id','name','addres','type', 'images', 'url', 'region'];

}
