@extends('layouts.index')
@section('content')
    @include('front.topad')
    <div class="top-profile mt-2 full-width" >
       <img src="/{{$category->image}}" class="mr-auto mt-4"  style="width: 100px;height: 100px">
        <div style="text-align: center" class="font-bold mt-2">{{$category->name}}</div>
        <div class="mr-auto" style="width: 542px">
            <div class="flex flex-col justify-center items-center ">
                <div style="width: 100%">
                    @foreach($list as $item)
                        <post :item="{{ $item }}"></post>
                    @endforeach
                    <div class="bulong-poll py-3" style="text-align: center;">
                        <span class="text-grey-1 font-bold" > How would you rather be broken up with? </span>
                        <div class="row mt-2">
                            <div class="col-md-6" style="padding-right: 5px; position: relative">
                                <div class="poll-item py-1" style="position: relative">
                                    Over the phone/text so I can ugly cry in peace
                                    <div class="percentbar" style="width: 18%"></div>
                                    <div class="percentbar-white" style="width: 100%; z-index: -2"></div>
                                </div>
                                <div class="bg-black border rounded absolute px-1" style="right: 8px;bottom: 4px">
                                    <span style="color: white"> 18%</span>
                                </div>

                            </div>
                            <div class="col-md-6" style="padding-left: 5px;position: relative" >
                                <div class="poll-item py-1" style="position: relative">
                                    They should have the guts to tell me to my face!
                                    <div class="percentbar-right" style="width: 82%"></div>
                                    <div class="percentbar-white" style="width: 100%; z-index: -2"></div>
                                </div>
                                <div class="bg-black border rounded absolute px-1" style="right: 18px;bottom: 4px">
                                    <span style="color: white"> 82%</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="center-ad">
                        <div class="flex ">
                            <div class="ad-line"></div>
                            Advertisement
                            <div class="ad-line"></div>
                        </div>
                        <div class="mt-3">
                            <img src="/public/allimage/ad-center.png"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
