<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Bulong</title>
    <link href="/public/allimage/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/icons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/styles.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/jquery.emojipicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/jquery.emojipicker.tw.css')}}">
    <script type="text/javascript" src="{{ asset('public/js/jquery-3.x-git.min.js') }}"></script>
</head>
<body style="" cz-shortcut-listen="true" class="fs14 bg-main">

@php

      $online =  App\Model\Online::query()->where("user_id","=",auth()->user()->id)->whereRaw( DB::raw('DATE(created_at) = curdate()'))->first();
      if(!isset($online)){
            $stas = App\Model\Stat::query()->whereRaw( DB::raw('DATE(created_at) = curdate()'))->first();
            if(!isset($stas)){
                $stas = new App\Model\Stat;
            }
            $stas->online ++;
            $stas->save();
            $online = new App\Model\Online;
            $online->user_id = auth()->user()->id;
            $online->save();
      }


        $listUnread = App\Model\Notification::query()
                    ->leftJoin("users","users.id","=","notifications.from_user_id")
                    ->where("is_read","=",0)
                    ->where("to_user_id","=", auth()->user()->id)
                    ->where("from_user_id","!=", auth()->user()->id)
                    ->orderBy("notifications.id","desc")
                    ->get(['notifications.id','notifications.type', 'notifications.created_at','notifications.confession_id', "users.username"]);

        $listRead = App\Model\Notification::query()
                    ->leftJoin("users","users.id","=","notifications.from_user_id")
                    ->where("is_read","=",1)
                    ->where("to_user_id","=", auth()->user()->id)
                    ->where("from_user_id","!=", auth()->user()->id)
                    ->orderBy("notifications.id","desc")
                    ->get(['notifications.id','notifications.type', 'notifications.created_at','notifications.confession_id', "users.username"]);


        $categoryList = \App\Model\Categories::all();

