<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = ['path'];

    protected $upload = '/images/';

    public function getPathAttribute($value){
        return $this->upload.$value;
    }
}
