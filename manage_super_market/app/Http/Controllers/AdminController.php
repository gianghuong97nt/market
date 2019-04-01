<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        return view('home');
    }

    /**
     * Phương thức trả về view dùng để đăng kí tài khoản admin
     */
    public function create(){
        return view('auth.register');
    }

    public function store(Request $request){
        //validate dữ liệu từ form đi
        $this->validate($request,array(
            'username' =>'required',
            'email' => 'required',
            'password' => 'required'
        ));

        $adminModel = new AdminModel();
        $adminModel->username = $request->username;
        $adminModel->email = $request->email;
        $adminModel->password = bcrypt($request->password);
        $adminModel->save();

        return redirect()->route('admin.auth.login');
    }
}