@endphp
<div id="app">
    <header class="bg-white" style="position: fixed;top:0; z-index:999; width: 100%; max-height: 60px">
        <div class="flex justify-between items-center pt-1 lg:px-32 mr-auto" style="max-width :1380px ;margin-top: -10px">
            <div><a href="/"><img src="/public/allimage/logo.png" class="w-32" style="margin-left: -30px"></a></div>
            <div class="hidden lg:block ml-64 mt-4">
                <form method="GET" action="/search"><input type="text" name="q"
                                                           placeholder=" Search..." value=""
                                                           class=" text-center border rounded bg-main fs12">
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="flex items-center text-gray-600">

            </div>

            <div class="flex items-center text-gray-600">
                <div class="flex mr-16">
                    <a class="pl-1 pr-2" href="/">
                        <img src="/public/allimage/icon-home.png" style="height: 22px"/>
                    </a>
                    <div class="dropdown pr-2">
                        <a class="" href="#" data-toggle="dropdown">
                            <div class="text-3xl relative inline">
                                <img src="/public/allimage/ring.png" style="height: 22px"/>
                                <span
                                    class="absolute t-0 r-0 -ml-4 mt-2 bg-gray-600 h-4 w-4 rounded-full text-xs text-center text-white fs11" style="top:-10px;right: -25px">{{sizeof($listUnread) <100 ? sizeof($listUnread) : "99"}}</span>
                            </div>
                        </a>
                        <ul class="dropdown-menu text-green-1 dropdown-menu-center" style="background-color: #F3F3F3; width: 250px;word-wrap: break-word">
                            <li class="bg-white fs12 text-green-1">
                                <p href="/category/corporis-sed-sit-rerum-omnis#" class="rounded-t py-2 px-6 block text-gray-700 mb-0">
                                    <span class="fs20">Notiﬁcations</span>
                                    <br>
                                    <span class="fs16">Unread</span>
                                    </p>
                            </li>
                            @if(sizeof($listUnread) == 0 && sizeof($listRead) == 0)
                                No notification at this time
                            @else
                            @if(isset($listUnread[0]))
                            <li class="bg-white fs12 text-green-1 noti-read" style="cursor: pointer">
                                @php $rItem = $listUnread[0] @endphp
                                <div class="bg-gray-400 flex pl-2 hover:bg-white noti-read" post-id="{{$rItem->id}}">
                                    @if($rItem->type=="reply-comment")
                                        <img src="/public/allimage/comment-noti.png" class="mt-3" style="height:20px"/>
                                    @endif
                                    @if($rItem->type=="post-comment")
                                        <img src="/public/allimage/comment-noti.png" class="mt-3" style="height:20px"/>
                                    @endif
                                    @if($rItem->type=="mention")
                                        <img src="/public/allimage/comment-noti.png" class="mt-3" style="height:20px"/>
                                    @endif
                                    @if($rItem->type=="comment-like")
                                        <img src="/public/allimage/felt.png"  class="mt-3" style="height:20px"/>
                                    @endif

                                    @if($rItem->type=="post-like")
                                        <<img src="/public/allimage/felt.png"  class="mt-3" style="height:20px"/>
                                    @endif

                                    <a h class="py-2 px-2 block">
                                        <span class="text-green-1">{{$rItem->username}}</span>

                                        @if($rItem->type=="reply-comment")
                                            <span class="ml-2">replied to your comment on this
                                        @endif
                                        @if($rItem->type=="post-comment")
                                            <span class="ml-2"> commented your
                                        @endif
                                        @if($rItem->type=="mention")
                                            <span class="ml-2"> mentioned you on this
                                        @endif
                                        @if($rItem->type=="comment-like")
                                            <span class="ml-2"> like your comment on this
                                        @endif

                                        @if($rItem->type=="post-like")
                                            <span class="ml-2">like your
                                        @endif
                                        <span class="text-green-1">confession</span>
                                    </a>
                                </div>
                            </li>
                            @endif
                            @if(isset($listUnread[1]))
                            <li class="bg-white fs12 text-green-1 noti-read" style="cursor: pointer">
                                @php $rItem = $listUnread[1] @endphp
                                <div class="bg-gray-400 flex pl-2 hover:bg-white noti-read" post-id="{{$rItem->id}}">
                                    @if($rItem->type=="reply-comment")
                                        <img src="/public/allimage/comment-noti.png" class="mt-3" style="height:20px"/>
                                    @endif
                                    @if($rItem->type=="post-comment")
                                        <img src="/public/allimage/comment-noti.png" class="mt-3" style="height:20px"/>
                                    @endif
                                    @if($rItem->type=="mention")
                                        <img src="/public/allimage/comment-noti.png" class="mt-3" style="height:20px"/>
                                    @endif
                                    @if($rItem->type=="comment-like")
                                        <img src="/public/allimage/felt.png"  class="mt-3" style="height:20px"/>
                                    @endif

                                    @if($rItem->type=="post-like")
                                        <<img src="/public/allimage/felt.png"  class="mt-3" style="height:20px"/>
                                    @endif

                                    <a h class="py-2 px-2 block">
                                        <span class="text-green-1">{{$rItem->username}}</span>

                                        @if($rItem->type=="reply-comment")
                                            <span class="ml-2">replied to your comment on this
                                        @endif
                                        @if($rItem->type=="post-comment")
                                            <span class="ml-2"> commented your
                                        @endif
                                        @if($rItem->type=="mention")
                                            <span class="ml-2"> mentioned you on this
                                        @endif
                                        @if($rItem->type=="comment-like")
                                            <span class="ml-2"> like your comment on this
                                        @endif

                                        @if($rItem->type=="post-like")
                                            <span class="ml-2">like your
                                        @endif
                                        <span class="text-green-1">confession</span>
                                    </a>
                                </div>
                            </li>
                            @endif
                            <li class="bg-white fs12 text-green-1">
                                <p href="/category/corporis-sed-sit-rerum-omnis#" class="rounded-t py-2 px-6 block text-gray-700 mb-0">
                                    <span class="fs16">Read</span>
                                </p>
                            </li>
                                @if(isset($listRead[0]))
                            <li class="bg-white fs12 text-green-1 hover:bg-gray-400 noti-read" style="cursor: pointer">
                                @php $rItem = $listRead[0] @endphp
                                <div class="flex pl-2 hover:bg-gray-400" post-id="{{$rItem->id}}">
                                    @if($rItem->type=="reply-comment")
                                        <img src="/public/allimage/comment-noti.png" class="mt-3" style="height:20px"/>
                                    @endif
                                    @if($rItem->type=="post-comment")
                                        <img src="/public/allimage/comment-noti.png" class="mt-3" style="height:20px"/>
                                    @endif
                                    @if($rItem->type=="mention")
                                        <img src="/public/allimage/comment-noti.png" class="mt-3" style="height:20px"/>
                                    @endif
                                    @if($rItem->type=="comment-like")
                                        <img src="/public/allimage/felt.png"  class="mt-3" style="height:20px"/>
                                    @endif

                                    @if($rItem->type=="post-like")
                                        <<img src="/public/allimage/felt.png"  class="mt-3" style="height:20px"/>
                                    @endif

                                    <a h class="py-2 px-2 block">
                                        <span class="text-green-1">{{$rItem->username}}</span>

                                        @if($rItem->type=="reply-comment")
                                            <span class="ml-2">replied to your comment on this
                                        @endif
                                                @if($rItem->type=="post-comment")
                                                    <span class="ml-2"> commented your
                                        @endif
                                                        @if($rItem->type=="mention")
                                                            <span class="ml-2"> mentioned you on this
                                        @endif
                                                                @if($rItem->type=="comment-like")
                                                                    <span class="ml-2"> like your comment on this
                                        @endif

                                                                        @if($rItem->type=="post-like")
                                                                            <span class="ml-2">like your
                                        @endif
                                        <span class="text-green-1">confession</span>
                                    </a>
                                </div>
                            </li>
                            @endif
                            @if(isset($listRead[1]))
                            <li class="bg-white fs12 text-green-1 hover:bg-gray-400 noti-read" style="cursor: pointer">
                                @php $rItem = $listRead[1] @endphp
                                <div class="flex pl-2 hover:bg-gray-400" post-id="{{$rItem->id}}">
                                    @if($rItem->type=="reply-comment")
                                        <img src="/public/allimage/comment-noti.png" class="mt-3" style="height:20px"/>
                                    @endif
                                    @if($rItem->type=="post-comment")
                                        <img src="/public/allimage/comment-noti.png" class="mt-3" style="height:20px"/>
                                    @endif
                                    @if($rItem->type=="mention")
                                        <img src="/public/allimage/comment-noti.png" class="mt-3" style="height:20px"/>
                                    @endif
                                    @if($rItem->type=="comment-like")
                                        <img src="/public/allimage/felt.png"  class="mt-3" style="height:20px"/>
                                    @endif

                                    @if($rItem->type=="post-like")
                                        <<img src="/public/allimage/felt.png"  class="mt-3" style="height:20px"/>
                                    @endif

                                    <a h class="py-2 px-2 block">
                                        <span class="text-green-1">{{$rItem->username}}</span>

                                        @if($rItem->type=="reply-comment")
                                            <span class="ml-2">replied to your comment on this
                                        @endif
                                                @if($rItem->type=="post-comment")
                                                    <span class="ml-2"> commented your
                                        @endif
                                                        @if($rItem->type=="mention")
                                                            <span class="ml-2"> mentioned you on this
                                        @endif
                                                                @if($rItem->type=="comment-like")
                                                                    <span class="ml-2"> like your comment on this
                                        @endif

                                                                        @if($rItem->type=="post-like")
                                                                            <span class="ml-2">like your
                                        @endif
                                        <span class="text-green-1">confession</span>
                                    </a>
                                </div>
                            </li>
                            @endif
                            @endif
                        </ul>
                    </div>
                    <div class="pl-1 pr-1" class="dropdown relative inline-block">
                        <div class="dropdown">
                            <a class="" href="#" data-toggle="dropdown"><img src="/public/allimage/icon_ok.png" style="height: 22px">
                            </a>
                            <ul class="dropdown-menu text-green-1 dropdown-menu-center" style="background-color: #F3F3F3;">
                                @if(auth()->user()->is_admin)
                                <li class="bg-white fs12 text-green-1"><a href="/admincp"
                                                                          class="rounded-t hover:bg-gray-400 py-2 px-6 block whitespace-no-wrap text-green-1">Admin panel</a>
                                </li>
                                @endif

                                <li class="bg-white fs12 text-green-1"><a href="/user/{{auth()->user()->username}}"
                                                                          class="rounded-t hover:bg-gray-400 py-2 px-6 block whitespace-no-wrap text-green-1">View
                                        profile</a>
                                </li>
                                <li class="bg-white fs12 text-green-1" style="margin-top: 1px"><a href="/user-edit"
                                       class="rounded-t hover:bg-gray-400 py-2 px-6 block whitespace-no-wrap text-green-1">Edit
                                        profile</a>
                                </li>
                                <li class="bg-white fs12 text-green-1" style="margin-top: 1px"> <a href="/logout"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                       class="hover:bg-gray-400 py-2 px-6 block whitespace-no-wrap text-green-1">Log out</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
                <a href="/">
                    <div class="bg-red flex" style="padding: 5px 25px 5px 20px; margin-top: 28px">
                        <img src="/public/allimage/heart.png" style="height: 18px"/>
                        <div style="color: white" class="ml-2 fs14">
                            SUPPORT US
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </header>

    <aside class="sticky top-0 overflow-y-auto left-bar disable-scrollbars scroll-wrapper" style="left:45px; position: fixed; width: 250px;height:100vh; overflow: scroll">
        <div style="height: 60px"></div>
        <a href="{{route('user',Auth::user()->username)}}" >
            <div class="flex flex-col justify-center items-center">
                <img src="/{{Auth::user()->avatar}}"
                     class="h-10 w-10 rounded-full">
                <h1 class="mt-1 text-gray-700 mb-1">{{Auth::user()->username}}</h1>
            </div>
        </a>
        <div class="mt-3 pt-3 pr-6 pl-3 border rounded bg-white">
            <a href="{{route('user',Auth::user()->username)}}" class="mb-3 flex items-center">
                <img
                    src="/public/allimage/message-in-a-bottle.png" class="mr-3 w-8 h-8">
                <h2 class="text-gray-600">My Confessions</h2>
            </a>
            <a
                href="{{route('my-felt-confession')}}" class="mb-3 flex items-center">
                <img
                    src="/public/allimage/love-letter.png" class="mr-3 w-8 h-8">
                <h2 class="text-gray-600">My Felt Confessions</h2>
            </a>
            <a
                href="/followings" class="mb-3 flex items-center">
                <img
                    src="/public/allimage/follower.png" class="mr-3 w-8 h-8">
                @php
                    $following = App\Model\User::query()
                    ->join("follower", "users.id","=","follower.user_follow_id")
                    ->where('user_id','=',auth()->user()->id)
                    ->get();
                @endphp

                <h2 class="text-gray-600">Following [{{sizeof($following)}}]</h2>
            </a>
            <a
                href="/followers" class="mb-3 flex items-center">
                <img
                    src="/public/allimage/user.png" class="mr-3 w-8 h-8">
                @php
                    $follower = App\Model\User::query()
                    ->join("follower", "users.id","=","follower.user_id")
                    ->where('user_follow_id','=',auth()->user()->id)
                    ->get();
                @endphp
                <h2 class="text-gray-600">Followers [{{sizeof($follower)}}]</h2>
            </a>
        </div>
        <div class="mt-3 flex flex-col text-gray-600 border rounded bg-white">

            <h3 class="text-gray-700 mb-4 px-6 mt-3 ">Categories</h3>
            @foreach($categoryList as $item)
                <a
                    href="/category/{{$item->slug}}"
                    class="px-3 mb-3 flex">
                    <img src="/{{$item->image}}"
                         class="mr-3 w-8 h-8">
                    <h2>{{$item->name}}</h2>
                </a>
            @endforeach
        </div>
    </aside>

    <aside class="sticky top-0 overflow-y-auto right-bar disable-scrollbars scroll-wrapper-r" style="position:fixed;height:100vh; right:15px;overflow: scroll">
        <div style="height: 60px; font-family:  "></div>
        <div class="text-center">
        </div>
        @php
            $ads = App\Model\Ads::find(0);
        @endphp
        <div style="width:300px; height: 250px; overflow: hidden">
            {!!html_entity_decode($ads->right_panel_ad)!!}
        </div>
        <div class="flex flex-col mt-3" style="width: 250px">
            <div class="py-2 pr-6 text-gray-700 border-2 bg-white rounded border">
                @php
                    $hashtagList = \App\Model\Hashtag::orderBy('count', 'desc')->limit(10)->get();
                @endphp
                <h7 class="text-gray-600 mb-4 px-6 mt-4 font-bold" >Trending Hashtags</h7>
                <ul>
                    @foreach($hashtagList as $item)
                        <li><a href="/search-hashtag/{{$item->name}}"
                               class="mb-4 px-6"># {{$item->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="mt-3 text-gray-600 fs12"><a
                    href="/category/corporis-sed-sit-rerum-omnis">About Us</a>-
                <a href="/category/corporis-sed-sit-rerum-omnis">Privacy</a>-
                <a href="/category/corporis-sed-sit-rerum-omnis">Cookie</a>-
                <a href="/category/corporis-sed-sit-rerum-omnis">Policy</a>-
                <a href="/category/corporis-sed-sit-rerum-omnis">Terms</a>-
                <a href="/category/corporis-sed-sit-rerum-omnis">Contact</a>-
                <a href="/category/corporis-sed-sit-rerum-omnis">Advertise with
                    Us</a>-
            </div>
            <div class="mt-1 text-gray-600">
                <div class="fs12">© 2020 Bulong</div>
            </div>
            <div class="mt-0"><img src="/public/allimage/bulongappcomingsoon.png" style="width: 180px" class="mb-2"> </div>
        </div>
    </aside>

    <div style="max-width: 1360px" class="mr-auto">
        <div class="flex justify-between lg:px-4 pt-16" style="width: 1360px;overflow: hidden">
        <div class="w-3/12 hidden lg:block" style="max-width: 250px">

        </div>
        <div class="pr-5 pt-2" style="margin-left: 15px; padding-top: 60px">
            @yield('content')
        </div>
        <div class="pb-4 w-3/12 hidden lg:block " style=" max-width: 620px;">


        </div>
    </div>
    </div>
