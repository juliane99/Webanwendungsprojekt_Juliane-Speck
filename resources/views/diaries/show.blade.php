@extends('diaries.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Entry</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('diaries.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><Title></Title>:</strong>
                {{ $diary->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Body:</strong>
                {{ $diary->body }}
            </div>
        </div>
    </div>
@endsection