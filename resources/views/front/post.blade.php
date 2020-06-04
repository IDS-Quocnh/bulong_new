@extends('layouts.single')
@section('content')
    @php
        $listUser = App\Model\User::query()
        ->leftjoin('follower', function($join)
        {
            $join->on('users.id', '=', 'follower.user_id');
            $join->orOn('users.id','=', 'follower.user_follow_id');
        })
        ->where("follower.user_id","=", auth()->user()->id)
        ->orWhere("follower.user_follow_id","=", auth()->user()->id)
        ->groupBy('users.username', 'users.avatar', 'users.id')
        ->get(['users.username', 'users.avatar', 'users.id']);

        foreach ($listUser as $user){
            $user->subname = substr($user->username,0,14);
        }
    @endphp
    <div class="pt-2">
        @if(!$windowMode == "true")
        @include('front.topad')
        @endif
        <div class="jccenter " style="width: 1000px;">
            <main class="feed mt-1 mr-auto">
                <div class="flex flex-col justify-center items-center ">
                    <div style="width: 100%">
                        <div>
                            <div class=" @if(!$windowMode == "true") mt-4  @endif mb-8 bg-white border rounded-lg shadow">
                                <div class="bg-white flex rounded" style="height: 80px">
                                    <div class="flex justify-between p-4" style="width: 530px">
                                        <div class="flex">
                                            <div><a href="/user/{{$item->username}}"><img
                                                        src="/{{$item->avatar}}"
                                                        class="h-10 w-10 mr-2 rounded-full"></a></div>
                                            <div @if(auth()->user()->id == $item->user_id) class="mt-2"  @endif>
                                                <div style="text-align: center"><a href="/user/{{$item->username}}"
                                                                                   class="text-teal-600 font-bold mr-1 text-green-1">{{$item->username}}</a>
                                                </div>
                                                <div >
                                                    @if(auth()->user()->id != $item->user_id)
                                                    <button class="px-6 text-sm text-white bg-yellow-600 rounded follow-wrapper" user-id="{{$item->user_id}}" >
                                                        @if(!$item->is_follow)
                                                        Follow
                                                        @endif

                                                        @if($item->is_follow)
                                                                Unfollow
                                                        @endif
                                                    </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="cursor-pointer"><i class="fa fa-ellipsis-h text-gray-600 mt-3"
                                                                           data-toggle="modal"
                                                                           data-target="#exampleModal"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="" style="width: 450px;">
                                        <div class="float-right flex" style="margin-top: 50px">
                                            <img lass="" src="/public/allimage/comment.png" style="width: 28px;" />
                                            <span class="text-gray-700 mx-2 font-bold mt-1"> <span id="total_comment_cound">{{$item->comment_count}}</span>  comments
                                        </div>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div
                                        class="h-135 -z-10 flex justify-center items-center bg-cover bg-center"
                                        style="background-image: url('{{$item->background_image}}');  width: 530px; @if(!$windowMode == "true") max-height: 540px;  @else  max-height: 450px; @endif " >
                                        <p class="px-4 text-xl font-extrabold" style="font-family: HelveticaNeue; text-align: center">
                                            {{$item->text}}
                                        </p>
                                    </div>
                                    <div class="bg-gray-1" style="width: 470px;  @if(!$windowMode == "true") max-height: 540px;  @else  max-height: 450px; @endif  ">
                                        <div class="ml-12 overflow-scroll scroll-wrapper disable-scrollbars tt-scroll" style="  @if(!$windowMode == "true") height: 530px;  @else height: 450px; @endif  margin-right: 5px">
                                            <div style="width: 340px" id="comment-box-wrapper">
                                                @foreach($commentList as $comment)
                                                    <div class="comment-block" comment-id="{{$comment->id}}">
                                                        <div class="comment comment-l1" comment-id="{{$comment->id}}" user-id="{{$comment->user_id}}">
                                                            @if($comment->user_id == auth()->user()->id)
                                                            <div class="three-dot dropdown" style="position: absolute; right: -20px; top: -12px">
                                                                <a class="" href="#" data-toggle="dropdown"> <i data-target="#commentModal" class="fa fa-ellipsis-h text-gray-600 mt-3"></i></a>
                                                                <ul class="dropdown-menu text-green-1 dropdown-menu-center"
                                                                    style="background-color: #F3F3F3; margin-top: -10px">
                                                                    <li class="bg-white fs12 text-green-1 edit-comment" comment-id="{{$comment->id}}"><a
                                                                            href="#"
                                                                            class="rounded-t hover:bg-gray-400 py-2 px-6 block whitespace-no-wrap text-green-1">edit</a>
                                                                    </li>
                                                                    <li class="bg-white fs12 text-green-1 delete-comment" comment-id="{{$comment->id}}"
                                                                        style="margin-top: 1px"><a
                                                                            href="#"
                                                                            class="rounded-t hover:bg-gray-400 py-2 px-6 block whitespace-no-wrap text-green-1">delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            @endif
                                                            <a href="/user/{{$comment->username}}"><img class="cmt-avatar rounded-full" src="/{{$comment->avatar}}" /></a>
                                                            <div class="cmt-content-infor ml-2" style="width: 300px">
                                                                <div class="cmt-content ml-2">
                                                                    <a href="/user/{{$comment->username}}">
                                                                        <span class="font-bold text-green-1">{{$comment->username}}</span>
                                                                    </a>
                                                                    <span class="text-gray-600 comment-content">{!!html_entity_decode($comment->content)!!}</span>
                                                                </div>
                                                                <hr class="ml-2 my-2"/>
                                                                <div class="flex ml-2 text-gray-600" >
                                                                    <span style="width:200px"> {{$comment->ago}} </span>
                                                                    <span class="font-bold ml-6 reply" style="cursor: pointer" comment-id="{{$comment->id}}"> Reply </span>
                                                                    <div class="flex ml-8">
                                                                        <a href="#" class="like-button-comment flex" comment-id = "{{$comment->id}}" >
                                                                            <span  class="text-gray-600"> ( </span><span class="like_count text-gray-600"> {{$comment->like_count}} </span><span class="text-gray-600"> ) </span>
                                                                            @if(isset($comment->likeable_type))
                                                                            <img is-like="1" class="cmt-feel ml-2" src="/public/allimage/felt.png" />
                                                                            @else
                                                                            <img is-like="0" class="cmt-feel ml-2" src="/public/allimage/feel.png" />
                                                                            @endif
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="childComment">
                                                            @foreach($comment->commentLayer2List as $commentLayer2)

                                                                <div class="comment comment-l2" comment-id="{{$commentLayer2->id}}" user-id="{{$commentLayer2->user_id}}">
                                                                    @if($comment->user_id == auth()->user()->id)
                                                                    <div class="three-dot dropdown" style="position: absolute; right: -20px; top: -12px;">
                                                                        <a href="#" data-toggle="dropdown"><i data-target="#commentModal" class="fa fa-ellipsis-h text-gray-600 mt-3"></i></a>
                                                                        <ul class="dropdown-menu text-green-1 dropdown-menu-center" style="background-color: rgb(243, 243, 243); margin-top: -10px;">
                                                                            <li class="bg-white fs12 text-green-1 edit-comment" comment-id="{{$comment->id}}"><a href="#" class="rounded-t hover:bg-gray-400 py-2 px-6 block whitespace-no-wrap text-green-1">edit</a></li>
                                                                            <li class="bg-white fs12 text-green-1 delete-comment-child" comment-id="{{$comment->id}}" style="margin-top: 1px;"><a href="#" class="rounded-t hover:bg-gray-400 py-2 px-6 block whitespace-no-wrap text-green-1">delete</a></li>
                                                                        </ul>
                                                                    </div>
                                                                    @endif
                                                                    <a href="/user/{{$commentLayer2->username}}"><img src="/{{$commentLayer2->avatar}}" class="cmt-avatar rounded-full"></a>
                                                                    <div class="cmt-content-infor ml-2" style="width: 240px;">
                                                                        <div class="cmt-content ml-2"><a href="/user/{{$commentLayer2->username}}"><span class="font-bold text-green-1">{{$commentLayer2->username}}</span> </a><span class="text-gray-600 comment-content">&nbsp; {!!html_entity_decode($commentLayer2->content)!!}</span></div>
                                                                        <hr class="ml-2 my-2">
                                                                        <div class="flex ml-2 text-gray-600">
                                                                            <span style="width:200px"> {{$commentLayer2->ago}} </span> <span class="font-bold ml-6 reply" style="cursor:pointer"> Reply </span>
                                                                            <div class="flex ml-8"><a href="#" class="like-button-comment flex" comment-id = "{{$commentLayer2->id}}"><span class="text-gray-600"> ( </span><span class="like_count text-gray-600">  {{$commentLayer2->like_count}} </span><span class="text-gray-600"> ) </span>
                                                                                    @if(isset($commentLayer2->likeable_type))
                                                                                        <img is-like="1" class="cmt-feel ml-2" src="/public/allimage/felt.png" />
                                                                                    @else
                                                                                        <img is-like="0" class="cmt-feel ml-2" src="/public/allimage/feel.png" />
                                                                                    @endif
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                        @endforeach
                                                        </div>
                                                    </div>
                                                @endforeach

                                                @if(sizeof($commentList) == 0)
                                                    <div class="text-center mt-2 title-first-post" >
                                                        <span> There is no comment for this post,</span> <span class="text-green-1" style="cursor: pointer" onclick="firstPost();" class="do-first-post">click here</span> <span> to put first comment</span>
                                                    </div>
                                                @endif

                                                @if(sizeof($commentList) > 10)
                                                <div class="text-center">
                                                    <a href="#" class="text-green-1 font-bold fs13">
                                                        See More
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pb-2 flex">
                                    <div class="flex" style="width: 530px">
                                        <div class=" ml-4 flex flex-col items-center cursor-pointer like-button" post-id="{{$item->id}}"><span class="like_count">{{$item->like_count}}</span>
                                            @if($item->is_like)
                                            <img is-like="1" src="/public/allimage/felt.png" class="cmt-feel"></div>
                                            @else
                                            <img is-like="0"  src="/public/allimage/feel.png" class="cmt-feel"></div>
                                            @endif
                                        <div class="mx-4 flex flex-col items-center cursor-pointer comment-button comment-link"><span id="total_comment_cound_left">{{$item->comment_count}}</span>
                                            <img
                                                src="/public/allimage/comment.png" class="cmt-feel">
                                        </div>
                                        <div class="flex flex-col justify-end cursor-pointer"><img
                                                src="/public/allimage/share.png" class="cmt-feel" data-toggle="modal"
                                                data-target="#shareModal"></div>
                                        <div style="width:410px">
                                            <div class="mt-2 text-sm lg:flex lg:justify-end fs12" style="float: right"><span
                                                    class="mr-2 text-gray-600">Posted {{ $item->ago }} on</span>
                                                <a href="/category/{{ $item->slug }}"
                                                   class="mr-4 text-teal-600 font-bold text-green-1">{{ $item->categories_name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex mt-3 add-cmt" style="width: 470px">
                                        <div class="ml-5">
                                            <input class="comment-input" id="main-comment"  placeholder="Add a comment..." style="width : 300px" />
                                        </div>
                                        <span post-id="{{$item->id}}" style="color: rgb(120, 194, 255); font-weight: bold; cursor: pointer" class="fs15 ml-12 font-bold post-button">
                                          Post
                                          </span>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
        </div>
    </div>
    <div id="choose-user"
         style="position: absolute; top : 100px; left:100px; display: none; background-color: white; max-height: 190px ; overflow: hidden" class="rounded"
         >
        @foreach($listUser as $user)
            <a style="cursor: pointer" class="item-drop-down py-1 flex block-choose-tag" user-id="{{$user->id}}" user-name="{{$user->username}}" ><img class="rounded-full inline" src="/{{$user->avatar}}" style="height: 30px; width: 30px" /> <span class="text-green-1 ml-2">{{$user->subname}}</span> </a>
        @endforeach

    </div>

    @if(!$windowMode == "true")
        <a style="position: relative;" class="flex footer mb-2">
            <span>About Us </span>
            <span>Privacy and Cookie Policy </span>
            <span>Terms of Use </span>
            <span>Contact Us </span>
            <span>Advertise With Us </span>
            <div class="absolute right-0 font-bold ">
                © 2020 Bulong
            </div>
        </a>
    @endif

@endsection
