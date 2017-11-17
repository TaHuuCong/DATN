<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SportRequest;
use App\Sport;
use App\Product;
use DB, Image, File;

class SportController extends Controller
{
	public function getList()
	{
		$sport = Sport::select('id', 'name', 'alias', 'image', 'keyword', 'description', 'created_at', 'updated_at')->orderBy('id', 'DESC')->get();
		return view('admin.sport.list', compact('sport'));
	}

    public function getAdd ()
    {
    	return view('admin.sport.add');
    }

    public function postAdd (SportRequest $request)
    {
        $file_name          = $request->file('fImages')->getClientOriginalName();
		$sport              = new Sport;
		$sport->name        = $request->txtSportName;
        $sport->alias       = changeTitle($request->txtSportName);
		$sport->keyword 	= $request->txtKeyword;
        $sport->description = $request->txtDescription;

        $img = Image::make($request->file('fImages')->getRealPath());
        $img->resize(150, 100)->save('resources/upload/images/sport/' .  $file_name);
        $sport->image = $file_name;

    	$sport->save();
    	return redirect()->route('admin.sport.getList')->with(['flash_level' => 'success', 'flash_message' => 'Thêm bộ môn thành công !']);
    }

    public function delete_by_id ($id)
    {
    	$sport = Sport::findOrFail($id);
        $product = Product::where('sport_id', '=', $id)->get();
        if (isset($product)) {
            foreach ($product as $pro) {
                $pro->delete();
            }
        }
    	$sport->delete();
    }

    public function getDelete ($id)
    {
        $this->delete_by_id($id);
        return redirect()->route('admin.sport.getList')->with(['flash_level' => 'success', 'flash_message' => 'Xóa bộ môn thành công !']);
    }

    public function postDelete (Request $request)
    {
        if($request->checks){
            foreach($request->checks as $item) {
                $this->delete_by_id($item);
            }
            return redirect()->route('admin.sport.getList')->with(['flash_level' => 'success', 'flash_message' => 'Xóa bộ môn thành công !']);
        } else {
            return redirect()->route('admin.sport.getList')->with(['flash_level' => 'success', 'flash_message' => 'Không có mục nào được chọn để xóa !']);
        }
    }

    public function getEdit ($id)
    {
    	$sport = Sport::find($id);
    	return view('admin.sport.edit', compact('sport'));
    }

    public function postEdit (Request $request, $id)
    {
    	$this->validate($request,
    		['txtSportName' => 'required', 'fImages' => 'image'],
            ['txtSportName.required' => 'Vui lòng nhập tên bộ môn', 'fImages.image' => 'File này không phải là một hình ảnh']
    	);
        $sport              = Sport::find($id);
        $sport->keyword     = $request->txtKeyword;
        $sport->description = $request->txtDescription;

        $check = DB::table('sports as sp')->where('sp.name', '=', $request->txtSportName)->count();
        if ( ($request->txtSportName == $sport->name) || (($request->txtSportName != $sport->name) && ($check < 1)) ) {
            $sport->name  = $request->txtSportName;
            $sport->alias = changeTitle($request->txtSportName);

            //để cập nhật ảnh logo mới thì cần phải: tải ảnh mới lên (lưu theo tên ảnh) -> di chuyển nó vào thư mục chứa -> xóa ảnh cũ đi
            $img_current = 'resources/upload/images/sport/' . $request->img_current;  //đường dẫn tới hình ảnh hiện tại
            if ( ! empty($request->file('fImages')) ) {
                $file_name = $request->file('fImages')->getClientOriginalName();
                $img       = Image::make($request->file('fImages')->getRealPath());
                $img->resize(150, 100)->save('resources/upload/images/sport/' .  $file_name);
                $sport->image = $file_name;

                if ( File::exists($img_current) ) {  //nếu tồn tại đường dẫn tới hình ảnh hiện tại thì xóa nó
                    File::delete($img_current);
                }
            }
            $sport->save();
            return redirect()->route('admin.sport.getList')->with(['flash_level' => 'success', 'flash_message' => 'Sửa bộ môn thành công !']);
        } else {
            return redirect()->back()->with(['flash_level' => 'danger', 'flash_message' => 'Bộ môn này đã tồn tại !']);
        }
    }
}
