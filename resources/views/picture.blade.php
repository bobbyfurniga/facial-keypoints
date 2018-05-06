@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('options')
            </div>
            <div class="col-md-8">
                @include('image')
            </div>
        </div>
    </div>
@endsection