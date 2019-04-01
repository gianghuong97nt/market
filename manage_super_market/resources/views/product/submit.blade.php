@extends('layouts.glance')

@section('title')
    Thêm mới sản phẩm
@endsection
@section('content')
    <h1>Thêm mới sản phẩm</h1>
    <div class="row">
        <div class="form-three widget-shadow">
            <form name="category" action="{{url('/product')}}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Tên sản phẩm</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control1"  placeholder="Type product name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Category Name</label>
                    <div class="col-sm-8">
                       <select name="cat_id">
                           <option value="0">Không</option>
                           @foreach($cats as $cat)
                               <option value="{{$cat->id}}">{{$cat->name}}</option>
                           @endforeach
                       </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Slug</label>
                    <div class="col-sm-8">
                        <input type="text" name="slug" class="form-control1"  placeholder="Type slug name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Images</label>
                    <div class="col-sm-8">
                        <input type="text" name="images" class="form-control1"  placeholder="Image">
                    </div>
                </div>
                <div class="form-group">
                    <label for="intro" class="col-sm-2 control-label">Intro</label>
                    <div class="col-sm-8"><textarea name="intro"  cols="50" rows="4" class="form-control1"></textarea></div>
                </div>
                <div class="form-group">
                    <label for="intro" class="col-sm-2 control-label">Mô tả ngắn</label>
                    <div class="col-sm-8"><textarea name="desc" cols="50" rows="4" class="form-control1"></textarea></div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Price Core</label>
                    <div class="col-sm-8">
                        <input type="text" name="priceCore" class="form-control1"  placeholder="Nhập giá bán">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Price Sale</label>
                    <div class="col-sm-8">
                        <input type="text" name="priceSale" class="form-control1"  placeholder="Nhập giá Sale">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Stock</label>
                    <div class="col-sm-8">
                        <input type="text" name="stock" class="form-control1"  placeholder="Số lượng tỏng kho">
                    </div>
                </div>

                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-default">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
