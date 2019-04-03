<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Dao;

class ProductController extends Controller
{
    //
    public function index(){
        try {
            $product = Dao::call_stored_procedure('[SPC_get_product_ACT01]');
            return view('product.index')
                -> with('products', $product[0]);

        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }


        //$items = ProductModel::all();
//        $items = DB::table('products')->paginate(5);
//        $data = array();
//        $data['products'] = $items;
//        return view('product.index', $data);
    }

    public function create(){
        $cats = CategoryModel::all();
        $data = array();
        $data['cats'] = $cats;
        return view('product.submit', $data);

    }

    public function edit($id){
        $item = ProductModel::find($id);
        $cats = CategoryModel::all();

        $data = array();
        $data['product'] = $item;
        $data['cats'] = $cats;
        $data['id'] = $id;
        return view('product.edit', $data);

    }

    public function delete($id){
        $data = array();
        $data['id'] = $id;
        return view('product.delete', $data);

    }

    public function store(Request $request){
        $input = $request->all();

        $item = new ProductModel();

        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = $input['images'];
        $item->intro = $input['intro'];
        $item->desc = $input['desc'];
        $item->priceCore = $input['priceCore'];
        $item->priceSale = $input['priceSale'];
        $item->stock = $input['stock'];
        $item->cat_id = $input['cat_id'];

        $item->save();
        return redirect('/product');
    }

    public function update(Request $request, $id){
        $input = $request->all();
        $item = ProductModel::find($id);

        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = $input['images'];
        $item->intro = $input['intro'];
        $item->desc = $input['desc'];
        $item->priceCore = $input['priceCore'];
        $item->priceSale = $input['priceSale'];
        $item->stock = $input['stock'];
        $item->cat_id = $input['cat_id'];

        $item->save();
        return redirect('/product');
    }

    public function destroy($id){
        $item = ProductModel::find($id);

        $item->delete();

        return redirect('/product');
    }
}
