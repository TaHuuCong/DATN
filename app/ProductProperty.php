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

    // public function editProperty ($id, $pro_id, $size, $color, $status)
    // {
    // 	DB::table('product_properties')->where('id', $id)->where('pro_id', $pro_id)->update(['size' => $size, 'color' => $color, 'status' => $status]);
    // }
}
