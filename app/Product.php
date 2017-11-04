<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['id', 'name', 'alias', 'price', 'image', 'gender', 'description', 'keyword', 'cate_id', 'brand_id', 'sport_id'];

    public function cate ()
    {
    	return $this->belongsTo('App\Category');   //1 sp thuộc về 1 loại sp
    }

    public function brand ()
    {
    	return $this->belongsTo('App\Brand');     //1 sp thuộc về 1 thương hiệu
    }

    public function sport ()
    {
    	return $this->belongsTo('App\Sport');     //1 sp thuộc về 1 môn thể thao
    }

    public function pro_image ()
    {
    	return $this->hasMany('App\ProductImage', 'id');  //1 sp có nhiều hình ảnh sp
    }

    public function pro_property ()
    {
        return $this->hasMany('App\ProductProperty');  //1 sp có nhiều thuộc tính sp
    }
}
