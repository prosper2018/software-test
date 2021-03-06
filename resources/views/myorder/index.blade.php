@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>My Orders</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('user') }}">Home</a>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card-body">
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
            <td>{{ $services->service->name }}</td>
            <td>{{ $services->price }}</td>
            <td>{{ $services->quantity }}</td>
            <td>{{ $services->price * $services->quantity }}</td>
            <td>{{ $services->status }}</td>
            <td>
                <form action="{{ route('order.update',$services->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <a class="btn btn-info" href="{{ route('order.show',$services->id) }}">Show</a>
    
                    {{-- <a class="btn btn-primary" href="{{ route('order.edit',$services->id) }}">edit</a> --}}
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" class="form-control" />
                    <input type="hidden" name="service_id" value="{{ $services->service_id }}" class="form-control" />
                    <input type="hidden" name="price" value="{{ $services->price }}" class="form-control" />
                    <input type="hidden" name="quantity" value="{{ $services->quantity }}" class="form-control" />
                    <input type="hidden" name="status" value="cancelled" class="form-control" />
   
                   
                    {{-- @method('DELETE') --}}
      
                    <button type="submit" class="btn btn-danger">Cancel Order</button>
                </form>
            </td>
        </tr>
        @endforeach
        {{-- <tr>
            <td merge="col-7"></td>
        </tr> --}}
    </table>
    </div>
  
    {!! $order->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 

@section('content')
    <div class="row">
        
    </div>
   
    
      
@endsection