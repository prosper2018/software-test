@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex-center position-ref full-height">
        
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>My Order</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <img src="{{ Storage::url($orders->service->photo) }}" alt="Service photo" width="250" height="300">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {{ $orders->service->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description:</strong>
                                {{ $orders->service->description }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Price:</strong>
                                {{ $orders->price }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Quantity:</strong>
                                {{ $orders->quantity }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Total:</strong>
                                {{ $orders->price * $orders->quantity }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Status:</strong>
                                {{ $orders->status }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
