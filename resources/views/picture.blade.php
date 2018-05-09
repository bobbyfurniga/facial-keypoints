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

@section('scripts')
    <script language="JavaScript">
        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function (data_uri) {
                document.getElementById('my_result').innerHTML = '<img src="' + data_uri + '"/>';
            });
        }
    </script>
@endsection