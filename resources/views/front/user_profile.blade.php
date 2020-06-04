@extends('layouts.index')
@section('content')
    @include('front.topad')
    <div class="top-profile mt-2 full-width" >
        <div class="avarta full-width" style="text-align: center">

            <user-block :item="{{$item}}"></user-block>
            <div class="px-1 mt-2 mr-auto " style="width: 542px; text-align: center">
                {{isset($item->think) ? $item->think : "“no bio shared at this time”"}}
            </div>
            <div class="px-1 mt-2 mr-auto " style="width: 542px;">
                @foreach($list as $item_list)
                <post :item="{{$item_list}}"></post>
                @endforeach
            </div>






        </div>
    </div>
@endsection
