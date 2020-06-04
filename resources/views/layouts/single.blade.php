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

    <script type="text/javascript" src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/jquery-3.x-git.min.js') }}"></script>

</head>
<body style="" cz-shortcut-listen="true" class="fs14 bg-main">
<div id="app">
    @if(!isset($windowMode))
    <header class="bg-white" style="position: fixed;top:0; z-index:999; width: 100%; max-height: 60px">
        <div class="flex justify-between items-center pt-1 lg:px-32 mr-auto" style="max-width :1380px ;margin-top: -10px">
            <div><a href="/"><img src="/public/allimage/logo.png" class="w-32" style="margin-left: -30px"></a></div>
            <div class="hidden lg:block ml-64 mt-4">
                <form method="GET" action="/search"><input type="text" name="q"
                                                           placeholder=" Search..." value=""
                                                           class=" text-center border rounded bg-main fs12">
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
                                    class="absolute t-0 r-0 -ml-4 mt-2 bg-gray-600 h-4 w-4 rounded-full text-xs text-center text-white" style="top:-10px;right: -25px">0</span>
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
                            <li class="bg-white fs12 text-green-1 ">
                                <div class="bg-gray-400 flex pl-2 hover:bg-white">
                                    <img src="/public/allimage/comment-noti.png" class="mt-3" style="height:20px"/>
                                    <a href="/category/corporis-sed-sit-rerum-omnis#" class="py-2 px-2 block">
                                        <span class="text-green-1">hoe_shop</span>
                                        <span>replied to your comment on this</span>
                                        <span class="text-green-1">confession</span>
                                    </a>
                                </div>
                            </li>
                            <li class="bg-white fs12 text-green-1" style="margin-top: 1px">
                                <div class="bg-gray-400 flex pl-2 hover:bg-white">
                                    <img src="/public/allimage/felt.png"  class="mt-3" style="height:20px"/>
                                    <a href="/category/corporis-sed-sit-rerum-omnis#" class="py-2 px-2 block">
                                        <span class="text-green-1">Najirul</span>
                                        <span>and</span>
                                        <span class="text-green-1">Sasha_G</span>
                                        <span>liked your</span>
                                        <span class="text-green-1">confession</span>
                                    </a>
                                </div>
                            </li>
                            <li class="bg-white fs12 text-green-1">
                                <p href="/category/corporis-sed-sit-rerum-omnis#" class="rounded-t py-2 px-6 block text-gray-700 mb-0">
                                    <span class="fs16">Read</span>
                                </p>
                            </li>
                            <li class="bg-white fs12 text-green-1 hover:bg-gray-400" style="margin-top: 1px">
                                <div class="flex pl-2 hover:bg-gray-400">
                                    <img src="/public/allimage/comment-noti.png"  class="mt-3" style="height:20px"/>
                                    <a href="/category/corporis-sed-sit-rerum-omnis#" class="py-2 px-2 block">
                                        <span class="text-green-1">Joe Bishop</span>
                                        <span>replied to your comment on</span>
                                        <span class="text-green-1"> Poll: Have you ever taken a sleeping pill to get to sleep?</span>
                                    </a>
                                </div>
                            </li>
                            <li class="bg-white fs12 text-green-1 hover:bg-gray-400" style="margin-top: 1px">
                                <div class="flex pl-2 hover:bg-gray-400">
                                    <img src="/public/allimage/comment-noti.png"  class="mt-3" style="height:20px"/>
                                    <a href="/category/corporis-sed-sit-rerum-omnis#" class="py-2 px-2 block">
                                        <span class="text-green-1">Joe Bishop</span>
                                        <span>replied to your comment on</span>
                                        <span class="text-green-1"> Poll: Have you ever taken a sleeping pill to get to sleep?</span>
                                    </a>
                                </div>
                            </li>
                            <li class="bg-white fs12 text-green-1 hover:bg-gray-400 text-center">
                                <div class="pl-2 hover:bg-gray-400">
                                    <a href="/category/corporis-sed-sit-rerum-omnis#" class="py-2 px-2 block">
                                        <span class="text-green-1 font-weight-bold fs14" style="font-weight: bold">See all</span>
                                    </a>
                                </div>
                            </li>
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
    @endif
    <div style="max-width: 1360px" class="mr-auto">
        <div class="mr-auto" style="width: 1000px;">
            @if(!isset($windowMode))
            <div style="height: 60px;width: 100%">&nbsp;</div>
            @endif
            @yield('content')
        </div>
    </div>
