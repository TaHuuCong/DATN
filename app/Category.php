<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['id', 'name', 'alias', 'keyword', 'description'];

    // public $timestamps = false;

    public function product ()
    {
    	return $this->hasMany('App\Product');   //1 loại sp có nhiều sp
    }

    public function size ()
    {
    	return $this->hasMany('App\Size');   //1 loại sp có nhiều size
    }
}
