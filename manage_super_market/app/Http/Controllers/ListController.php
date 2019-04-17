<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Dao;

class ListController extends Controller
{
    //
    public function index(){
        try {
            $list = Dao::call_stored_procedure('SPC_LIST_INQ01');
            return view('list.index')
                -> with('lists', $list[0]);
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }

    public function listInsert(){
        try {
            return view('list.insert');
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }

    public function update(Request $request){
        try {
            $param = $request->all();

            $data = Dao::call_stored_procedure('SPC_LIST_ACT01', $param);

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
