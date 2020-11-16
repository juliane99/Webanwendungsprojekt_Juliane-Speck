@extends('diaries.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Travel Diary</h2>
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
            <th>Number</th>
            <th>Title</th>
            <th>Text</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($diaries as $diary)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $diary->title }}</td>
            <td>{{ $diary->body }}</td>
            <td>
                <form action="{{ route('diaries.destroy',$diary->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('diaries.show',$diary->id) }}">View</a>
    
                    <a class="btn btn-info" href="{{ route('diaries.edit',$diary->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-info">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $diaries->links() !!}
      
@endsection

