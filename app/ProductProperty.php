<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    protected $table = 'product_properties';

    protected $fillable = ['id', 'pro_id', 'size', 'color', 'p_price'];

    public function product ()
    {
    	return $this->belongsTo('App\Product');
    }
}
