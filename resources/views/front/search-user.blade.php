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
                <a ><span  class="px-3 text-gray-700 "> Users </span> </a>
                <a href="/search-list-hashtag?q={{$keyword}}&type=hastTag"><span  class="px-3 text-green-2"> Hashtag </span> </a>
            </div>
            <div class="bg-white px-2 py-2 rounded mt-5" style="border: 1px solid #d4d4d4">
                <div class="font-bold text-gray-500"> Users:</div>
                <div class="ml-0 mt-3 mb-1">
                    <div class="">
                        @if(sizeof($userList) == 0)
                            no result is found with your keyword
                        @endif
                        @php $i= 0; @endphp
                        @foreach($userList as $user)
                        @if($i % 4 == 0) <div class="row flex"> @endif
                            <user-block-search :item="{{$user}}" style="margin:0 23px; width:85px; margin-bottom : 20px"></user-block-search>
                        @php $i= $i +1; @endphp
                        @if($i % 4 == 0) </div> @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
