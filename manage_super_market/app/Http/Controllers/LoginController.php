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

        $email = $request->email;
        $password = $request->password;

        $params = array(
            $email,
            $password
        );

        $get_user = Dao::call_stored_procedure('SPC_get_users_ACT01',$params);


//        var_dump( $get_user[1][0]['username']);
//        exit;

        session([
            'users'=>$get_user[1][0]['username'],
        ]);
////

//        session_start();
        if((isset($get_user[0][0]['result'])?$get_user[0][0]['result']:'') == 'ok'){

            return redirect()->intended(route('home'));
        }
        else{
            return redirect()->intended(route('auth.login'));
        }




    }

    /**
     * Phương thức đăng xuất
     */
    public function logout(){
        return redirect()->route('auth.login');
    }
}
