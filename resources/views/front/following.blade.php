@extends('layouts.index')
@section('content')
    @include('front.topad')
    <div class="top-profile mt-2 full-width" >
       <img src="/public/allimage/follower.png" class="mt-4"  style="width: 100px;height: 100px; margin-left: 305px">
        <div style="text-align: center;margin-right:70px" class="font-bold mt-2">Following</div>
        <div class="mr-auto" style="width: 700px">
            @php $i = 0; @endphp
            @foreach($list as $item)
                @if($i % 5 == 0)<div class="follower-block flex mt-3"> @endif
                    <user-block :item="{{$item}}" :showFollow="{{'true'}}"></user-block>
                    @php $i++; @endphp
                    @if($i % 5 == 0)</div> @endif
            @endforeach
            @if($i % 5 != 0)</div> @endif
        </div>
    </div>
@endsection