</div>


<div class="v--modal-box v--modal" style="top: 348px; left: 835px; width: 250px; height: auto; display: none">
    <div class="p-4 flex justify-center items-center">
        <ul class="text-center">
            <li class="mb-2 hover:text-blue-600"><a href="#">Report Confession</a></li>
            <li class="mb-2 hover:text-blue-600"><a href="#">Go to Post</a></li>
            <li class="mb-2 hover:text-blue-600"><a href="#">Share</a></li>
            <li class="mb-2 hover:text-blue-600"><a href="#">Copy link</a></li> <!----> <!---->
            <li class="mb-2 hover:text-blue-600" data-dismiss="modal" aria-label="Close"><a href="#" >Cancel</a></li>
        </ul>
    </div>
</div>

<div class="modal fade mt-72 " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" >
            <div class="px-4 pt-4 flex justify-center items-center">
                <ul class="text-center">
                    <li class="mb-2 hover:text-blue-600" id="reportConfession"><a href="#"><span style="font-weight: bold" class="text-gray-600">Report Confession </span></a></li>
                    <li class="mb-2 hover:text-blue-600" id="goToPost"><a href="#"><span style="font-weight: bold" class="text-gray-600">Go to Post</span></a></li>
                    <li class="mb-2 hover:text-blue-600"  id="editConfession"><a href="#"><span style="font-weight: bold" class="text-gray-600">Edit Post</span></a></li>
                    <li class="mb-2 hover:text-blue-600" id="shareConfession" ><a href="#"><span style="font-weight: bold" class="text-gray-600">Share</span></a></li>
                    <li class="mb-2 hover:text-blue-600" onclick="copyConfessionLink()"><a href="#"><span style="font-weight: bold" class="text-gray-600">Copy link</span></a></li>
                    <li class="mb-2 hover:text-blue-600" id="followConfession"><a href="#"><span style="font-weight: bold" class="text-gray-600" id="followConfessionText">Unfollow</span></a></li>
                    <li class="mb-2 hover:text-blue-600" id="deleteConfession" ><a href="#"><span style="font-weight: bold" class="text-gray-600">Delete Post</span></a></li>
                    <li class="mb-2 hover:text-blue-600" data-dismiss="modal" aria-label="Close" id="editConfessionCancle"><a href="#" class="text-gray-600"><span style="font-weight: bold">Cancel</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="postConfession">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLongTitle">What’s your secret?</h6>
                <button type="button" class="close no-glow" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body border-bottom flex"  style="height: 400px; align-items: center" >

                <p class="confession-input text-gray-500" contenteditable="true" style="text-align:center;width:100%" >What’s your secret?...</p>
                    <textarea data-v-4f53dc82="" placeholder="What’s your secret?..."
                              class="bg-center hidden" id="textArea"
                          style="background-image: url(&quot;/images/backgrounds/Default_Background.png&quot;);border: none;width: 100%; height: 400px; resize: none"></textarea>
            </div>
            <div class="flex justify-between items-center pb-2 pt-2">
                <div class="ml-2 mt-1 cursor-pointer flex">
                    <a style="cursor: pointer">
                        <button id="emoji-button"></button>
                    </a>
                    <img
                        src="/public/allimage/uimg.png"  id="uimdbutton" class="ml-1" style="width: 23px; height: 23px;"></div>
                <div class="mr-3">
                    <button class="fs18 no-glow" style="color: rgb(120, 194, 255); font-weight: bold;" data-toggle="modal" data-target="#categorySelectModal" ><span>Post</span>
                    </button>
                </div>
            </div>

            @php
                $colorList = \App\Model\BgImageColors::orderBy('id', 'asc')->limit(100)->get();
                $bgImageList = \App\Model\BgImage::orderBy('id', 'asc')->limit(100)->get();
            @endphp
            <div class="bgPicker bg-selector bg-white" id="bgPicker-e" style="width: 380px; height: 430px; z-index: 1051; top: 200px; left: -380px; display: block;">
                <div class="sections disable-scrollbars scroll-wrapper-t" style="height: 430px; overflow: scroll" >
                    <div style="min-width: 330px; width: 360px">
                        <section class="search p-2">
                            <input type="search" placeholder="Search..." style="width:100%" class="border rounded bg-search">
                            <div class="wrap" style="display:none;"><h1>Search Results</h1></div>
                        </section>
                        <div class="text-gray-600 fs15 pl-2 pb-2"> Colors</div>
                        <div class="px-2 pb-2" style="min-height: 65px">
                            @foreach($colorList as $itemcolor)
                                <img class="inline-block pt-2" src="/{{$itemcolor->image}}" tag="{{$itemcolor->tag}}">
                            @endforeach
                        </div>

                        <div class="text-gray-600 fs15 pl-2 py-2"> Images</div>
                        <div class="px-2 pb-2" style="min-height: 65px">
                            @foreach($bgImageList as $itembg)
                                <img class="inline-block pt-2" src="/{{$itembg->image}}" tag="{{$itembg->tag}}">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="post-confession" class="hidden" action="{{route("confession/add")}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" value="" name="text" id="confession_content" />
    <input type="hidden" value="/public/images/backgrounds/Default_Background.png" name="background_image" id="background_image" />
    <input type="hidden" value="" name="category_id" id="category_id" />
