@extends('users.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Users</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="/admin"> Home</a>
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Phone</th>
            {{-- <th>Email</th> --}}
            <th width="280px">Action</th>
        </tr>
        @foreach ($user as $users)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $users->name }}</td>
            <td>{{ $users->phone }}</td>
            {{-- <td>{{ $email->email }}</td> --}}
            <td>
                <form action="{{ route('users.destroy',$users->id) }}" method="POST" enctype="multipart/form-data">
   
                    <a class="btn btn-info" href="{{ route('users.show',$users->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('users.edit',$users->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $user->links() !!}
      
@endsection