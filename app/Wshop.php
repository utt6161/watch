<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wshop extends Model
{
    protected $table = 'watches';
    public $timestamps = false;
	protected $fillable = ['watchid','name','price','image','updated_at','created_at'];
}


