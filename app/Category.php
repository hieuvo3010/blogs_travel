<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public $timestamp = false;
    protected $fillable = [
        'title','status',
    ];
    protected $primaryKey = 'id';
    protected $table = 'category';

    public function post(){
        return $this->hasMany('App\Post');
    }
}
