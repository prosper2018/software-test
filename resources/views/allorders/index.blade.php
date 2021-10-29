@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex-center position-ref full-height">
        
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>My Orders</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('admin') }}">Home</a>
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
                            <th width="340px">Action</th>
                        </tr>
                        @foreach ($orders as $services)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $services->service->name }}</td>
                            <td>{{ $services->price }}</td>
                            <td>{{ $services->quantity }}</td>
                            <td>{{ $services->price * $services->quantity }}</td>
                            <td>{{ $services->status }}</td>
                            <td>
                                <form action="{{ route('orders.status',$services->id) }}" method="POST" enctype="multipart/form-data"> @csrf
                   
                                    <a class="btn btn-info btn-sm" href="{{ route('orders.show',$services->id) }}">Show</a>
                                    <input name="status" type="submit" value="accepted" class="btn btn-primary btn-sm">
                                    <input name="status" type="submit" value="completed" class="btn btn-success btn-sm">
                                    <input name="status" type="submit" value="rejected" class="btn btn-danger btn-sm">
                                    
                                    {{-- <a class="btn btn-primary" href="{{ route('orders.edit',$services->id) }}">Accept</a>
                                    <a class="btn btn-primary mt-sm" href="{{ route('orders.edit',$services->id) }}">Completed</a> --}}
                      
                                    {{-- <button type="submit" class="btn btn-danger">Reject</button> --}}
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        {{-- <tr>
                            <td merge="col-7"></td>
                        </tr> --}}
                    </table>
                  
                    {!! $orders->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

