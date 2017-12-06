<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsCateRequest;
use App\NewsCategory;

class NewsCateController extends Controller
{
	public function getList ()
	{
		$newscate = NewsCategory::select('id', 'name', 'keyword', 'description', 'created_at', 'updated_at')->orderBy('id', 'DESC')->get()->toArray();;
		return view('admin.newscate.list', compact('newscate'));
	}
    public function getAdd ()
    {
    	return view('admin.newscate.add');
    }

    public function postAdd (NewsCateRequest $request)
    {
		$newscate              = new NewsCategory;
		$newscate->name        = $request->txtNewsCateName;
        $newscate->alias       = changeTitle($request->txtNewsCateName);
		$newscate->keyword     = $request->txtKeyword;
		$newscate->description = $request->txtDescription;
        $newscate->save();
		return redirect()->route('admin.newscate.getList')->with(['flash_level' => 'success', 'flash_message' => 'Thêm loại tin thành công !']);
    }

    public function getEdit ($id)
    {
    	$newscate = NewsCategory::find($id);
    	return view('admin.newscate.edit', compact('newscate'));
    }

    public function postEdit (Request $request)
    {
        $id = $request->id;
    	$this->validate($request,
    	  	['txtNewsCateName' => 'required'],
            ['txtNewsCateName.required' => 'Vui lòng nhập tên thể loại']
    	);
		$newscate              = NewsCategory::find($id);
		$newscate->name        = $request->txtNewsCateName;
        $newscate->alias       = changeTitle($request->txtNewsCateName);
		$newscate->keyword     = $request->txtKeyword;
		$newscate->description = $request->txtDescription;
        $newscate->save();
        return redirect()->route('admin.newscate.getList')->with(['flash_level' => 'success', 'flash_message' => 'Sửa loại tin thành công !']);
    }

    public function delete_by_id ($id)
    {
    	$newscate = NewsCategory::find($id);
    	$newscate->delete();
    }

    public function getDelete ($id)
    {
    	$this->delete_by_id($id);
    	return redirect()->route('admin.newscate.getList')->with(['flash_level' => 'success', 'flash_message' => 'Xóa loại tin thành công !']);
    }

    public function postDelete (Request $request)
    {
    	if($request->checks){
            foreach($request->checks as $item){
                $this->delete_by_id($item);
            }
            return redirect()->route('admin.newscate.getList')->with(['flash_level' => 'success', 'flash_message' => 'Xóa loại tin thành công !']);
        } else {
        	return redirect()->route('admin.newscate.getList')->with(['flash_level' => 'success', 'flash_message' => 'Không có mục nào được chọn để xóa !']);
        }
    }
}
