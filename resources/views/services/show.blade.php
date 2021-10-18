@extends('services.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Services</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('addservices.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <img src="../{{ $addservice->photo }}" alt="Service photo" width="100" height="80">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $addservice->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                {{ $addservice->price }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $addservice->description }}
            </div>
        </div>
    </div>
@endsection