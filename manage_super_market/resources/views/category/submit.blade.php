@extends('layouts.glance')

@section('title')
    Thêm mới danh mục sản phẩm
@endsection
@section('content')
    <div class="container">
        <h1>Thêm mới danh mục sản phẩm</h1>
        <div class="row">
            <div class="form-three widget-shadow">
                <form name="category" action="{{url('/category')}}" method="post" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Tên danh mục</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control1"  placeholder="Default Input">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Intro</label>
                        <div class="col-sm-8"><textarea name="intro"  cols="50" rows="4" class="form-control1"></textarea></div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Mô tả ngắn</label>
                        <div class="col-sm-8"><textarea name="desc"  cols="50" rows="4" class="form-control1"></textarea></div>
                    </div>

                    <div class="col-sm-offset-2">
                        <button type="submit" class="btn btn-success">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
