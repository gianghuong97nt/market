<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Dao;

class CategoryController extends Controller
{
    //
    public function index(){
        try {
            $category = Dao::call_stored_procedure('[SPC_GET_CATEGORY_INQ01]');
            return view('category.index')
                -> with('cats', $category[0]);

        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }

//    public function create(){
//        $data = array();
//        return view('category.submit', $data);
//
//    }

    public function detail($id){

        $paramas = array($id);
        try {
            $product  = Dao::call_stored_procedure('[SPC_GET_CATEGORY_PRODUCT_INQ01]',$paramas);
            $category = Dao::call_stored_procedure('SPC_GET_CATEGORY_INQ02',$paramas);

//            var_dump($category);
//            die;
            return view('category.detail')
                -> with('products', $product[0])
                -> with('cat',$category[0]);

        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }


    public function delete(Request $request){
        try {
            $param = $request->all();

            $data = Dao::call_stored_procedure('SPC_PRODUCT_ACT1', $param);

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

    public function upd(Request $request){
        try {
            $param = $request->all();

            dump($param);die;

            $data = Dao::call_stored_procedure('SPC_PRODUCT_ACT02', $param);

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
