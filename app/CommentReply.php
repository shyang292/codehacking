<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    //
    protected $fillable=[
        'comment_id',
        'is_active',
        'author',
        'email',
        'body',
        'photo'
    ];
    protected $upload = '/images/';
    public function comment(){
        return $this->belongsTo('App\Comment');
    }

    public function setPhotoAttribute($value){
        $this->attributes['photo'] = substr($value, strrpos($value, '/') + 1);
    }

    public function getPhotoAttribute($value){
        return $this->upload.$value;
    }
}
