
    @foreach ($cats as $cat)
        <tr>
            <td scope="row">{{ $cat['id']}}</td>
            <td><a href="{{ url('/category/'.$cat['id'].'/detail') }}">{{$cat['name']}}</a></td>
            <td>{{$cat['intro']}}</td>
            <td>{{$cat['desc']}}</td>
        </tr>
    @endforeach
