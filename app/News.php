<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = ['title', 'alias', 'summary', 'content', 'ncate_id'];

    // public $timestamps = false;

    public function news ()
    {
    	return $this->belongsTo('App\NewsCategory', 'ncate_id');
    }
}
