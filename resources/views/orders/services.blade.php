@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('All Services') }}</div>
                <div class="card-body">
                    <div class="row">
                        @forelse ($services as $service)
                        <div class="col-md-4 mt-2 text-center" style="border: 1px solid #ccc;">
                            <img src="{{ Storage::url($service->photo) }}" class="img-thumbnail" style="width: 100%;">
                            <h4>{{ $service->name }}</h4>
                            <p>{{ $service->description }}</p>
                            <p><strong>Price: </strong> {{ $service->price }}$</p>
                                        <p class="btn-holder"><a href="{{ route('add.to.cart', $service->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                        </div>
                        @empty
                            <p>no pizza to show</p>
                        @endforelse
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



