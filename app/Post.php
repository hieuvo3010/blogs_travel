<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public $timestamp = false;
    protected $fillable = [
        'title','content','image','id_category','status','summary',
    ];
    protected $primaryKey = 'id';
    protected $table = 'post';

    public function category(){
        return $this->belongsTo('App\Category', 'id_category');
    }
}