</form>

<div class="modal fade" id="categorySelectModal" style="z-index: 1070" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content" id="postConfession">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLongTitle">Please select a category for this confession</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body border-bottom"  style="height: 200px; align-items: center" >

                @foreach($categoryList as $item)
                    <div class="categoryItem bg-gray-400 rounded py-1 px-1 fs12 mt-2 hover:bg-gray-700" style="display: inline-block; cursor: pointer">
                        <input type="hidden" class="categoryId" value="{{$item->id}}" />
                        <img src="{{$item->image}}" class="mr-1 w-4 h-4" style="display: inline-block"> <span>{{$item->name}}</span>
                    </div>
                @endforeach

            </div>
            <div class="justify-between items-center pb-2 pt-2">
                <div class="mr-3" style="float: right">
                    <button class="fs18 no-glow" style="color: rgb(120, 194, 255); font-weight: bold;"  onclick="postSubmit()"><span>Submit</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="categorySelectModalEdit" style="z-index: 1070" tabindex="-1" role="dialog" aria-labelledby="categorySelectModalEdit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content" id="postConfession">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLongTitle">Please select a category for this confession</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body border-bottom"  style="height: 200px; align-items: center" >

                @foreach($categoryList as $item)
                    <div class="categoryItem bg-gray-400 rounded py-1 px-1 fs12 mt-2 hover:bg-gray-700" slug="{{$item->slug}}" name="{{$item->name}}" style="display: inline-block; cursor: pointer">
                        <input type="hidden" class="categoryId" value="{{$item->id}}" />
                        <img src="{{$item->image}}" class="mr-1 w-4 h-4" style="display: inline-block"> <span>{{$item->name}}</span>
                    </div>
                @endforeach

            </div>
            <div class="justify-between items-center pb-2 pt-2">
                <div class="mr-3" style="float: right">
                    <button class="fs18 no-glow" style="color: rgb(120, 194, 255); font-weight: bold;"  onclick="postEditConfession()"><span>Submit</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="confessionEdit" style="z-index: 1070" tabindex="-1" role="dialog" aria-labelledby="categorySelectModalEdit" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 1200px;">
        <div class="modal-content" id="postConfession">
            <div class="modal-body border-bottom"  >
                <iframe id="iframe" src="" title="Edit Post" style="width: 1150px;height: 630px"></iframe>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width: 400px ; height: 500px"  role="document">
        <div class="modal-content" id="postConfession">
            <div class="modal-header">
                <div class="flex">
                    <img src="/public/allimage/warning.png">
                    <h6 class="modal-title mt-2" id="exampleModalLongTitle">Please select a problem to continue
                        reporting this confession</h6>
                </div>

                <button type="button" class="close no-glow" id="closeConfession" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body border-bottom"  style="height: 170px; align-items: center" >
                <div class="reportItem bg-gray-400 rounded py-1 px-3 fs12 mt-2 hover:bg-gray-700" style="display: inline-block; cursor: pointer">
                    <span>Violence</span>
                </div>

                <div class="reportItem bg-gray-400 rounded py-1 px-3 fs12 mt-2 hover:bg-gray-700" style="display: inline-block; cursor: pointer">
                    <span>Spam</span>
                </div>

                <div class="reportItem bg-gray-400 rounded py-1 px-3 fs12 mt-2 hover:bg-gray-700" style="display: inline-block; cursor: pointer">
                    <span>Sex / Nudity</span>
                </div>

                <div class="reportItem bg-gray-400 rounded py-1 px-3 fs12 mt-2 hover:bg-gray-700" style="display: inline-block; cursor: pointer">
                    <span>Harassment / Bullying</span>
                </div>

                <div class="reportItem bg-gray-400 rounded py-1 px-3 fs12 mt-2 hover:bg-gray-700" style="display: inline-block; cursor: pointer">
                    <span>Suicide or Self-Injury</span>
                </div>

                <div class="reportItem bg-gray-400 rounded py-1 px-3 fs12 mt-2 hover:bg-gray-700" style="display: inline-block; cursor: pointer">
                    <span>Terrorism</span>
                </div>

                <div class="reportItem bg-gray-400 rounded py-1 px-3 fs12 mt-2 hover:bg-gray-700" style="display: inline-block; cursor: pointer">
                    <span>Drugs</span>
                </div>

                <div class="reportItem bg-gray-400 rounded py-1 px-3 fs12 mt-2 hover:bg-gray-700" style="display: inline-block; cursor: pointer">
                    <span>Scam / Fraud</span>
                </div>

                <div class="reportItem bg-gray-400 rounded py-1 px-3 fs12 mt-2 hover:bg-gray-700" style="display: inline-block; cursor: pointer">
                    <span>Profanity</span>
                </div>

                <div class="reportItem bg-gray-400 rounded py-1 px-3 fs12 mt-2 hover:bg-gray-700" style="display: inline-block; cursor: pointer">
                    <span>Others</span>
                </div>

            </div>
            <div class="justify-between items-center pb-2 pt-2 mt-2">
                <div class="text-gray-600 font-bold" style="text-align: center">
                    Please be as detailed as possible
                </div>
                <textarea name="details" id="details" class="border rounded mx-3 mt-2" style="height: 100px;width:370px;resize: none;" ></textarea>
                <div>
                    <div class="mr-3 mt-2" style="float: right">
                        <button class="fs18 no-glow" style="color:rgb(36, 130, 208); font-weight: bold;" data-toggle="modal" onclick="reportSubmit();" ><span>Submit</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="reportResult" tabindex="-1" role="dialog" aria-labelledby="reportResult" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width: 400px ; height: 500px"  role="document">
        <div class="modal-content" id="postConfession">
            <div class="modal-header">
                <div class="flex">
                    <h6 class="modal-title mt-2" id="exampleModalLongTitle">This confession have been reported, thanks</h6>
                </div>

                <button type="button" class="close no-glow" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="host" value="{{route('postHub')}}">
