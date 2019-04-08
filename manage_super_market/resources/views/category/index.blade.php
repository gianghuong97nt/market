@extends('layouts.glance')
@section('tag')
    <script src="{{ asset('js/ajax.js') }}"></script>
    <script src="{{ asset('js/category.js') }}"></script>
@endsection
@section('title')
    Quản trị danh mục sản phẩm
@endsection
@section('content')

    <div class="container">
        <h1>Quản trị danh mục sản phẩm</h1>
        <div style="margin: 20px 0">
            <a class="btn btn-success">Thêm danh mục</a>
        </div>
        <div class="tables">
            <div class="table-responsive bs-example widget-shadow" id="pagination">
                <h4>Tổng số :</h4>
                <table class="table table-bordered" id="table-data-1">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Introduction</th>
                        <th>Desc</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($cats as $cat)
                        <tr>
                            <td scope="row">{{ $cat['id']}}</td>
                            <td><a href="{{ url('/category/'.$cat['id'].'/detail') }}">{{$cat['name']}}</a></td>
                            <td>{{$cat['intro']}}</td>
                            <td>{{$cat['desc']}}</td>
                            {{--<td>--}}
                                {{--<a class="btn btn-warning" id="btn-add-row-1">Thêm</a>--}}
                                {{--<a class="btn btn-danger btn-remove-row-1">Xóa</a>--}}
                            {{--</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>



            </div>
            <div class="col-md-12">
                {{--<div class="col-md-2" style="margin-top: 30px;">--}}
                {{--<label class="lbl-item">Total: {{$data[1][0]['totalRecord']}} records </label>--}}
                {{--</div>--}}
                <div class="mt-15 panel-footer-search pull-right">
                    {!!Paging::show($paging,0)!!}
                </div>
            </div>
        </div>
    </div>


@endsection
