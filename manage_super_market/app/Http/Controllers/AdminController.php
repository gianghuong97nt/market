<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Dao;

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


        $username = $request->username;
        $email = $request->email;
        $password = bcrypt($request->password);

        $para = array($username,$email,$password);
//        var_dump($para);
//        die;
        Dao::call_stored_procedure('SPC_post_users_ACT01',$para);

        return redirect()->route('auth.login');
    }

    public function addUsername(Request $request){
        try {
            $param = $request->all();

            var_dump($param);
            exit();

            $data = Dao::call_stored_procedure('SPC_post_users_ACT01', $param);

            if ($data[0][0]['Data'] == 'Exception' || $data[0][0]['Data'] == 'EXCEPTION') { //SQL Exception
                $result = array(
                    'status' => '202',
                    'data' => $data[0],
                );
            } else if ($data[0][0]['Data'] != '') { //Data Validate
                $result = array(
                    'status' => '201',
                    'data' => array($data[0]),
                );
            } else {// OK
                $result = array(
                    'status' => '200',
                    'data' => '',
                );
            }

        } catch (Exception $e) {
            $result = array(
                'status' => 'EX',
                'data' => $e->getMessage(),
            );
        }

        return response()->json($result);
    }
}
