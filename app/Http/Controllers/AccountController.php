<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash, Auth;

class AccountController extends Controller
{
    function getLogin ()
    {
    	return view('user.pages.login');
    }

    function postLogin (Request $request)
    {
    	$this->validate($request,
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:20'
            ],
            [
                'email.required' => 'Vui lòng nhập email của bạn',
                'email.email' => 'Không đúng định dạng email',
                'password.required' => 'Vui lòng nhập mật khẩu của bạn',
                'password.min' => 'Mật khấu có tối thiểu 6 kí tự',
                'password.max' => 'Mật khấu có tối đa 20 kí tự'
            ]
        );

        //Lấy thông tin và so sánh với data trong DB
        $input_account = array('email' => $request->email, 'password' => $request->password);
        if (Auth::attempt($input_account, $request->has('remember_token'))) {  //nếu có tồn tại trong DB, ở đây $request->has('remember_token') tương ứng với remember_token = true, là có click vào checkbox ghi nhớ đăng nhập
            return redirect()->route('getHome');
        } else {
            return redirect()->back()->with(['flash_level' => 'danger', 'flash_message' => 'Đăng nhập không thành công !']);
        }
    }

    function getRegister ()
    {
    	return view('user.pages.register');
    }

    function postRegister (Request $request)
    {
    	$this->validate($request,
    		[
    			'email' => 'required|email|unique:users,email',
    			'name' => 'required|max:120',
    			'address' => 'required',
    			'phone' => 'required|min:10|numeric',
    			'password' => 'required|min:6|max:20',
    			're_password' => 'required|same:password'
    		],
    		[
    			'email.required' => 'Vui lòng nhập email của bạn',
    			'email.email' => 'Không đúng định dạng email',
    			'email.unique' => 'Email này đã có người sử dụng',
    			'name.required' => 'Vui lòng nhập tên đầy đủ của bạn',
    			'address.required' => 'Vui lòng nhập địa chỉ của bạn',
    			'phone.required' => 'Vui lòng nhập số điện thoại của bạn',
    			'phone.min' => 'Số điện thoại phải có ít nhất 10 chữ số',
    			'phone.numeric' => 'Số điện thoại chỉ bao gồm chữ số',
    			'password.required' => 'Vui lòng nhập mật khẩu của bạn',
    			'password.min' => 'Mật khấu có tối thiểu 6 kí tự',
                'password.max' => 'Mật khấu có tối đa 20 kí tự',
    			're_password.required' => 'Vui lòng nhập lại mật khẩu của bạn',
    			're_password.same' => 'Mật khẩu không giống nhau'
    		]
    	);

    	$user = new User;
    	$user->email = $request->email;
    	$user->name = $request->name;
    	$user->gender = $request->gender;
    	$user->address = $request->address;
    	$user->phone = $request->phone;
    	$user->password = Hash::make($request->password);
    	$user->re_password = Hash::make($request->re_password);
    	$user->save();

    	return redirect()->route('getHome');
    }

    public function postLogout ()
    {
        Auth::logout();
        return redirect()->route('getHome');
    }
}
