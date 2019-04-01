@extends('layouts.glance')

@section('title')
    Xóa danh mục sản phẩm
@endsection
@section('content')
    <div class="container">
        <h1>Xóa danh mục {{$id}}</h1>
        <div class="row">
            <div class="form-three widget-shadow">
                <form name="category" action="{{url('/category/destroy/'.$id)}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">Xác nhận xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
