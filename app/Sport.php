<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $table = 'sports';

    protected $fillable = ['name', 'description'];

    public function product ()
    {
    	return $this->hasMany('App\Product');  //1 bộ môn có nhiều sp
    }
}
