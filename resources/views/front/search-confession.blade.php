@extends('layouts.index')
@section('content')
    <div class="jccenter " style="width: 720px;">
        <main class="feed mt-0 mr-auto" style="width: 542px;">
            <div class="fs18" style="text-align: center">
                Search result for: {{$keyword}}
            </div>

            <div class="mt-5" style="text-align: center">
                <a href="/search?q={{$keyword}}"><span class="text-green-2 px-3"> All </span> </a>
                <a ><span class="px-3 text-gray-700"> Confession </span> </a>
                <a href="/search-user?q={{$keyword}}&type=users"><span  class="px-3 text-green-2"> Users </span> </a>
                <a href="/search-list-hashtag?q={{$keyword}}&type=hastTag"><span  class="px-3 text-green-2"> Hashtag </span> </a>
            </div>
            @if(!isset($showConfession))
            <div class="bg-white px-2 py-2 rounded mt-5" style="border: 1px solid #d4d4d4">
                <div class="font-bold text-gray-500"> Users:</div>
                <div class="ml-0 mt-3 mb-1">
                    <div class="flex">
                        @if(sizeof($userList) == 0)
                            no result is found with your keyword
                        @endif
                        @foreach($userList as $user)
                        <user-block-search :item="{{$user}}" style="margin:0 23px"></user-block-search>
                        @endforeach
                    </div>
                    @if(sizeof($userList) == 5)
                    <div style="text-align: center" class="mt-3">
                        <a><span class="text-green-2 font-bold"> See all</span></a>
                    </div>
                    @endif
                </div>
            </div>

            <div class="bg-white px-2 py-2 rounded mt-4" style="border: 1px solid #d4d4d4">
                <div class="font-bold text-gray-500"> Hashtag:</div>
                <div class="ml-2 mt-3 mb-1">
                    <div class="hashtag-search" style="word-wrap: break-word">
                        @if(sizeof($hashTagList) == 0)
                            no result is found with your keyword
                        @endif
                        @foreach($hashTagList as $hashTag)
                            <a href="{{route('search-hashtag',$hashTag->name)}}"><span class="text-green-1">#{{$hashTag->name}} </span></a>
                        @endforeach
                    </div>
                    @if(sizeof($hashTagList) == 15)
                    <div style="text-align: center" class="mt-3">
                        <a><span class="text-green-2 font-bold"> See all</span></a>
                    </div>
                    @endif
                </div>
            </div>
            @endif
            <div class="mt-4">
                <div class="font-bold text-gray-500"> Confession:</div>
                @if(sizeof($confessionList) == 0)
                    no result is found with your keyword
                @endif

                @foreach($confessionList as $item)
                    <post :item="{{ $item }}"></post>
                @endforeach
            </div>
        </main>
    </div>
@endsection
