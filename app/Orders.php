<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    public $timestamps = false;
	protected $fillable = ['watchids','watchname','price','quantity','name','email','phone','updated_at','created_at'];
}