<input type="hidden" id="localtion" value="{{route('home')}}">
<div class="modal fade mt-72 " id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModal" aria-hidden="true" >
    <div class="modal-dialog modal-sm" style="width: 200px" role="document">
        <div class="modal-content" >
            <div class="border-bottom fs15 py-2" style="border-bottom: solid 1.3px rgba(0,0,0,0.1) ;text-align: center;font-weight: bold">
                <span class="text-grey-1">Share on</span>
            </div>
            <div class="pl-10 pt-2 flex items-center">
                <ul class="">
                    <li class="mb-2 hover:text-blue-600">
                        <a  href="#" onclick="$('#cancleShare').click();$('.modal-backdrop.fade.show').remove();window.open('https://www.facebook.com/sharer/sharer.php?u=' + $('#host').val() + '/' + $('#selectedConfession').val() ,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600px,height=300px'); return false;" class="flex"> <img src="/public/allimage/sh_fb.png" style="width: 26px"/><span class="text-gray-600 ml-4" style="font-weight: bold"> Facebook </span>
                        </a>
                    </li>
                    <li class="mb-2 hover:text-blue-600"o nclick="shareFB()">
                        <a  href="http://twitter.com/share?text=Twitter Sharing&url=" onclick="$('#cancleShare').click();$('.modal-backdrop.fade.show').remove();window.open(this.href + $('#host').val() + '/' + $('#selectedConfession').val(),'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600px,height=300px'); return false;" class="flex"> <img src="/public/allimage/sh_tw.png" style="width: 26px"/><span class="ml-4 text-gray-600" style="font-weight: bold"> Twitter </span>
                        </a>
                    </li>
                    <li class="mb-2 hover:text-blue-600">
                        <a href="#" onclick="$('#cancleShare').click();$('.modal-backdrop.fade.show').remove();window.location = 'mailto:?subject=Bulong sharing&body=' + $('#host').val() + '/' + $('#selectedConfession').val() " class="flex"> <img src="/public/allimage/sh_mail.png" style="width: 26px"/><span class="ml-4 text-gray-600" style="font-weight: bold"> Via Email </span>
                        </a>
                    </li>
                    <li class="hover:text-blue-600" style="text-align: center" data-dismiss="modal" aria-label="Close">
                        <a href="#"> <span style="font-weight: bold;margin-left: 18px" class="text-gray-600" id="cancleShare"> Cancel </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<input style="display: none" id="myLink" value="sss" />
<input type="hidden" id="selectedConfession"">
<form id="report-confession" class="hidden" action="{{route("report/add")}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" value="" name="report_details" id="report_details" />
    <input type="hidden" value="Others" name="report_reason" id="report_reason" />
    <input type="hidden" value="" name="confession_id" id="confession_id" />
</form>

<div class="modal fade" id="editConfessionModal" tabindex="-1" role="dialog" aria-labelledby="editConfessionModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="postConfession">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLongTitle">Edit your confession</h6>
                <button type="button" class="close no-glow" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body border-bottom flex edit-bg-post"  style="height: 400px; align-items: center;    background-size: cover; background-image:  url('')" >

                <p class="confession-input-edit text-gray-700 edit-text-post font-bold" contenteditable="true" style="text-align:center;width:100%" ></p>
                <textarea data-v-4f53dc82="" placeholder="What’s your secret?..."
                          class="bg-center hidden" id="textArea"
                          style="background-image: url('');border: none;width: 100%; height: 400px; resize: none"></textarea>
            </div>
            <div class="flex justify-between items-center pb-2 pt-2">
                <div class="ml-2 mt-1 cursor-pointer flex">
                    <a style="cursor: pointer">
                        <button id="emoji-buttons"></button>
                    </a>
                    <img
                        src="/public/allimage/uimg.png"  id="uimdbutton-e" class="ml-1" style="width: 23px; height: 23px;"></div>
                <div class="mr-3">
                    <button class="fs18 no-glow" style="color: rgb(120, 194, 255); font-weight: bold;" data-toggle="modal" data-target="#categorySelectModalEdit" ><span>Submit</span>
                    </button>
                </div>
            </div>

            <div class="bgPicker bg-selector bg-white" id="bgPicker-e" style="width: 380px; height: 430px; z-index: 1051; top: 200px; left: -380px; display: block;">
                <div class="sections disable-scrollbars scroll-wrapper-t" style="height: 430px; overflow: scroll" >
                    <div style="min-width: 330px; width: 360px">
                    <section class="search p-2">
                        <input type="search" placeholder="Search..." style="width:100%" class="border rounded bg-search">
                        <div class="wrap" style="display:none;"><h1>Search Results</h1></div>
                    </section>
                    <div class="text-gray-600 fs15 pl-2 pb-2"> Colors</div>
                        <div class="px-2 pb-2" style="min-height: 65px">
                            @foreach($colorList as $itemcolor)
                            <img class="inline-block pt-2" src="/{{$itemcolor->image}}" tag="{{$itemcolor->tag}}">
                            @endforeach
                        </div>

                    <div class="text-gray-600 fs15 pl-2 py-2"> Images</div>
                        <div class="px-2 pb-2" style="min-height: 65px">
                            @foreach($bgImageList as $itembg)
                                <img class="inline-block pt-2" src="/{{$itembg->image}}" tag="{{$itembg->tag}}">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@php
    $popMessage = App\Model\PopupMessage::query()
        ->leftjoin('popup_read', function($join)
            {
                $join->on('popup_message.id', '=', "popup_read.popup_id");
                $join->on('popup_read.user_id','=', DB::raw(auth()->user()->id));
            })
        ->where("active","=", 1)
       // ->whereRaw('Date(to_date) > CURDATE()')
        ->groupBy(['popup_message.id', 'popup_message.message', 'popup_message.active', 'popup_message.name',
                'popup_message.to_date','popup_message.is_bigsize'])
        ->havingRaw('count(popup_read.id)=0')
        ->get(['popup_message.id', 'popup_message.message', 'popup_message.active', 'popup_message.name',
                'popup_message.to_date','popup_message.is_bigsize', DB::raw('count(popup_read.id) as count')]);
    if(sizeof($popMessage)>0){
        $rand = rand(0,sizeof($popMessage) - 1);
        $pop = $popMessage[$rand];
    }
