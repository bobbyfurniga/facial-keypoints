<div class="picture-control">
    <div class="panel picture-wrapper">
        <div class="panel-body">
            <div class="picture-holder text-center">
                @if(isset($image))
                    <img src="{{$image}}" alt="" class="picture">
                @else
                    <img src="images/default.png" alt="" class="picture">
                @endif
            </div>
        </div>

    </div>

    <div class="row buttons-container">
        <div class="col-md-4 text-center">
            <a href="" class="btn btn-default picture-buttons" data-toggle="modal" data-target="#uploadModal">Browse
                picture</a>
        </div>

        <div class="col-md-4 text-center">
            <a href="" class="btn btn-default picture-buttons">Identify</a>
        </div>

        <div class="col-md-4 text-center">
            <a href="" id="download-btn" class="btn btn-default picture-buttons">Download</a>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="uploadModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('store.picture') }}" method="post" enctype="multipart/form-data">
                    {{--                    <input type="hidden" name="_token" value="{{ \Session::token() }}">--}}
                    @csrf
                    {{--<pre>{{ (!empty($result) ? print_r($result, 1) : '') }}</pre>--}}
                    <div>
                        <input type="file" name="upload_photo">
                    </div>
                    <div>
                        <button type="submit">Upload!</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
{{--<form action="{{ route('store.picture') }}" method="post" enctype="multipart/form-data">--}}
{{--<input type="hidden" name="_token" value="{{ \Session::token() }}">--}}
{{--@csrf--}}
{{--<pre>{{ (!empty($result) ? print_r($result, 1) : '') }}</pre>--}}
{{--<div>--}}
{{--<input type="file" name="file">--}}
{{--</div>--}}
{{--<div>--}}
{{--<button type="submit">Upload!</button>--}}
{{--</div>--}}
{{--<div id="my_camera" style="width:320px; height:240px;"></div>--}}
{{--<div id="my_result"></div>--}}

{{--<a href="javascript:void(take_snapshot())">Take Snapshot</a>--}}
{{----}}
{{--</form>--}}

