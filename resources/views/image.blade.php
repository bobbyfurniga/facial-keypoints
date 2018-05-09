<form action="{{ route('store.picture') }}" method="post" enctype="multipart/form-data">
    {{--<input type="hidden" name="_token" value="{{ \Session::token() }}">--}}
    @csrf
    {{--<pre>{{ (!empty($result) ? print_r($result, 1) : '') }}</pre>--}}
    {{--<div>--}}
        {{--<input type="file" name="file">--}}
    {{--</div>--}}
    {{--<div>--}}
        {{--<button type="submit">Upload!</button>--}}
    {{--</div>--}}

    <div id="my_camera" style="width:320px; height:240px;"></div>
    <div id="my_result"></div>

    <a href="javascript:void(take_snapshot())">Take Snapshot</a>
</form>