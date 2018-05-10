<div class="effects panel-body">

    @if(isset($effects))

        @foreach($effects as $effect)
            <div class="effect-wrapper text-center panel-body">
                <img src="{{$effect}}" alt="" class="effect">
            </div>
        @endforeach

    @endif

</div>