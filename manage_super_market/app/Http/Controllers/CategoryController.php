<?php

namespace App\Http\Controllers;

use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Helpers\Dao;

class CategoryController extends Controller
{
    //hiện thị trang danh mục sản phẩm, mặc định là trang đầu tiên
    public function index(){
        try {

            $category = Dao::call_stored_procedure('[SPC_GET_CATEGORY_INQ01]');
            return view('category.index')
                -> with('cats', $category[0])
                -> with('paging', $category[1][0]);
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }

    //load các danh mục cảu các trang
    public function load(Request $request){
        try {
            $page = $request->page;
            $params = array(4,$page);
            $category = Dao::call_stored_procedure('SPC_GET_CATEGORY_INQ01',$params);

            return view('category.index_pagination')
                -> with('cats', $category[0]);
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }

    //hiện thị trang chi tiết sản phẩm, mặc định là trang đầu tiên
    public function detail($id){

        $params = array($id,4,1);
        $data   = array($id);
        try {
            $product  = Dao::call_stored_procedure('[SPC_GET_CATEGORY_PRODUCT_INQ01]',$params);
            $category = Dao::call_stored_procedure('SPC_GET_CATEGORY_INQ02',$data);

            return view('category.detail')
                -> with('cat',$category[0])
                -> with('products', $product[0])
                -> with('paging', $product[1][0]);

        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }


    //load các sản phẩm của các trang
    public function loadProduct(Request $request){
        try {
            $page = $request->page;
            $cat_id = $request->cat_id;
            $params = array($cat_id, 4,$page);

            $product = Dao::call_stored_procedure('SPC_GET_CATEGORY_PRODUCT_INQ01',$params);

            return view('product.index_pagination')
                -> with('products', $product[0]);
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



    public function upd(Request $request){
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


}