@endphp
<div class="modal fade" id="popUpMessage" tabindex="-1" role="dialog" aria-labelledby="popUpMessage" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered @if(isset($pop) && $pop->is_bigsize == 1) modal-xl @endif" role="document" style="width: 1000px">
        <div class="modal-content" id="postConfession">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLongTitle">New Message From BuLong</h6>
                <button type="button" class="close no-glow" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body border-bottom flex edit-bg-post"  style="word-break: break-all;align-items: center;    background-size: cover; background-image:  url('')" >

                <div>
                    @if(isset($pop))
                        {!!html_entity_decode($pop->message)!!}
                    @endif
                </div>
            </div>
            @if(isset($pop))
            <div class="justify-between items-center pb-2 pt-2">
                <div class="mr-3" style="text-align: center">
                    <button class="fs18 no-glow btn btn-primary close-read" popup-id="{{$pop->id}}" style="color: white; font-weight: bold;" data-dismiss="modal" aria-label="Close" ><span>Close</span>
                    </button>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>

<style type="text/css">

</style>

<input type="hidden" id="newBg"/>
<input type="hidden" id="newCategory"/>
<input type="hidden" id="newSlug"/>
<div id="center-ads" style="display:none">
    <div class="center-ads-wrapper">
        {!!html_entity_decode($ads->center_ad)!!}
    </div>
</div>
<style>
    .ss-wrapper {
        overflow : hidden;
        height   : 100%;
        position : relative;
        z-index  : 1;
        float: left;
    }

    .ss-content {
        height          : 100%;
        width           : 110%;
        padding         : 0 32px 0 0;
        position        : relative;
        right           : -5px;
        overflow        : auto;
        -moz-box-sizing : border-box;
        box-sizing      : border-box;
    }

    .ss-scroll {
        position            : relative;
        background          : rgba(0, 0, 0, .1);
        width               : 9px;
        border-radius       : 4px;
        top                 : 0;
        z-index             : 2;
        cursor              : pointer;
        opacity: 0;
        transition: opacity 0.25s linear;
    }

    .ss-container:hover .ss-scroll {
        opacity: 1;
    }
    .ss-container{

    }
    .ss-grabbed {
        user-select: none;
        -o-user-select: none;
        -moz-user-select: none;
        -khtml-user-select: none;
        -webkit-user-select: none;
    }
    .emoji-picker{
        z-index: 1051;
        left: -367px !important;
        height: 26.7rem;
        top: -81px !important;
    }
    .emoji-picker__content {
        padding: 0.5em;
        height: 21rem;
    }
    .emoji-picker__preview-emoji {
        font-size: 2em;
        margin-right: 0.25em;
        margin-top: 20px;
    }
    textarea:focus, input:focus, p:focus{
        outline: none !important;
    }

