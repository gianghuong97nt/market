@extends('layouts.glance')

@section('title')
    Sửa danh mục sản phẩm
@endsection
@section('content')
    <div class="container">
        <h1>Sửa danh mục {{$id}}</h1>
        <div class="row">
            <div class="form-three widget-shadow">
                <form name="category" action="{{url('/category/'.$id)}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Tên danh mục</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control1" value="{{$cat->name}}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Slug</label>
                        <div class="col-sm-8">
                            <input type="text" name="slug" class="form-control1"  value="{{$cat->slug}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Images</label>
                        <div class="col-sm-8">
                            <input type="text" name="images" class="form-control1"  value="{{$cat->images}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Intro</label>
                        <div class="col-sm-8"><textarea name="intro"  cols="50" rows="4" class="form-control1" >{{$cat->intro}}</textarea></div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Mô tả ngắn</label>
                        <div class="col-sm-8"><textarea name="desc"  cols="50" rows="4" class="form-control1">{{$cat->desc}}</textarea></div>
                    </div>

                    <div class="col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
