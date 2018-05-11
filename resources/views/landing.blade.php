@extends('layouts.layout')



@section('content')
    @include('page_banner', ['extraClass' => 'landing_banner', 'text' =>'Facial Keypoints'])
    <main id="maincontent">
        @include('banner')
    </main>
@endsection