@extends('layouts.layout')

@section('content')

    @include('page_banner', ['extraClass' => 'edit_picture_banner', 'text' => 'Edit Pictures'])
    <main id="maincontent">
        <div class="featured">
            <div class="row">
                <div class="col-md-4 effects-container">
                    @include('options')
                </div>
                <div class="col-md-8 picture-container">
                    @include('image')
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    {{--<script language="JavaScript">--}}
    {{--Webcam.attach('#my_camera');--}}

    {{--function take_snapshot() {--}}
    {{--Webcam.snap(function (data_uri) {--}}
    {{--document.getElementById('my_result').innerHTML = '<img src="' + data_uri + '"/>';--}}
    {{--});--}}
    {{--}--}}
    {{--</script>--}}

    <script>
        window.imageUrl = '{{$image ?? null}}';
        window.imagePoints = {!! $points ?? 0!!};
    </script>

    <script src="js/draw.js"></script>
@endsection