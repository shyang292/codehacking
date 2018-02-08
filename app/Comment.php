<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable=[
        'post_id',
        'is_active',
        'author',
        'email',
        'body',
        'photo'
    ];
    protected $upload = '/images/';

    public function post(){
        return $this->belongsTo('App\Post');
    }
    public function replies(){
        return $this->hasMany('App\CommentReply');
    }

    public function setPhotoAttribute($value){
        $this->attributes['photo'] = substr($value, strrpos($value, '/') + 1);
    }

    public function getPhotoAttribute($value){
        return $this->upload.$value;
    }
}
