@extends('layouts.glance')

@section('title')
Quản trị danh mục sản phẩm
@endsection
@section('tag')
    <script src="{{ asset('js/category.js') }}"></script>
@endsection
@section('content')
<div>
    {{--class = "container"--}}
    <h1>Quản trị danh mục sản phẩm</h1>
    <div style="margin: 20px 0">
        <label>Tên danh mục</label>
        <input type="text" value="{{$cat[0]['name']}}">
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow" id="pagination_product">
            <h4>Tổng số :</h4>
            <table class="table table-bordered" id="table-data-1">
                <thead>
                <tr>
                    <th></th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Desc</th>
                    <th>Introduction</th>
                    <th>Image</th>
                    <th>Price_Core</th>
                    <th>Price_Sale</th>
                    <th>Stock</th>
                    <th>
                        <a class="btn btn-success" id="btn-add-row-1"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </th>
                </tr>
                </thead>
                <tbody id="product_data">
                @foreach ($products as $product)
                <tr>
                    <td><input hidden class="cat_id" value="{{$cat[0]['id']}}"></td>
                    <td><input class="id" style="width: 40px" value="{{ $product['id']}}" disabled></td>
                    <td><input class="name" type="text" value="{{$product['name']}}" ></td>
                    <td><input class="desc" type="text" value="{{$product['desc']}}" ></td>
                    <td><input class="intro" type="text" value="{{$product['intro']}}" ></td>
                    <td><input class="image" type="text" value="{{$product['image']}}" ></td>
                    <td><input class="price_core" type="text" value="{{$product['price_core']}}" ></td>
                    <td><input class="price_sale" type="text" value="{{$product['price_sale']}}" ></td>
                    <td><input class="stock" type="text" style="width: 50px" value="{{$product['stock']}}"></td>
                    <td>
                        <a productId="{{ $product['id']}} " class="btn btn-danger btn-remove-row-1"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        <a updateproduct="{{ $product['id']}}" class="btn btn-warning btn-update-row-1"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

            <table class="table table-bordered hidden" id="main_row_1">
                <thead>
                <tr>
                    <th></th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Introduction</th>
                    <th>Desc</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><input hidden class="cat_id" value="{{$cat[0]['id']}}"></td>
                    <td><input class="id" id="id" style="width: 40px" value="0" hidden></td>
                    <td><input class="name" type="text" ></td>
                    <td><input class="desc" type="text" ></td>
                    <td><input class="intro" type="text"></td>
                    <td><input class="image" type="text"></td>
                    <td><input class="price_core" type="text"></td>
                    <td><input class="price_sale" type="text" ></td>
                    <td><input class="stock" type="text" style="width: 50px"></td>
                    <td>
                        <a class="btn btn-danger btn-remove-row-1"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        <a class="btn btn-warning btn-update-row-1"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <div class="mt-15 panel-footer-search pull-right pagination_product" catID = "{{$cat[0]['id']}}">
                {!!Paging::show($paging,0)!!}
            </div>
        </div>
    </div>
</div>

@endsection
