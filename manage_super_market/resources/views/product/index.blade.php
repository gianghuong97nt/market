@extends('layouts.glance')

@section('title')
    Quản trị sản phẩm
@endsection
@section('content')
    <div class="container">
        <h1>Quản trị sản phẩm</h1>
        <div style="margin: 20px 0">
            <a href="{{url('/product/create')}}" class="btn btn-success">Thêm sản phẩm</a>
        </div>

        <div class="tables">
            <div class="table-responsive bs-example widget-shadow">
                <h4>Tổng số :</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Category name</th>
                        <th>Slug</th>
                        <th>Images</th>
                        <th>Introduce</th>
                        <th>Desc</th>
                        <th>Price Core</th>
                        <th>Price Sale</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->id}}</td>
                        <td>{{$product->slug}}</td>
                        <td>{{$product->images}}</td>
                        <td>{{$product->intro}}</td>
                        <td>{{$product->desc}}</td>
                        <td>{{$product->priceCore}}</td>
                        <td>{{$product->priceSale}}</td>
                        <td>{{$product->stock}}</td>
                        <td>
                            <a href="{{url('product/'.$product->id.'/edit')}}" class="btn btn-warning">Sửa</a>
                            <a href="{{url('product/'.$product->id.'/delete')}}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
