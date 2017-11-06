<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SportRequest;
use App\Sport;
use App\Product;

class SportController extends Controller
{
	public function getList()
	{
		$sport = Sport::select('id', 'name', 'keyword')->orderBy('id', 'DESC')->get();
		return view('admin.sport.list', compact('sport'));
	}

    public function getAdd ()
    {
    	return view('admin.sport.add');
    }

    public function postAdd (SportRequest $request)
    {
		$sport              = new Sport;
		$sport->name        = $request->txtSportName;
		$sport->keyword 	= $request->txtKeyword;
    	$sport->save();
    	return redirect()->route('admin.sport.getList')->with(['flash_level' => 'success', 'flash_message' => 'Thêm bộ môn thành công !']);
    }

    public function getDelete ($id)
    {
    	$sport = Sport::findOrFail($id);
        $product = Product::where('sport_id', '=', $id)->get();
        foreach ($product as $pro) {
            $pro->delete();
        }
    	$sport->delete();
    	return redirect()->route('admin.sport.getList')->with(['flash_level' => 'success', 'flash_message' => 'Xóa bộ môn thành công !']);
    }

    public function getEdit ($id)
    {
    	$sport = Sport::find($id);
    	return view('admin.sport.edit', compact('sport'));
    }

    public function postEdit (Request $request, $id)
    {
    	$this->validate($request,
    		['txtSportName' => 'required', 'txtKeyword' => 'required'],
            ['txtSportName.required' => 'Vui lòng nhập tên thể loại', 'txtKeyword.required' => 'Vui lòng nhập từ khóa cho thể loại']
    	);
		$sport          = Sport::find($id);
		$sport->name    = $request->txtSportName;
		$sport->keyword = $request->txtKeyword;
    	$sport->save();
    	return redirect()->route('admin.sport.getList')->with(['flash_level' => 'success', 'flash_message' => 'Sửa bộ môn thành công !']);
    }
}
