<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProductProperty extends Model
{
    protected $table = 'product_properties';

    protected $fillable = ['id', 'pro_id', 'size', 'color', 'status'];

    public function product ()
    {
    	return $this->belongsTo('App\Product');
    }

}
