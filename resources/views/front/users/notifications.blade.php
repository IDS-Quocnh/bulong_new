@extends('layouts.single')
@section('content')
    <div class="pt-2">
        <div class="jccenter " style="width: 1000px;">
            <main class="feed mt-1 mr-auto">
                <div class="flex flex-col justify-center items-center ">
                    <div style="width: 100%">
                        <div>
                           <div class="fs15 font-bold text-gray-700" style="text-align: center">
                               Your Notifications
                           </div>
                            <div class="full-width">
                                <div class="line mr-auto" style="text-align: center; display: block; width: 600px"></div>
                            </div>
                        </div>
                        <div class="mt-3">

                            @if(sizeof($listUnread) == 0 && sizeof($listRead) ==0)
                                <div style="text-align: center"> No notifications at this time</div>
                            @else
                            @foreach($listUnread as $uItem)
                            <div class="noti-mk flex bg-gray-400 px-2 py-2 noti-read" post-id="{{$uItem->id}}" style="margin-top: 2px ;cursor: pointer" >
                                <div style="width: 40px" > {{$uItem->ago}} </div>
                                @if($uItem->type=="reply-comment")
                                    <div class=""> <img src="/public/allimage/comment.png" /> </div>
                                    <div class="ml-2"> <span class="text-green-2">{{$uItem->username}} </span> replied to your comment on this
                                @endif
                                @if($uItem->type=="post-comment")
                                    <disv class=""> <img src="/public/allimage/comment.png" /> </disv>
                                    <div class="ml-2"> <span class="text-green-2">{{$uItem->username}} </span> commented your
                                @endif
                                @if($uItem->type=="mention")
                                    <disv class=""> <img src="/public/allimage/comment.png" /> </disv>
                                    <div class="ml-2"> <span class="text-green-2">{{$uItem->username}} </span> mentioned you on this
                                @endif
                                @if($uItem->type=="comment-like")
                                    <disv class=""> <img src="/public/allimage/felt.png" /> </disv>
                                    <div class="ml-2"> <span class="text-green-2">{{$uItem->username}} </span> like your comment on this
                                @endif

                                @if($uItem->type=="post-like")
                                    <disv class=""> <img src="/public/allimage/felt.png" /> </disv>
                                    <div class="ml-2"> <span class="text-green-2">{{$uItem->username}} </span> like your
                                @endif


                                <a href="/post/{{$uItem->confession_id}}"><span class="text-green-2">confession </span></a>
                                    </div>
                            </div>
                            @endforeach

                            @foreach($listRead as $rItem)
                            <div class="noti-mk flex px-2 py-2 noti-read" post-id="{{$uItem->id}}" style="margin-top: 2px ;cursor: pointer">
                                <div style="width: 40px" > {{$rItem->ago}} </div>
                                @if($rItem->type=="reply-comment")
                                    <div class=""> <img src="/public/allimage/comment.png" /> </div>
                                    <div class="ml-2"> <span class="text-green-2">{{$rItem->username}} </span> replied to your comment on this
                                @endif
                                @if($rItem->type=="post-comment")
                                    <disv class=""> <img src="/public/allimage/comment.png" /> </disv>
                                    <div class="ml-2"> <span class="text-green-2">{{$rItem->username}} </span> commented your
                                @endif
                                @if($rItem->type=="mention")
                                    <disv class=""> <img src="/public/allimage/comment.png" /> </disv>
                                    <div class="ml-2"> <span class="text-green-2">{{$rItem->username}} </span> mentioned you on this
                                @endif
                                @if($rItem->type=="comment-like")
                                    <disv class=""> <img src="/public/allimage/felt.png" /> </disv>
                                    <div class="ml-2"> <span class="text-green-2">{{$rItem->username}} </span> like your comment on this
                                @endif

                                @if($rItem->type=="post-like")
                                    <disv class=""> <img src="/public/allimage/felt.png" /> </disv>
                                    <div class="ml-2"> <span class="text-green-2">{{$rItem->username}} </span> like your
                                @endif


                                <a href="/post/{{$rItem->confession_id}}"><span class="text-green-2">confession </span></a>
                                    </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
            </main>
        </div>
    </div>
@endsection
