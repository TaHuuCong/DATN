<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CateRequest;
use App\Category;

class CateController extends Controller
{
	public function getList ()
    {
    	return view('admin.cate.list');
    }

    public function getAdd ()
    {
    	return view('admin.cate.add');
    }

    public function postAdd (CateRequest $request)
    {
    	$cate = new Category;
		$cate->name        = $request->txtCateName;
		$cate->description = $request->txtDescription;
		$cate->save();
		return redirect()->route('admin.cate.getList');
    }
}
