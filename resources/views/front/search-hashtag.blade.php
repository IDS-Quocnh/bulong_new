@extends('layouts.index')
@section('content')
    <div class="jccenter " style="width: 720px;">
        <main class="feed mt-0 mr-auto" style="width: 542px;">
            <div class="fs18" style="text-align: center">
                Search result for: {{$keyword}}
            </div>
                <div class="mt-5" style="text-align: center">
                    <a href="/search?q={{$keyword}}"><span class="text-green-2 px-3"> All </span> </a>
                    <a href="/search?q={{$keyword}}&type=confession"><span class="px-3 text-green-2"> Confession </span> </a>
                    <a href="/search-user?q={{$keyword}}&type=users"><span  class="px-3 text-green-2"> Users </span> </a>
                    <a class="text-gray-700"><span > Hashtag </span> </a>
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
                    </div>
                </div>
        </main>
    </div>
@endsection