</style>
<script type="text/javascript" src="{{ asset('public/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/simple-scrollbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/emoji.min.js') }}"></script>
<script type="text/javascript">

    $(".close-read").click(function(){
        var token = $("[name='_token']").first().val();
        $.post("/popup/read",
            {
                _token: token,
                popup_id: $(this).attr("popup-id"),
            },
            function (data, status) {
            });
    });

    @if(isset($pop))
    $(document).ready(function(e) {
        setTimeout(function(){
            $("#popUpMessage").modal("toggle");
            var str = $("#center-ads").html();
            alert();
            $(".ads-lack").after("<p>sssssss</p>");
        }, 800);

    });
    @endif
    var token = $("[name='_token']").first().val();
    $(".poll1-click").click(function(){
        var poll = $(this).closest(".bulong-poll");
        var count1 = parseInt(poll.attr("poll1"))+1;
        var count2 = parseInt(poll.attr("poll2"));
        $(this).find(".percentbar").first().show();
        var per1 = Math.floor(count1 / (count1+count2) * 100);
        $(this).find(".percentbar").first().css("width",per1 + "%");
        poll.find(".numo1").first().html(per1 + "%");
        poll.find(".numo1").first().show();

        poll.find(".percentbar-right").first().show();
        var per2 = 100-per1;
        poll.find(".percentbar-right").first().css("width",per2 + "%");
        poll.find(".numo2").first().html(per2 + "%");
        poll.find(".numo2").first().show();

        poll.find(".poll1-click").first().unbind( "click");
        poll.find(".poll1-click").first().css("cursor","text");
        poll.find(".poll2-click").first().unbind( "click");
        poll.find(".poll2-click").first().css("cursor","text");

        $.post("/poll/rate",
            {
                _token: token,
                id: $(this).attr("poll-id"),
                select: 1
            },
            function (data, status) {
            });
    });

    $(".poll2-click").click(function(){
        var poll = $(this).closest(".bulong-poll");
        var count1 = parseInt(poll.attr("poll1"));
        var count2 = parseInt(poll.attr("poll2"))+1;
        $(this).find(".percentbar").first().show();

        $(this).find(".percentbar-right").first().show();
        var per2 = Math.floor(count2 / (count1+count2) * 100);
        $(this).find(".percentbar-right").first().css("width",per2 + "%");
        poll.find(".numo2").first().html(per2 + "%");
        poll.find(".numo2").first().show();

        var per1 = 100-per2;
        poll.find(".percentbar").first().css("width",per1 + "%");
        poll.find(".numo1").first().html(per1 + "%");
        poll.find(".numo1").first().show();

        poll.find(".poll1-click").first().unbind( "click");
        poll.find(".poll1-click").first().css("cursor","text");
        poll.find(".poll2-click").first().unbind( "click");
        poll.find(".poll2-click").first().css("cursor","text");

        $.post("/poll/rate",
            {
                _token: token,
                id: $(this).attr("poll-id"),
                select: 2
            },
            function (data, status) {
            });
    });

    $("#deleteConfession").click(function(){
        if (confirm('Are you sure to delete this post?')) {
            var token = $("[name='_token']").first().val();
            $.post("/confessions/delete",
                {
                    _token: token,
                    confession_id: $("#selectedConfession").val(),
                },
                function (data, status) {
                    $("#exampleModal").modal("toggle");
                    $(".modal-backdrop.fade.show").remove();
                    $("#post-holder-" + $("#selectedConfession").val()).remove();
                });
        }
    });

    $(".comment-button").click(function(){
        $("#confessionEdit").modal("toggle");
        $("#iframe").attr('src', $("#localtion").val() + "/post/" + $(this).attr('confession-id') + "?windowMode=true");
    });


    function deleteConfession(){
        var text = $(".confession-input-edit").first().html().split('&nbsp;').join(' ');
        var token = $("[name='_token']").first().val();

        $.post("/confessions/edit",
            {
                _token: token,
                background_image: $("#newBg").val(),
                text: text,
                category_id: $("#category_id").val(),
                confession_id: $("#selectedConfession").val(),
            },
            function(data, status){
                $("#text-" + $("#selectedConfession").val()).html(text);
                $("#bg-" + $("#selectedConfession").val()).css("background-image", "url("+ $("#newBg").val() +")");
                $("#category-" + $("#selectedConfession").val()).html($("#newCategory").val());
                $("#category-" + $("#selectedConfession").val()).attr('href',$("#localtion").val() + "category/" +  $("#newSlug").val());
                $("#editConfessionModal").modal("toggle");
                $("#categorySelectModalEdit").modal("toggle");
                $(".modal-backdrop.fade.show").remove();

            });
    }

    function postEditConfession(){
        var text = $(".confession-input-edit").first().html().split('&nbsp;').join(' ');
        var token = $("[name='_token']").first().val();

        $.post("/confessions/edit",
            {
                _token: token,
                background_image: $("#newBg").val(),
                text: text,
                category_id: $("#category_id").val(),
                confession_id: $("#selectedConfession").val(),
            },
            function(data, status){
                $("#text-" + $("#selectedConfession").val()).html(text);
                $("#bg-" + $("#selectedConfession").val()).css("background-image", "url("+ $("#newBg").val() +")");
                $("#category-" + $("#selectedConfession").val()).html($("#newCategory").val());
                $("#category-" + $("#selectedConfession").val()).attr('href',$("#localtion").val() + "category/" +  $("#newSlug").val());
                $("#editConfessionModal").modal("toggle");
                $("#categorySelectModalEdit").modal("toggle");
                $(".modal-backdrop.fade.show").remove();

            });
    }
    function postEdit(){
        var text = $(".confession-input-edit").fisrt().html().split('&nbsp;').join(' ');
        var token = $("[name='_token']").first().val();

        $.post("/confessions/edit",
            {
                _token: token,
                background_image: $("#background_image").val(),
                text: text,
                category_id: $("#category_id").val(),
                confession_id: {{$item->id}},
            },
            function(data, status){
                location.reload();
            });
    }

    $("#editConfession").click(function(){
        $(".modal-backdrop.fade.show").remove();
        $("#exampleModal").modal("toggle");
        $("#editConfessionModal").modal("toggle");
        $(".edit-text-post").first().focus();
    });

    function copyConfessionLink() {

        var text = $("#myLink").val();
        if (!navigator.clipboard) {
            fallbackCopyTextToClipboard(text);
            return;
        }

        navigator.clipboard.writeText(text).then(function() {
            console.log('Async: Copying to clipboard was successful!');
            $("#textCopy").html("copied to clipboard");
        }, function(err) {
            console.error('Async: Could not copy text: ', err);
        });
        $('#editConfessionCancle').click();
        $(".modal-backdrop.fade.show").remove();
    }


    $(".share-button").mousedown(function(){
        var token = $("[name='_token']").first().val();
        $.post("/share/add",
            {
                _token: token,
            },
            function(data, status){
            });
    });

    $("#shareConfession").click(function(){
        $("#shareModal").modal('toggle');
        $('#editConfessionCancle').click();
    });
    function reportSubmit(){
        var token = $("[name='_token']").first().val();
        $('#closeConfession').click();
        $(".modal-backdrop.fade.show").remove();
        $('#reportResult').modal('toggle');

        $.post("/report/add",
            {
                _token: token,
                report_details: $("#details").val(),
                report_reason: $("#report_reason").val(),
                confession_id: $("#confession_id").val(),
            },
            function(data, status){

            });

    }

    $("#reportConfession").click(function(){
        $("#reportModal").modal('toggle');
        $('#editConfessionCancle').click();
    });

    $(".reportItem").click(function(){
        $(".reportItem").removeClass("bg-gray-700");
        $(this).addClass("bg-gray-700");
        $("#confession_id").val($(".like-button").first().attr("post-id"));
        $("#report_reason").val( $(this).find("span").first().html());
    });

    $(".threeDotSelect").mousedown(function () {
        var selectedUserConfession = $(this).attr('confession-user-id');
        var userId = "{{auth()->user()->id}}";
        $("#selectedConfession").val($(this).attr('confession-id'));
        $("#myLink").val($("#host").val() + "/" + $(this).attr('confession-id'));
        var is_follow = $(this).attr('is-follow');
        $(".edit-bg-post").css("background-image", "url("+ $(this).attr('bg-image') +")");
        $("#newBg").val($(this).attr('bg-image'));
        $(".edit-text-post").html($(this).attr('text'));
        if(selectedUserConfession == userId){
            $("#reportConfession").hide();
            $("#editConfession").show();
            $("#followConfession").hide();
            $("#deleteConfession").show();
        }else{
            $("#reportConfession").show();
            $("#editConfession").hide();
            $("#deleteConfession").hide();
            $("#followConfession").show();
            if(is_follow == "1"){
                $("#followConfessionText").html("Unfollow")
            }else{
                $("#followConfessionText").html("Follow")
            }
        }
    });

    $("#goToPost").click(function(){
        window.location.href = "/post/" + $("#selectedConfession").val();
    });

    $("#followConfessionText").click(function(){
        $('#editConfessionCancle').click();
        $("#button-follow-" + $("#selectedConfession").val()).click();
        $(".modal-backdrop.fade.show").remove();
    });
    function postSubmit(){
        $("#confession_content").val($(".confession-input").html().split('&nbsp;').join(' '));
        $("#post-confession").submit();
    }

    function postEdit(){
        $("#text").val($(".confession-input").html().split('&nbsp;').join(' '));
        var token = $("[name='_token']").first().val();

        $.post("/confessions/edit",
            {
                _token: token,
                background_image: $("#background_image").val(),
                text: $("#text").val(),
                category_id: $("#category_id").val(),
                confession_id: {{$item->id}},
            },
            function(data, status){
                location.reload();
            });
    }

    window.addEventListener('DOMContentLoaded', () => {
        EmojiButton(document.querySelector('#emoji-button'), function (emoji) {
            if($('.confession-input').html() == "What’s your secret?..."){
                $('.confession-input').html("");
                $('.confession-input').addClass("text-gray-700");
            }
            $('.confession-input').html($('.confession-input').html() + emoji);
        });
    });

    window.addEventListener('DOMContentLoaded', () => {
        EmojiButton(document.querySelector('#emoji-buttons'), function (emoji) {
            if($('.confession-input-edit').html() == "What’s your secret?..."){
                $('.confession-input-edit').html("");
                $('.confession-input-edit').addClass("text-gray-700");
            }
            $('.confession-input-edit').html($('.confession-input-edit').html() + emoji);
        });
    });
    function triggerSmiley(){
        $("#emoji-button").click();
    }
    $(".bg-selector img").click(
        function () {
            $('#exampleModalCenter .modal-body').css('background-image', 'url( "' + $(this).attr('src') +'")' );
            $('#editConfessionModal .modal-body').css('background-image', 'url( "' + $(this).attr('src') +'")' );
            $('#editConfessionModal .modal-body').css('opacity', '1');
            $("#background_image").val($(this).attr('src'));
            $('.bgPicker').hide();
        }
    );


    var lastclick = null;
    var firtClick = true;
    $("#uimdbutton").click(function () {
        if($('.bgPicker').css('display') == 'none'){
            $('.bgPicker').show();
            lastclick = $("#bgPicker");
        }else{
            $('.bgPicker').hide();
        }

    });

    $("#uimdbutton-e").click(function () {
        if($('.bgPicker').css('display') == 'none'){
            $('.bgPicker').show();
            lastclick = $("#bgPicker");
        }else{
            $('.bgPicker').hide();
        }

    });

    $(".confession-input").click(function(){
        if( $(this).html() == "What’s your secret?..."){
            $(this).html("");
            $(this).addClass("text-gray-700");
        }
    });

    $(".confession-input-edit").click(function(){
        if( $(this).html() == "What’s your secret?..."){
            $(this).html("");
            $(this).addClass("text-gray-700");
        }
    });

    $(".categoryItem").click(function(){
        $(".categoryItem").removeClass("bg-gray-700");
        $(this).addClass("bg-gray-700");
        $("#category_id").val($(this).find('input').first().val());
        $("#newCategory").val($(this).attr("name"));
        $("#newSlug").val($(this).attr("slug"));


    });

    $(document).ready(function(e) {
        $('.bgPicker').hide();

        $("#exampleModalCenter").on("hidden.bs.modal", function () {
            $('.emojiPicker').first().css('display', 'none');
        });


        let scrollDiv = document.querySelector(".scroll-wrapper");
        SimpleScrollbar.initEl(scrollDiv);

        let scrollDiv_t = document.querySelector(".scroll-wrapper-t");
        SimpleScrollbar.initEl(scrollDiv_t);

        let scrollDiv_r = document.querySelector(".scroll-wrapper-r");
        SimpleScrollbar.initEl(scrollDiv_r);

        let scrollDiv_c = document.querySelector(".scroll-wrapper-c");
        SimpleScrollbar.initEl(scrollDiv_c);

        // keyup event is fired
        $(".emojiable-question, .emojiable-option").on("keyup", function () {
            //console.log("emoji added, input val() is: " + $(this).val());
        });

        //var element = $('.emojiPicker').first().detach();
       // $('#postConfession').append(element);
        $("#block-text-area").keydown(function(){
            $(this).val("");
            }
        );
        $("#block-text-area").keyup(function(){
                $(this).val("");
            }
        );
        $("#block-text-area").change(function(){
                $(this).val("");
            }
        );

        setTimeout(function(){
            $("#emoji-button").html('<img src="/public/allimage/simley.png" style="width: 23px;">');
            $("#emoji-buttons").html('<img src="/public/allimage/simley.png" style="width: 23px;">');

        }, 100);



    });

    $(".like-button").click(function(){
        var postId = $(this).attr("post-id");
        var token = $("[name='_token']").first().val();
        $.post("/add-like",
            {
                _token: token,
                userid: "{{auth()->user()->id}}",
                post_id: postId
            },
            function(data, status){
            });
        var is_like = $(this).find('img').first().attr("is-like");
        var like_count_dom = $(this).find('.like_count').first();
        if(is_like == "0"){
            $(this).find('img').first().attr("src","/public/allimage/felt.png");
            $(this).find('img').first().attr("is-like","1");
            like_count = parseInt(like_count_dom.html()) +1;
        }else{
            $(this).find('img').first().attr("src","/public/allimage/feel.png");
            $(this).find('img').first().attr("is-like","0");
            like_count = parseInt(like_count_dom.html()) -1;
        }
        like_count_dom.html(like_count);
    });

    $(".follow-wrapper").click(function(){
        var userId = $(this).attr("user-id");
        var token = $("[name='_token']").first().val();
        $.post("/add-follow",
            {
                _token: token,
                userid: userId,
            },
            function(data, status){
            });
        var allWrapperSelector = ".follow-wrapper[user-id=" + userId + "]";
        if($(this).html().trim() == "Follow"){
            $(this).html("Unfollow");
            $(allWrapperSelector).html("Unfollow");
            $("i[confession-user-id=" + userId +"]").attr('is-follow','1');
        }else{
            $(this).html("Follow");
            $(allWrapperSelector).html("Follow");
            $("i[confession-user-id=" + userId +"]").attr('is-follow','0');
        }
    });
    $(document).mouseup(function(e)
    {
        var container = $("#bgPicker");
        var containerIcon = $("#uimdbutton");
        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && !containerIcon.is(e.target) && container.has(e.target).length === 0)
        {
            container.hide();
        }
    });
    $(".un-follow-this").click(function(){
        if($(this).attr("is-follow") == "true") {
            if (confirm('Are you sure to unfollow this user?')) {
                $(this).find("span").first().html("Follow");
                $(this).attr("is-follow", "false");
                var userId = $(this).attr("user-id");
                var token = $("[name='_token']").first().val();
                $.post("/add-follow",
                    {
                        _token: token,
                        userid: userId,
                    },
                    function (data, status) {

                    });
            }
        }else{
            $(this).find("span").first().html("Unfollow");
            $(this).attr("is-follow", "true");
            var userId = $(this).attr("user-id");
            var token = $("[name='_token']").first().val();
            $.post("/add-follow",
                {
                    _token: token,
                    userid: userId,
                },
                function (data, status) {

                });
        }

    });

    $(".picker-color").click(function(){
        $(this).closest(".modal-content").find(".modal-body").first().css('background-color', $(this).css('background-color'));
        $(this).closest(".modal-content").find(".modal-body").first().css('background-image', '');
        $('.bgPicker').hide();
    });

    $(".bg-search").keyup(function(){
       var imgs = $(this).closest(".bgPicker").find("img");
       keyword = $(this).val();
       imgs.each(function(){
           var tag = $(this).attr("tag");
           var parts = tag.split(" ");
           var parts1 = tag.split("_");
           var flag = false;
           for (var i = 0; i < parts.length; i++) {
               if(parts[i].indexOf(keyword)>0){
                   flag=true;
               }
           }

           for (var i = 0; i < parts1.length; i++) {
               if(parts1[i].indexOf(keyword)>0){
                   flag=true;
               }
           }
           if(flag){
               $(this).show();
           }else{
               $(this).hide();
           }

           if(keyword==""){
               $(this).show();
           }
       });
    });

    $(".bg-search").change(function(){
        var imgs = $(this).closest(".bgPicker").find("img");
        keyword = $(this).val();
        imgs.each(function(){
            var tag = $(this).attr("tag");
            var parts = tag.split(" ");
            var parts1 = tag.split("_");
            var flag = false;
            for (var i = 0; i < parts.length; i++) {
                if(parts[i].indexOf(keyword)>0){
                    flag=true;
                }
            }

            for (var i = 0; i < parts1.length; i++) {
                if(parts1[i].indexOf(keyword)>=0){
                    flag=true;
                }
            }
            if(flag){
                $(this).show();
            }else{
                $(this).hide();
            }

            if(keyword==""){
                $(this).show();
            }
        });
    });

    $(".noti-read").click(function(){
        var id = $(this).attr("post-id");
        var token = $("[name='_token']").first().val();
        $.post("/read-noti",
            {
                _token: token,
                post_id: id,
            },
            function(data, status){
                window.location='/post/' + id;
            });
    });
</script>
</body>
</html>
