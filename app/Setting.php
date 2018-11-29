<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    public $timestamps = false;

    protected $fillable = ['site_name','meta','keywords','title'];
}
