@extends('layouts.glance')

@section('title')
Quản trị danh mục sản phẩm
@endsection
@section('content')
<div class="container">
    <h1>Quản trị danh mục sản phẩm</h1>
    <div style="margin: 20px 0">
        <label>Tên danh mục</label>
        <input type="text" value="{{$cat[0]['name']}}">
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số :</h4>
            <table class="table table-bordered" id="table-data-1">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Introduction</th>
                    <th>Desc</th>
                    <th>Image</th>
                    <th>Price_Core</th>
                    <th>Price_Sale</th>
                    <th>Stock</th>
                    <th>
                        <a class="btn btn-success" id="btn-add-row-1"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                <tr>
                    <td scope="row"><input type="text" value="{{ $product['id']}}"></td>
                    <td><input type="text" value="{{ $product['name']}}"></td>
                    <td><input type="text" value="{{$product['intro']}}"></td>
                    <td><input type="text" value="{{$product['desc']}}"></td>
                    <td><input type="text" value="{{$product['image']}}"></td>
                    <td><input type="text" value="{{$product['price_core']}}"></td>
                    <td><input type="text" value="{{$product['price_sale']}}"></td>
                    <td><input type="text" value="{{$product['stock']}}"></td>
                    <td>
                        <a class="btn btn-danger btn-remove-row-1"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

            <table class="table table-bordered hidden" id="main_row_1">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Introduction</th>
                    <th>Desc</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td scope="row"><input type="text" ></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td>
                        <a class="btn btn-danger btn-remove-row-1"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="{{ asset('js/category.js') }}"></script>
@endsection
