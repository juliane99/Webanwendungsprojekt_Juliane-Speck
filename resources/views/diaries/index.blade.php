@extends('diaries.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-info" href="{{ route('diaries.create') }}" style="margin-bottom: 3em;">Create New Entry</a>
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
            <th>Date</th>
            <th>Title</th>
            <th>Text</th>
            <th width="280px">Options</th>
        </tr>
        @foreach ($diaries as $diary)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $diary->updated_at }}</td>
            <td>{{ $diary->title }}</td>
            <td>{{ substr($diary->body, 0,  50) }}</td>
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

