@extends('diaries.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-info" href="{{ route('diaries.index') }}" style="margin-bottom: 3em;"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><Title></Title></strong>
               <h2> {{ $diary->title }} </h2>
               <p style="font-size:18px;">  {{ $diary->created_at }} </p>

            <!-- <img src="{{ Storage::url($diary->featured_image) }}" height="400" width="800" /> -->

            <!-- <img src="/storage/featured_images/{{$diary->featured_image}}" height="400" width="800" /> -->

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group" style="text-align:justify;">
                <strong></strong>
                {{ $diary->body }}
            </div>
        </div>
        <button onclick="window.print()" type="button" class="btn btn-outline-info">Print this Entry</button>
    </div>
@endsection

