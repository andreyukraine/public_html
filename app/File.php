<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';
    protected $fillable = [
        'name', 'url', 'size',
    ];
    public function products()
    {
        return $this->hasOne('App\Product');
    }
}
