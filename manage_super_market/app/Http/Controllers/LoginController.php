<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Dao;

class LoginController extends Controller
{
    //
    public function login(){
        return view ('auth.login');
    }

    /**
     * Dùng để đăng  nhập cho admin
     * lấy thông tin form
     */

    public function loginAdmin(Request $request){
        //validate dữ liệu đăng nhập
        $this->validate($request, array(
            'email' => 'required|email',
            'password' => 'required|min:6',

        ));

        $get_user = Dao::call_stored_procedure('SPC_get_users_ACT01');



//        var_dump( $get_user );
//        exit;

        if($request->email == $get_user['email'] && $request->password == $get_user['password']){
            return redirect()->intended(route('home'));
        }



        //Đăng nhập

        if(Auth::guard('admin')->attempt(
            ['email' => $request->email, 'password' => $request->password], $request->remember
        )){
            // Nếu đăng nhập thành công thì sẽ chuyển hướng về view dashboard
            return redirect()->intended(route('dashboard'));
        }

        return redirect()->back()->withInput($request->only('email'));
    }

    /**
     * Phương thức đăng xuất
     */
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('auth.login');
    }
}
