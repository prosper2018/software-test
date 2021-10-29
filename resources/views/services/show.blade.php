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
                                <h2> Show Services</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('addservices.index') }}"> Back</a>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <img src="{{ Storage::url($addservice->photo) }}" alt="Service photo" width="100" height="80">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

