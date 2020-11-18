@extends('layouts.app')

@section('content')
<div class="container" style="text-align: center;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <img src="home-screen.jpg" alt="Responsive image">
                </div>
            </div>

            <a class="btn btn-info" href='/diaries' style="margin-top: 3em;">View Diary</a>
        </div>
    </div>
</div>
@endsection


