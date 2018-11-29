<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'title', 'task_manager', 'descriptions', 'status', 'user_task', 'slug', 'name'
    ];

    protected $primaryKey = 'id';

    public function tasks()
    {
        return $this->hasMany('App\Task', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    public function files()
    {
        return $this->belongsToMany('App\File');
    }

}
