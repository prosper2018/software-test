@extends('myorder.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>My Orders</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('user') }}">Home</a>
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
            <th>Quantity</th>
            <th>Total</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($order as $services)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $services->service_id }}</td>
            <td>{{ $services->price }}</td>
            <td>{{ $services->quantity }}</td>
            <td>{{ $services->price * $services->quantity }}</td>
            <td>{{ $services->status }}</td>
            <td>
                <form action="{{ route('order.destroy',$services->id) }}" method="POST" enctype="multipart/form-data">
   
                    <a class="btn btn-info" href="{{ route('order.show',$services->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('order.edit',$services->id) }}">edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Cancel</button>
                </form>
            </td>
        </tr>
        @endforeach
        {{-- <tr>
            <td merge="col-7"></td>
        </tr> --}}
    </table>
  
    {!! $order->links() !!}
      
@endsection