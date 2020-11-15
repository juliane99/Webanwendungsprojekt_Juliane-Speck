@extends('diaries.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Travel Diary</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('diaries.create') }}">Create New Entry</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-hover">
        <tr>
            <th>No</th>
            <th>title</th>
            <th>body</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($diaries as $diary)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $diary->title }}</td>
            <td>{{ $diary->body }}</td>
            <td>
                <form action="{{ route('diaries.destroy',$diary->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('diaries.show',$diary->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('diaries.edit',$diary->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $diaries->links() !!}
      
@endsection