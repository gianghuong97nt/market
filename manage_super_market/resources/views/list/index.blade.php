@extends('layouts.glance')
@section('tag')
    <script src="{{ asset('js/back.js') }}"></script>
@endsection

@section('title')
    List
@endsection
@section('content')

    <div>
        <div class="tables">
            <div class="table-responsive bs-example widget-shadow" >
                <table class="table table-bordered" id="table-data-1">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody id="body_data">
                    @foreach ($lists as $list)
                        <tr>
                            <td scope="row">{{ $list['id']}}</td>
                            <td>{{$list['name']}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <button id="back">Back</button>
            </div>

        </div>
    </div>


@endsection
