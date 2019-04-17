@extends('layouts.glance')
@section('tag')
    <script src="{{ asset('js/list.js') }}"></script>
@endsection
@section('title')
    List
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('ID') }}</label>
                                <div class="col-md-6">
                                    <input id="id" name="email" type="text" class="form-control"  required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" name="password" type="text" class="form-control" required>
                                </div>
                            </div>
                            <button id="insert_data">Insert</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
