<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    protected $fillable = ['name', 'image', 'keyword', 'description'];

    public function product ()
    {
    	return $this->hasMany('App\Product');   //1 thương hiệu có nhiều sp
    }

}
