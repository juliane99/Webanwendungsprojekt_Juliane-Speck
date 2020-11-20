@extends('layouts.app')

@section('content')
<div class="container" style="text-align: center;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <h4> Welcome {{Auth::user()->name}} </h4>

                    <img src="world-map.png" alt="Responsive image">
                </div>
            </div>

            <a class="btn btn-info" href='/diaries' style="margin-top: 3em;">View Diary</a>
        </div>
    </div>
</div>
@endsection