</div>
<div class="v--modal-box v--modal" style="top: 348px; left: 835px; width: 250px; height: auto; display: none">
    <div class="p-4 flex justify-center items-center">
        <ul class="text-center">
            <li class="mb-2 hover:text-blue-600"><a href="#">Report Confession</a></li>
            <li class="mb-2 hover:text-blue-600"><a href="#">Go to Post</a></li>
            <li class="mb-2 hover:text-blue-600"><a href="#">Share</a></li>
            <li class="mb-2 hover:text-blue-600"><a href="#" onclick="copyConfessionLink()">Copy link</a></li> <!----> <!---->
            <li class="mb-2 hover:text-blue-600" data-dismiss="modal" aria-label="Close"><a href="#">Cancel</a></li>
        </ul>
    </div>
</div>
<div class="modal fade mt-72 " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" >
            <div class="px-4 pt-4 flex justify-center items-center">
                <ul class="text-center" onmouseup="$('#exampleModal').modal('toggle');">
                    @if($item->username != auth()->user()->username)
                    <li class="mb-2 hover:text-blue-600"><a href="#"><span class="text-gray-600" style="font-weight: bold"  data-toggle="modal" data-target="#reportModal">Report Confession </span></a></li>
                    @endif
                    @if($item->username == auth()->user()->username)<li class="mb-2 hover:text-blue-600" data-toggle="modal" data-target="#editConfessionModal" onmousedown="replaceImg()"><a href="#"><span class="text-gray-600" style="font-weight: bold">Edit Post</span></a></li>@endif
                    <li class="mb-2 hover:text-blue-600"><a href="#"><span class="text-gray-600" data-toggle="modal" data-target="#shareModal" style="font-weight: bold">Share</span></a></li>
                    <li class="mb-2 hover:text-blue-600" onclick="copyConfessionLink()"><a href="#"><span class="text-gray-600" style="font-weight: bold">Copy link</span></a></li>
                    @if($item->username != auth()->user()->username)
                        @if($item->is_follow)<li class="mb-2 hover:text-blue-600"><a href="#"><span class="text-gray-600" style="font-weight: bold">Unfollow</span></a></li>@endif
                        @if(!$item->is_follow)<li class="mb-2 hover:text-blue-600"  onclick="$('.follow-wrapper').first().click();"><a href="#"><span class="text-gray-600" style="font-weight: bold" id="sub-follow">Follow</span></a></li>@endif
                    @endif
                    @if($item->username == auth()->user()->username)
                    <li class="mb-2 hover:text-blue-600" onclick="$('#deletePostForm').submit()" ><a href="#"><span class="text-gray-600" style="font-weight: bold">Delete Post</span></a></li>
                    @endif
                    <li class="mb-2 hover:text-blue-600" data-dismiss="modal" aria-label="Close"><a href="#"><span class="text-gray-600" style="font-weight: bold">Cancel</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<form class="hidden" method="post" id="deletePostForm" action="/confessions/delete">
    <input type="hidden" name="confession_id"  value="{{$item->id}}" >
    {{ csrf_field() }}
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
            <div class="modal-body border-bottom flex"  style="height: 400px; align-items: center;    background-size: cover; background-image:  url('{{$item->background_image}}')" >

                <p class="confession-input text-gray-500" contenteditable="true" style="text-align:center;width:100%" >{{$item->text}}</p>
                <textarea data-v-4f53dc82="" placeholder="What’s your secret?..."
                          class="bg-center hidden" id="textArea"
                          style="background-image: url({{$item->background_image}});border: none;width: 100%; height: 400px; resize: none">{{$item->text}}</textarea>
            </div>
            <div class="flex justify-between items-center pb-2 pt-2">
                <div class="ml-2 mt-1 cursor-pointer flex">
                    <a style="cursor: pointer">
                        <button id="emoji-button"></button>
                    </a>
                    <img
                        src="/public/allimage/uimg.png"  id="uimdbutton" class="ml-1" style="width: 23px; height: 23px;"></div>
                <div class="mr-3">
                    <button class="fs18 no-glow" style="color: rgb(120, 194, 255); font-weight: bold;" data-toggle="modal" data-target="#categorySelectModal" ><span>Submit</span>
                    </button>
                </div>
            </div>

            <div class="bgPicker bg-selector bg-white" id="bgPicker" style="width: 300px; height: 300px; z-index: 1051; top: 235px; left: -300px; display: block;">
                <div class="sections" style="height: 260px;">
                    <section class="search">
                        <input type="search" placeholder="Search...">
                        <div class="wrap" style="display:none;"><h1>Search Results</h1></div>
                    </section>
                    <div class="text-gray-600 fs15 pl-2"> Colors</div>
                    <div class="px-2 flex">
                        <img src="/public/images/backgrounds/Baby_Newborn_Smiling.png" >
                        <img src="/public/images/backgrounds/Balloons_Party_Birthday.png" >
                        <img src="/public/images/backgrounds/Beach_Boat.png" >
                        <img src="/public/images/backgrounds/Bed_Couple.png" >
                    </div>
                    <div class="text-gray-600 fs15 pl-2"> Images</div>
                    <div class="px-2 flex">
                        <img src="/public/images/backgrounds/Baby_Newborn_Smiling.png" >
                        <img src="/public/images/backgrounds/Balloons_Party_Birthday.png" >
                        <img src="/public/images/backgrounds/Beach_Boat.png" >
                        <img src="/public/images/backgrounds/Bed_Couple.png" >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

                @php
                    $categoryList = \App\Model\Categories::all();
                @endphp

                @foreach($categoryList as $category)
                    <div class="categoryItem bg-gray-400 rounded py-1 px-1 fs12 mt-2 hover:bg-gray-700" style="display: inline-block; cursor: pointer">
                        <input type="hidden" class="categoryId" value="{{$category->id}}" />
                        <img src="/{{$category->image}}" class="mr-1 w-4 h-4" style="display: inline-block"> <span>{{$category->name}}</span>
                    </div>
                @endforeach

            </div>
            <div class="justify-between items-center pb-2 pt-2">
                <div class="mr-3" style="float: right">
                    <button class="fs18 no-glow" style="color: rgb(120, 194, 255); font-weight: bold;"  onclick="postSubmit()"><span>Submit</span>
                    </button>
                </div>
            </div>

            <div class="bgPicker bg-selector bg-white" id="bgPicker" style="width: 300px; height: 300px; z-index: 1051; top: 235px; left: -300px; display: block;">
                <div class="sections" style="height: 260px;">
                    <section class="search">
                        <input type="search" placeholder="Search...">
                        <div class="wrap" style="display:none;"><h1>Search Results</h1></div>
                    </section>
                    <div class="text-gray-600 fs15 pl-2"> Colors</div>
                    <div class="px-2 flex">
                        <img src="/public/images/backgrounds/Baby_Newborn_Smiling.png" >
                        <img src="/public/images/backgrounds/Balloons_Party_Birthday.png" >
                        <img src="/public/images/backgrounds/Beach_Boat.png" >
                        <img src="/public/images/backgrounds/Bed_Couple.png" >
                    </div>
                    <div class="text-gray-600 fs15 pl-2"> Images</div>
                    <div class="px-2 flex">
                        <img src="/public/images/backgrounds/Baby_Newborn_Smiling.png" >
                        <img src="/public/images/backgrounds/Balloons_Party_Birthday.png" >
                        <img src="/public/images/backgrounds/Beach_Boat.png" >
                        <img src="/public/images/backgrounds/Bed_Couple.png" >
                    </div>
                </div>
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

