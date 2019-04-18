<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'shoppingcart';
    public $timestamps = false;
	protected $fillable = ['watchid','name','price','image','updated_at','created_at'];
}
