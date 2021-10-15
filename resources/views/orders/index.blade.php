@extends('services.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Services</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('services.create') }}"> Create New Service</a>
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
            <th>Price</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($service as $services)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $services->name }}</td>
            <td>{{ $services->price }}</td>
            <td>{{ $services->description }}</td>
            <td>
                <form action="{{ route('services.destroy',$services->id) }}" method="POST" enctype="multipart/form-data">
   
                    <a class="btn btn-info" href="{{ route('services.show',$services->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('services.edit',$services->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $service->links() !!}
      
@endsection