<div class="modal fade mt-72 " id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModal" aria-hidden="true" >
    <div class="modal-dialog modal-sm" style="width: 200px" role="document">
        <div class="modal-content" >
            <div class="border-bottom fs15 py-2" style="border-bottom: solid 1.3px rgba(0,0,0,0.1) ;text-align: center;font-weight: bold">
                <span class="text-grey-1">Share on</span>
            </div>
            <div class="pl-10 pt-2 flex items-center">
                <ul class="">
                    <li class="mb-2 hover:text-blue-600">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{route('post',$item->id)}}" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600px,height=300px'); return false;" class="flex"> <img src="/public/allimage/sh_fb.png" style="width: 26px"/><span class="text-gray-600 ml-4" style="font-weight: bold"> Facebook </span>
                        </a>
                    </li>
                    <li class="mb-2 hover:text-blue-600">
                        <a href="http://twitter.com/share?text=Twitter Sharing&url={{route('post',$item->id)}}" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600px,height=300px'); return false;" class="flex"> <img src="/public/allimage/sh_tw.png" style="width: 26px"/><span class="ml-4 text-gray-600" style="font-weight: bold"> Twitter </span>
                        </a>
                    </li>
                    <li class="mb-2 hover:text-blue-600">
                        <a href="mailto:?subject=Bulong sharing&body={{route('post',$item->id)}}" class="flex"> <img src="/public/allimage/sh_mail.png" style="width: 26px"/><span class="ml-4 text-gray-600" style="font-weight: bold"> Via Email </span>
                        </a>
                    </li>
                    <li class="hover:text-blue-600" style="text-align: center" data-dismiss="modal" aria-label="Close">
                        <a href="#"> <span style="font-weight: bold;margin-left: 18px" class="text-gray-600"> Cancel </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<input style="display: none" id="myURL" value="{{route('post',$item->id)}}" />

