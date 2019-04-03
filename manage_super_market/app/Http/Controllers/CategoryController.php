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

    public function create(){
        $data = array();
        return view('category.submit', $data);

    }

    public function detail($id){
        $paramas = array($id);
        try {
            $category = Dao::call_stored_procedure('[SPC_GET_CATEGORY_PRODUCT_INQ01]',$paramas);
            return view('category.detail')
                -> with('cats', $category[0]);

        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }

    public function edit($id){
        $item = CategoryModel::find($id);

        $data = array();
        $data['cat'] = $item;
        $data['id'] = $id;
        return view('category.edit', $data);

    }

    public function delete($id){
        $data = array();
        $data['id'] = $id;
        return view('category.delete', $data);

    }

    public function store(Request $request){

        $name = $request->name;
        $intro = $request->intro;
        $desc = $request->desc;

        $paramas = array($name,$intro,$desc);
        try {
            Dao::call_stored_procedure('[SPC_add_category_ACT01]',$paramas);

        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }

        return redirect('/category');
    }

    public function update(Request $request, $id){
        $input = $request->all();
        $item = CategoryModel::find($id);

        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = $input['images'];
        $item->intro = $input['intro'];
        $item->desc = $input['desc'];

        $item->save();
        return redirect('/category');
    }

    public function destroy($id){
        $item = CategoryModel::find($id);

        $item->delete();

        return redirect('/category');
    }
}
