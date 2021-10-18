@extends('orders.layout')
   
@section('content')
    
<div class="row">
    @foreach($services as $service)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="{{ $service->photo }}" alt="">
                <div class="caption">
                    <h4>{{ $service->name }}</h4>
                    <p>{{ $service->description }}</p>
                    <p><strong>Price: </strong> {{ $service->price }}$</p>
                    <p class="btn-holder"><a href="{{ route('add.to.cart', $service->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
    
@endsection