<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $a = $_SESSION['username'];
//        echo $a;
//        die;
        $name=session()->get('users');

        return view('home')
            ->with('users',$name);
    }

    public function logout(Request $request){
        $request->session()->flush();

        return redirect()->intended(route('auth.login'));
    }
}
