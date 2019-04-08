@extends('layouts.glance')

@section('tag')
    <script src="{{ asset('js/logout.js') }}"></script>
@endsection

@section('content')
    {{$users}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
   <button id="logout">Logout</button>
@endsection
