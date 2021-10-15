@extends('services.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Services</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('services.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <img src="{{ $service->photo }}" alt="Service photo" width="500" height="600">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $service->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                {{ $service->price }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $service->description }}
            </div>
        </div>
    </div>
@endsection