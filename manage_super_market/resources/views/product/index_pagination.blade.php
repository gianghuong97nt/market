
@foreach ($products as $product)
    <tr>
        <td><input class="id" style="width: 40px" value="{{ $product['id']}}" disabled></td>
        <td><input class="name" type="text" value="{{$product['name']}}" ></td>
        <td><input class="desc" type="text" value="{{$product['desc']}}" ></td>
        <td><input class="intro" type="text" value="{{$product['intro']}}" ></td>
        <td><input class="image" type="text" value="{{$product['image']}}" ></td>
        <td><input class="price_core" type="text" value="{{$product['price_core']}}" ></td>
        <td><input class="price_sale" type="text" value="{{$product['price_sale']}}" ></td>
        <td><input class="stock" type="text" value="{{$product['stock']}}"></td>
        <td>
            <a productId="{{ $product['id']}} " class="btn btn-danger btn-remove-row-1"><i class="fa fa-trash" aria-hidden="true"></i></a>
            <a updateproduct="{{ $product['id']}}" class="btn btn-warning btn-update-row-1"><i class="fa fa-pencil" aria-hidden="true"></i></a>
        </td>
    </tr>
@endforeach