<form id="report-confession" class="hidden" action="{{route("report/add")}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" value="" name="report_details" id="report_details" />
    <input type="hidden" value="Others" name="report_reason" id="report_reason" />
    <input type="hidden" value="" name="confession_id" id="confession_id" />
</form>

<form id="edit-confession" class="hidden" action="{{route("report/add")}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" value="" name="text" id="text" />
    <input type="hidden" value="{{$item->background_image}}" name="background_image" id="background_image" />
    <input type="hidden" value="" name="category_id" id="category_id" />
</form>

<style type="text/css">
    #emojiPickerWrap {margin:10px 0 0 0;}
    .field { padding: 20px 0; }
</style>
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
        width           : 100%;
        padding         : 0 32px 0 0;
        position        : relative;
        right           : -25px;
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
        max-height: 550px;
    }
    .ss-grabbed {
        user-select: none;
        -o-user-select: none;
        -moz-user-select: none;
        -khtml-user-select: none;
        -webkit-user-select: none;
    }
    .emoji-picker {
        z-index: 1051;
        left: -365px !important;
        height: 26.7rem;
    }
    .item-drop-down {
        display: block;
        width: 100%;
        padding: .25rem 1.5rem;
        clear: both;
        font-weight: 400;
        color: #212529;
        text-align: inherit;
        white-space: nowrap;
        background-color: transparent;
        border: 0;
    }
    tag-name{
        font-weight: bold !important;
        color: #0aa7ef !important;
    }
</style>

