<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Dao;

class ProductController extends Controller
{
    //
    public function index(){
        try {
            $product = Dao::call_stored_procedure('[SPC_GET_PRODUCT_INQ01]');
            return view('product.index')
                -> with('products', $product[0]);

        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }

    // update sản phẩm id exists then update (insert)
    public function update(Request $request){
        try {
            $param = $request->all();

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

    public function delete(Request $request){
        try {
            $param = $request->all();

            $data = Dao::call_stored_procedure('SPC_PRODUCT_ACT1', $param);

            if ($data[0][0]['Data'] == 'Exception' || $data[0][0]['Data'] == 'EXCEPTION') { //SQL Exception
                $result = array(
                    'status' => '202',
                    'data' => $data[0],
                );
            } else if ($data[0][0]['Data'] != '') {
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

    public function load(Request $request){
        try {
            $page = $request->page;
            $cat_id = $request->cat_id;
            $params = array($cat_id, 4,$page);

            $product = Dao::call_stored_procedure('SPC_GET_CATEGORY_PRODUCT_INQ01',$params);

            return view('product.search')
                -> with('products', $product[0]);
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }
}
