<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'alias', 'price', 'image', 'gender', 'info', 'description', 'promotion_price', 'cate_id', 'brand_id', 'sport_id'];

    public function cate ()
    {
    	return $this->belongsTo('App\Category');   //1 sp thuộc về 1 loại sp
    }

    public function brand ()
    {
    	return $this->belongsTo('App\Brand');
    }

    public function sport ()
    {
    	return $this->belongsTo('App\Sport');
    }

    public function pro_image ()
    {
    	return $this->hasMany('App\ProductImage');  //1 sp có nhiều hình ảnh sp
    }
}