<script type="text/javascript" src="{{ asset('public/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/simple-scrollbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/emoji.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/my.js') }}"></script>
<script type="text/javascript">

    $(document).mouseup(function(e)
    {
        var container = $("#choose-user");

        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0)
        {
            container.hide();
        }
    });

    $(".block-choose-tag").click(function(){
        var str = choose.val();
        var parts = str.split("@");
        var endstr="";
        for(var i=0 ; i< parts.length -1 ; i++){
            endstr = endstr + "@" + parts[i];
        }
        endstr = endstr + "@" + $(this).attr("user-name") + " ";
        endstr = endstr.replace("@@", "@");
        choose.val(endstr);

        $("#choose-user").hide();
        choose.focus();
    });
    var choose = $("#main-comment");
    $("#main-comment").keyup(function(){
        var choose = $("#main-comment");
        var str = $(this).val();
        var key = str[str.length - 1];
        var keycode = (event.keyCode ? event.keyCode : event.which);

        if(key=="@") {
            var offset = $(this).offset();
            $("#choose-user").show();
            $("#choose-user").css("top", offset.top - 200);
            $("#choose-user").css("left", offset.left);
            $("#choose-user").css("margin-top", "0px");
        }

        var parts = str.split("@");

        if(parts.length > 1){
            var keyword = parts[parts.length-1];
            var tag_blocks = $(".block-choose-tag");
            tag_blocks.each(function() {
                if($(this).attr("user-name").indexOf(keyword)>=0){
                    $(this).show();
                }else{
                    $(this).hide();
                }
            });

            var hiddens = $(".block-choose-tag:hidden")
            $("#choose-user").css("margin-top", "0px");
            var visibles = tag_blocks.length - hiddens.length;
            var space = 5 - visibles;
            if(space>0){
                $("#choose-user").css("margin-top", space*38 + "px");
            }


        }



        if(key==" ") {
            $("#choose-user").hide();
        }
        if(keycode == '27') {
            $("#choose-user").hide();
        }
    });
    function postSubmit(){
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

    function copyConfessionLink() {

        $("#myURL").show();
        var copyText = document.getElementById("myURL");
        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /*For mobile devices*/

        /* Copy the text inside the text field */
        document.execCommand("copy");

        /* Alert the copied text */
        $("#myURL").hide();
    }

    $(".categoryItem").click(function(){
        $(".categoryItem").removeClass("bg-gray-700");
        $(this).addClass("bg-gray-700");
        $("#category_id").val($(this).find('input').first().val());
    });

    window.addEventListener('DOMContentLoaded', () => {
        EmojiButton(document.querySelector('#emoji-button'), function (emoji) {
            $('.confession-input').html($('.confession-input').html() + emoji);
        });
    });

    function replaceImg(){
        $("#emoji-button").html('<img src="/public/allimage/simley.png" style="width: 23px;">');
    }

    setTimeout(function(){
        $("#emoji-button").html('<img src="/public/allimage/simley.png" style="width: 23px;">');
    }, 100);

    $(".bg-selector img").click(
        function () {
            $('#editConfessionModal .modal-body').css('background-image', 'url( "' + $(this).attr('src') +'")' );
            $("#background_image").val($(this).attr('src'));
            $('.bgPicker').hide();
        }
    );

    function reportSubmit(){
        var token = $("[name='_token']").first().val();
        $('#closeConfession').click();
        $('#reportResult').modal('toggle');

        $.post("/report/add",
        {
            _token: token,
            report_details: $("#report_details").val(),
            report_reason: $("#report_reason").val(),
            confession_id: $("#confession_id").val(),
        },
        function(data, status){

        });
    }
    $("#tagline").keydown(
        function () {
            if($("#count_tagline").html($("#tagline").val()))
            {
                $("#count_tagline").html($("#tagline").val().length);
            }
        }
    );
    if(typeof  $("#tagline").val() != 'undefined') {
        $("#count_tagline").html($("#tagline").val().length);
    }


    $(".bg-selector img").click(
        function () {
            $('#exampleModalCenter .modal-body').css('background-image', 'url( "' + $(this).attr('src') +'")' );
            $('.bgPicker').hide();
        }
    );
    var firtClick = true;
    $("#uimdbutton").click(function () {
        $('.bgPicker').show();
        setTimeout(function(){
            $('.emojiPicker').hide();
        }, 10);
    });

    $(document).ready(function(e) {
        $('.bgPicker').hide();

        $("#exampleModalCenter").on("hidden.bs.modal", function () {
            $('.emojiPicker').first().css('display', 'none');
        });

        $('#create').click(function(e) {
            e.preventDefault();
        });


        $('#toggle').click(function(e) {
            e.preventDefault();
        });

        $('#destroy').click(function(e) {
            e.preventDefault();
        });

        //let scrollDiv = document.querySelector(".scroll-wrapper");
        //SimpleScrollbar.initEl(scrollDiv);

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

        $("#email_draf").keydown(function () {
            $("#email").val($(this).val());
        });

        $("#email_draf").keyup(function () {
            $("#email").val($(this).val());
        });

        $(".follow-wrapper").click(function(){
            var userId = $(this).attr("user-id");
            var token = $("[name='_token']").first().val();

            var allWrapperSelector = ".follow-wrapper[user-id=" + userId + "]";
            if($(this).html().trim() == "Follow"){
                $(this).html("Unfollow");
                $(allWrapperSelector).html("Unfollow");
                $('#sub-follow').html("Unfollow");
                $.post("/add-follow",
                    {
                        _token: token,
                        userid: userId,
                    },
                    function(data, status){
                    });
            }else{
                if (confirm('Are you sure to unfollow this user?')) {
                    $(this).html("Follow");
                    $(allWrapperSelector).html("Follow");
                    $('#sub-follow').html("Follow");

                    $.post("/add-follow",
                        {
                            _token: token,
                            userid: userId,
                        },
                        function(data, status){
                        });
                }

            }
        });

        $("#details").keydown(function(){
            $("#report_details").val( $(this).val());
        });
        $("#details").keyup(function(){
            $("#report_details").val( $(this).val());
        });

        $(".reportItem").click(function(){
            $(".reportItem").removeClass("bg-gray-700");
            $(this).addClass("bg-gray-700");
            $("#confession_id").val($(".like-button").first().attr("post-id"));
            $("#report_reason").val( $(this).find("span").first().html());
        });

        $(".like-button").click(function(){
            var postId = $(this).attr("post-id");
            var token = $("[name='_token']").first().val();
            $.post("/add-like",
                {
                    _token: token,
                    userid: "{{auth()->user()->id}}",
                    post_id: postId,
                    likeable_type: "Confession"
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

        $(".comment-button").click(function(){
            $(".comment-input").focus();
        });
        $(".post-button").click(function(){
            var postId = $(this).attr("post-id");
            var token = $("[name='_token']").first().val();
            if($(".comment-input").first().val() != ""){
                $.post("/add-comment",
                    {
                        _token: token,
                        user_id: "{{auth()->user()->id}}",
                        confession_id: postId,
                        parent_id: 0,
                        content:  $(".comment-input").first().val()
                    },
                    function(data, status){
                        var comment_count = $("#total_comment_cound");
                        var comment_count_no = parseInt(comment_count.html()) + 1;
                        comment_count.html(comment_count_no);
                        $("#total_comment_cound_left").html(comment_count_no);
                        $("#comment-box-wrapper").prepend( '' +
                            '<div class="comment-block" comment-id="' + data +'">'+
                            '<div class="comment comment-l1" comment-id="' + data +'">'+
                            '<div class="three-dot dropdown" style="position: absolute; right: -20px; top: -12px;">'+
                            '<a href="#" data-toggle="dropdown">'+
                            '<i data-target="#commentModal" class="fa fa-ellipsis-h text-gray-600 mt-3"></i>'+
                            '</a>'+
                            '<ul class="dropdown-menu text-green-1 dropdown-menu-center"  style="background-color: rgb(243, 243, 243); margin-top: -10px;">'+
                            '<li class="bg-white fs12 text-green-1 edit-comment" comment-id="'+ data +'">'+
                            '<a href="#" class="rounded-t hover:bg-gray-400 py-2 px-6 block whitespace-no-wrap text-green-1">edit</a>'+
                            '</li>'+
                            '<li class="bg-white fs12 text-green-1 delete-comment" style="margin-top: 1px;" comment-id="'+ data +'">'+
                            '<a href="#" class="rounded-t hover:bg-gray-400 py-2 px-6 block whitespace-no-wrap text-green-1">delete</a>'+
                            '</li>'+
                            '</ul>'+
                            '</div>'+
                            ' <a href="/user/{{auth()->user()->username}}"><img src="/{{auth()->user()->avatar}}" class="cmt-avatar rounded-full"></a>'+

                            '<div class="cmt-content-infor ml-2" style="width: 300px;">'+
                            '<div class="cmt-content ml-2">'+
                            '<a href="/user/{{auth()->user()->username}}"><span class="font-bold text-green-1">{{auth()->user()->username}}</span> </a>'+
                            '<span class="text-gray-600 comment-content">' + myParse($(".comment-input").first().val()) +'</span>'+
                            '</div>'+
                            ' <hr class="ml-2 my-2">'+
                            '<div class="flex ml-2 text-gray-600">'+
                            '<span style="width:200px"> 1 minutes ago </span> <span class="font-bold ml-6 reply" style="cursor:pointer"> Reply </span>'+
                            '<div class="flex ml-8">'+
                            '<a href="#" class="like-button-comment flex" comment-id="'+ data +'">'+
                            '<span  class="text-gray-600"> ( </span><span class="like_count text-gray-600"> 0 </span><span class="text-gray-600"> ) </span>'+
                            '<img is-like="0" src="/public/allimage/feel.png" class="cmt-feel ml-2">'+
                            '</a>'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            ' </div>'+
                            '<div class="childComment">'+
                            '</div>'+
                            ' </div>'
                        );
                        $(".comment-input").first().val("");
                        $(".tt-scroll").scrollTop(0);
                        $(".title-first-post").remove();
                    });
            }




        });

        function reLike() {
            $(".like-button-comment").click(function () {
                    var likeable_id = $(this).attr("comment-id");
                    var token = $("[name='_token']").first().val();
                    var userid = $(this).closest(".comment").attr("user-id");
                    var postId = $(".like-button").first().attr("post-id");
                    $.post("/add-like-comment",
                        {
                            _token: token,
                            userid: userid,
                            likeable_id: likeable_id,
                            likeable_type: "Comment",
                            post_id: postId
                        },
                        function (data, status) {
                        });
                    var is_like = $(this).find('img').first().attr("is-like");
                    var like_count_dom = $(this).find('.like_count').first();

                    if (is_like == "0") {

                        $(this).find('img').first().attr("src", "/public/allimage/felt.png");
                        $(this).find('img').first().attr("is-like", "1");
                        like_count = parseInt(like_count_dom.html()) + 1;
                    } else {
                        $(this).find('img').first().attr("src", "/public/allimage/feel.png");
                        $(this).find('img').first().attr("is-like", "0");
                        like_count = parseInt(like_count_dom.html()) - 1;
                    }
                    like_count_dom.html(like_count);
                }
            );
        }



        function reReply(){
            $(".reply").click(function(){
                var commentBlock = $(this).closest(".comment-block");
                var childComment = commentBlock.find(".childComment").first();

                var childInputComments = childComment.find(".child-input-comment");
                if(childInputComments.length == 0) {
                    childComment.append('' +
                        '<div class="comment comment-l2 temp_input">' +
                        '<input class="child-input-comment" style="width:100%;height:30px; margin-left:30px" comment-id="' + $(commentBlock).attr("comment-id") + '"  >' +
                        ' </div>' +
                        '');

                    var childInputComment = childComment.find(".child-input-comment").first();
                    childInputComment.focus();
                }
            });
        }

        function reChildInput(){
            $(".child-input-comment").keypress(function(event){
                choose = $(this);
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                    var postId = $(".like-button").first().attr("post-id");
                    var token = $("[name='_token']").first().val();
                    var childCommentBlock = $(this).closest(".childComment");
                    $.post("/add-comment",
                        {
                            _token: token,
                            user_id: "{{auth()->user()->id}}",
                            confession_id: postId,
                            parent_id: $(this).attr("comment-id"),
                            content:  $(".child-input-comment").first().val()
                        },
                        function(data, status){
                            var comment_count = $("#total_comment_cound");
                            var comment_count_no = parseInt(comment_count.html()) + 1;
                            comment_count.html(comment_count_no);
                            $("#total_comment_cound_left").html(comment_count_no);
                            childCommentBlock.append( '' +
                                '<div class="comment comment-l2" comment-id="'+ data +'">'+
                                '<div class="three-dot dropdown" style="position: absolute; right: -20px; top: -12px;">'+
                                '<a href="#" data-toggle="dropdown">'+
                                '<i data-target="#commentModal" class="fa fa-ellipsis-h text-gray-600 mt-3"></i>'+
                                '</a>'+
                                '<ul class="dropdown-menu text-green-1 dropdown-menu-center"  style="background-color: rgb(243, 243, 243); margin-top: -10px;">'+
                                '<li class="bg-white fs12 text-green-1 edit-comment" comment-id="'+ data +'">'+
                                '<a href="#" class="rounded-t hover:bg-gray-400 py-2 px-6 block whitespace-no-wrap text-green-1">edit</a>'+
                                '</li>'+
                                '<li class="bg-white fs12 text-green-1 delete-comment-child" style="margin-top: 1px;" comment-id="'+ data +'">'+
                                '<a href="#" class="rounded-t hover:bg-gray-400 py-2 px-6 block whitespace-no-wrap text-green-1">delete</a>'+
                                '</li>'+
                                '</ul>'+
                                '</div>'+
                                ' <a href="/user/{{auth()->user()->username}}"><img src="/{{auth()->user()->avatar}}" class="cmt-avatar rounded-full"></a>'+

                                '<div class="cmt-content-infor ml-2" style="width: 240px;">'+
                                '<div class="cmt-content ml-2">'+
                                '<a href="/user/{{auth()->user()->username}}"><span class="font-bold text-green-1">{{auth()->user()->username}}</span> </a>'+
                                '<span class="text-gray-600 comment-content" >' + myParse($(".child-input-comment").first().val()) +'</span>'+
                                '</div>'+
                                ' <hr class="ml-2 my-2">'+
                                '<div class="flex ml-2 text-gray-600">'+
                                '<span style="width:200px"> 1 minutes ago </span> <span class="font-bold ml-6 reply" style="cursor:pointer"> Reply </span>'+
                                '<div class="flex ml-8">'+
                                '<a href="#" class="like-button-comment flex" comment-id="'+ data +'">'+
                                '<span  class="text-gray-600"> ( </span><span class="like_count text-gray-600"> 0 </span><span class="text-gray-600"> ) </span>'+
                                '<img is-like="0" src="/public/allimage/feel.png" class="cmt-feel ml-2">'+
                                '</a>'+
                                '</div>'+
                                '</div>'+
                                '</div>'+
                                ' </div>'
                            );
                            childCommentBlock.find(".temp_input").remove();
                        });
                }else{
                    var str = $(this).val();
                    var key = str[str.length - 1];
                    var keycode = (event.keyCode ? event.keyCode : event.which);

                    if(key=="@") {
                        var offset = $(this).offset();
                        $("#choose-user").show();
                        $("#choose-user").css("top", offset.top - 200);
                        $("#choose-user").css("left", offset.left);
                        $("#choose-user").css("margin-top", "0px");
                    }

                    var parts = str.split("@");

                    if(parts.length > 1){
                        var keyword = parts[parts.length-1];
                        var tag_blocks = $(".block-choose-tag");
                        tag_blocks.each(function() {
                            if($(this).attr("user-name").indexOf(keyword)>=0){
                                $(this).show();
                            }else{
                                $(this).hide();
                            }
                        });

                        var hiddens = $(".block-choose-tag:hidden")
                        $("#choose-user").css("margin-top", "0px");
                        var visibles = tag_blocks.length - hiddens.length;
                        var space = 5 - visibles;
                        if(space>0){
                            $("#choose-user").css("margin-top", space*38 + "px");
                        }


                    }



                    if(key==" ") {
                        $("#choose-user").hide();
                    }
                    if(keycode == '27') {
                        $("#choose-user").hide();
                    }
                }
            });
        }


        $('#comment-box-wrapper').bind('DOMSubtreeModified', function(){
            setTimeout(function(){
                $( ".reply").unbind( "click" );
                $( ".like-button-comment").unbind( "click" );
                $( ".comment-content").unbind( "click" );
                $( ".delete-comment").unbind( "click" );
                $( ".edit-comment").unbind( "click" );
                $( ".delete-comment-child").unbind( "click" );
                reEditComment();
                reComment();
                reDeleteComment();
                reLike();
                reReply();
                reChildInput();
                reDeleteCommentChild();
                }, 500);
        });

        function reEditComment(){
            $(".edit-comment").click(function(){
                var comment = $(this).closest(".comment");
                var commentContent = comment.find(".comment-content").first();
                var cmtContent = comment.find(".cmt-content").first();
                var ahef = cmtContent.find("a").first();
                ahef.hide();
                commentContent.attr("contenteditable", "true");
                cmtContent.css("background-color", "white");
                commentContent.focus();
                commentContent.css("display", "block");
            });
        }

        function reComment() {
            $(".comment-content").keypress(function (event) {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == '13') {
                    var comment = $(this).closest(".comment");
                    var commentContent = comment.find(".comment-content").first();
                    var cmtContent = comment.find(".cmt-content").first();
                    var ahef = cmtContent.find("a").first();
                    ahef.show();
                    commentContent.attr("contenteditable", "false");
                    cmtContent.css("background-color", "transparent");
                    commentContent.css("display", "inline-block");

                    var token = $("[name='_token']").first().val();
                    var content = commentContent.html();
                    content = content.replace("&nbsp;", " ");

                    $.post("/edit-comment",
                        {
                            _token: token,
                            id: comment.attr("comment-id"),
                            comment_content: $.trim(content)
                        },
                        function (data, status) {
                        });
                }
            });
        }

        function reDeleteComment() {
            $(".delete-comment").click(function (event) {
                if (confirm('Are you sure to delete this comment?')) {
                    var commentBlock = $(this).closest(".comment-block");
                    var comment = $(this).closest(".comment");
                    var comments = commentBlock.find(".comment");
                    var noComment = comments.length;

                    var token = $("[name='_token']").first().val();
                    $.post("/delete-comment",
                        {
                            _token: token,
                            id: comment.attr("comment-id"),
                        },
                        function (data, status) {
                            comments.remove();
                            commentBlock.remove();
                            var comment_count = $("#total_comment_cound");
                            var comment_count_no = parseInt(comment_count.html()) - noComment;
                            comment_count.html(comment_count_no);
                            $("#total_comment_cound_left").html(comment_count_no);

                            var wrapper = $("#comment-box-wrapper");
                            var commentBlocks = wrapper.find(".comment-block");

                            if (commentBlocks.length == 0) {
                                wrapper.append('<div class="text-center mt-2 title-first-post" > <span> There is no comment for this post,</span> <span class="text-green-1" style="cursor: pointer" onclick="firstPost();" class="do-first-post">click here</span> <span> to put first comment</span></div>');
                            }
                        });
                }


            });
        }

        function reDeleteCommentChild() {
            $(".delete-comment-child").click(function (event) {
                if (confirm('Are you sure to delete this comment?')) {
                    var comment = $(this).closest(".comment");

                    var token = $("[name='_token']").first().val();
                    $.post("/delete-comment",
                        {
                            _token: token,
                            id: comment.attr("comment-id"),
                        },
                        function (data, status) {
                            comment.remove();
                            var comment_count = $("#total_comment_cound");
                            var comment_count_no = parseInt(comment_count.html()) - 1;
                            comment_count.html(comment_count_no);
                            $("#total_comment_cound_left").html(comment_count_no);

                        });
                }


            });
        }


        reEditComment();
        reComment();
        reDeleteComment();
        reLike();
        reReply();
        reChildInput();
        reDeleteCommentChild()
    });

    $(".comment-input").keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13') {
            $(".post-button").click();
        }
    });



    function firstpost(){
        $('.comment-input').focus();$('.add-cmt').css('','');
    }

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
