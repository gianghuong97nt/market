@extends('layouts.glance')

@section('title')
    Quản trị danh mục sản phẩm
@endsection
@section('content')
    <div class="container">
        <h1>Quản trị danh mục sản phẩm</h1>
        <div style="margin: 20px 0">
            <a href="{{url('/category/create')}}" class="btn btn-success">Thêm danh mục</a>
        </div>

        <div class="tables">
            <div class="table-responsive bs-example widget-shadow">
                <h4>Tổng số :</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th>Introduction</th>
                        <th>Desc</th>
                        <th>note</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($cats as $cat)
                        <tr>
                            <th scope="row">{{ $cat->id }}</th>
                            <td>{{ $cat->name }}</td>
                            <td>{{ $cat->slug }}</td>
                            <td>{{ $cat->images }}</td>
                            <td>{{ $cat->intro }}</td>
                            <td>{{ $cat->desc }}</td>
                            <td>
                                <a href="{{ url('/category/'.$cat->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                                <a href="{{ url('/category/'.$cat->id.'/delete') }}" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $cats->links() }}
            </div>
        </div>
    </div>
@endsection
