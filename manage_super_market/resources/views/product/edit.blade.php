@extends('layouts.glance')

@section('title')
    Sửa sản phẩm
@endsection
@section('content')
    <div class="container">
        <h1>Sửa sản phẩm {{$id}}</h1>
        <div class="row">
            <div class="form-three widget-shadow">
                <form name="category" action="{{url('/product/'.$id)}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Tên danh mục</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control1" value="{{$product->name}}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Catrgory Name</label>
                        <div class="col-sm-8">
                            <select name="cat_id">
                                <option value="0">Không có danh mục</option>
                                @foreach($cats as $cat)
                                    <option value="{{$cat->id}}" <?php echo ($product->cat_id == $cat->id ? 'selected':'') ?>>{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Slug</label>
                        <div class="col-sm-8">
                            <input type="text" name="slug" class="form-control1"  value="{{$product->slug}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Images</label>
                        <div class="col-sm-8">
                            <input type="text" name="images" class="form-control1"  value="{{$product->images}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Intro</label>
                        <div class="col-sm-8"><textarea name="intro"  cols="50" rows="4" class="form-control1" >{{$product->intro}}</textarea></div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Mô tả ngắn</label>
                        <div class="col-sm-8"><textarea name="desc"  cols="50" rows="4" class="form-control1">{{$product->desc}}</textarea></div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Price Core</label>
                        <div class="col-sm-8">
                            <input type="text" name="priceCore" class="form-control1"  value="{{$product->priceCore}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Price Sale</label>
                        <div class="col-sm-8">
                            <input type="text" name="priceSale" class="form-control1"  value="{{$product->priceSale}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Stock</label>
                        <div class="col-sm-8">
                            <input type="text" name="stock" class="form-control1"  value="{{$product->stock}}">
                        </div>
                    </div>

                    <div class="col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
