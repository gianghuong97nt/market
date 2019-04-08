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
        </tr>
    @endforeach
    </tbody>
</table>
