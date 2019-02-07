@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard1</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        You are logged in! <br><br> <a class="btn btn-success" href="{{ route('matchstats') }}">Continue
                            to your data...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        localStorage.access_token = '{{$token}}';
    </script>
@endsection
