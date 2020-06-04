<?php

namespace App\Http\Controllers\Front;

use App\Confession;
use App\Model\Hashtag;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {

        $userList = User::query()
            ->where("username","like","%".$request->q."%")
            ->get();

        $userList = User::query()
            ->where("username","like","%".$request->q."%")
            ->limit(5)
            ->get();

        foreach ($userList as $item){
            $item->subname = substr($item->username,0,12);
        }

        $hashTagList = Hashtag::query()
            ->where("name","like","%".$request->q."%")
            ->limit(15)
            ->get();

        $list = \App\Model\Confession::query()
            ->leftjoin('likes', function($join)
            {
                $join->on('confessions.id', '=', 'likes.likeable_id');
                $join->on('likes.likeable_type','=', DB::raw('"Confession"'));
                $join->on('likes.user_id','=', DB::raw('"'. auth()->user()->id . '"'));
            })
            ->leftJoin("users", "confessions.user_id", "=","users.id")
            ->leftJoin("categories", "categories.id", "=","confessions.category_id")
            ->leftjoin('follower', function($join)
            {
                $join->on('follower.user_id', '=', DB::raw('"'. auth()->user()->id. '"'));
                $join->on('follower.user_follow_id','=', 'confessions.user_id');
            })
            ->groupBy(['confessions.id', 'confessions.text', 'confessions.user_id', 'confessions.category_id',
                'confessions.background_image','confessions.like_count', 'confessions.comment_count', 'confessions.username','confessions.created_at',
                'confessions.user_name', 'categories.name', 'categories.slug','users.avatar'])
            ->where("text","like","%".$request->q."%")
            ->orderBy('confessions.id','desc')->limit(50)->get(['confessions.id', 'confessions.text', 'confessions.user_id', 'confessions.category_id',
                'confessions.background_image','confessions.like_count', 'confessions.comment_count', 'confessions.username', 'confessions.created_at', 'categories.slug',
                'confessions.user_name', DB::raw('count(likes.id) as is_like'), DB::raw('categories.name as categories_name'),DB::raw('count(follower.id) as is_follow'),
                'users.avatar']);

        foreach($list as $item){
            $item->ago = $item->created_at->diffForHumans();
            $item->ago = str_replace("minutes ago","m",$item->ago);
            $item->ago = str_replace("minute ago","m",$item->ago);
            $item->ago = str_replace("hours ago","h",$item->ago);
            $item->ago = str_replace("hour ago","h",$item->ago);
            $item->ago = str_replace("days ago","d",$item->ago);
            $item->ago = str_replace("day ago","d",$item->ago);
            $item->ago = str_replace("months ago","mo",$item->ago);
            $item->ago = str_replace("month ago","mo",$item->ago);
            $item->ago = str_replace("weeks ago","w",$item->ago);
            $item->ago = str_replace("week ago","w",$item->ago);
            $item->ago = str_replace("years ago","y",$item->ago);
            $item->ago = str_replace("year ago","y",$item->ago);
            $item->loginId = auth()->user()->id;
        }

        if(isset($request->type) && $request->type == "confession"){
            return view('front.search-confession')->with("userList",$userList)->with("hashTagList",$hashTagList)->with("confessionList",$list)->with("keyword", $request->q)->with("showConfession", true);
        }

        return view('front.search')->with("userList",$userList)->with("hashTagList",$hashTagList)->with("confessionList",$list)->with("keyword", $request->q);
    }

    public function hashTagList(Request $request)
    {

        $hashTagList = Hashtag::query()
            ->where("name","like","%".$request->q."%")
            ->limit(100)
            ->get();
        return view('front.search-hashtag')->with("hashTagList",$hashTagList)->with("keyword", $request->q);
    }


    public function hashTag(Request $request)
    {
        $list = \App\Model\Confession::query()
            ->leftjoin('likes', function($join)
            {
                $join->on('confessions.id', '=', 'likes.likeable_id');
                $join->on('likes.likeable_type','=', DB::raw('"Confession"'));
                $join->on('likes.user_id','=', DB::raw('"'. auth()->user()->id . '"'));
            })
            ->leftJoin("users", "confessions.user_id", "=","users.id")
            ->leftJoin("categories", "categories.id", "=","confessions.category_id")
            ->leftjoin('follower', function($join)
            {
                $join->on('follower.user_id', '=', DB::raw('"'. auth()->user()->id. '"'));
                $join->on('follower.user_follow_id','=', 'confessions.user_id');
            })
            ->groupBy(['confessions.id', 'confessions.text', 'confessions.user_id', 'confessions.category_id',
                'confessions.background_image','confessions.like_count', 'confessions.comment_count', 'confessions.username','confessions.created_at',
                'confessions.user_name', 'categories.name', 'categories.slug','users.avatar'])
            ->where("text","like","%".$request->name."%")
            ->orderBy('confessions.id','desc')->limit(50)->get(['confessions.id', 'confessions.text', 'confessions.user_id', 'confessions.category_id',
                'confessions.background_image','confessions.like_count', 'confessions.comment_count', 'confessions.username', 'confessions.created_at', 'categories.slug',
                'confessions.user_name', DB::raw('count(likes.id) as is_like'), DB::raw('categories.name as categories_name'),DB::raw('count(follower.id) as is_follow'),
                'users.avatar']);

        foreach($list as $item){
            $item->ago = $item->created_at->diffForHumans();
            $item->ago = str_replace("minutes ago","m",$item->ago);
            $item->ago = str_replace("minute ago","m",$item->ago);
            $item->ago = str_replace("hours ago","h",$item->ago);
            $item->ago = str_replace("hour ago","h",$item->ago);
            $item->ago = str_replace("days ago","d",$item->ago);
            $item->ago = str_replace("day ago","d",$item->ago);
            $item->ago = str_replace("months ago","mo",$item->ago);
            $item->ago = str_replace("month ago","mo",$item->ago);
            $item->ago = str_replace("weeks ago","w",$item->ago);
            $item->ago = str_replace("week ago","w",$item->ago);
            $item->ago = str_replace("years ago","y",$item->ago);
            $item->ago = str_replace("year ago","y",$item->ago);
            $item->loginId = auth()->user()->id;
        }

        return view('front.search')->with("confessionList",$list)->with("keyword", "#". $request->name)->with("showConfession", true);
    }

    public function user(Request $request)
    {

        $userList = User::query()
            ->where("username","like","%".$request->q."%")
            ->get();

        $userList = User::query()
            ->where("username","like","%".$request->q."%")
            ->limit(50)
            ->get();

        foreach ($userList as $item){
            $item->subname = substr($item->username,0,12);
        }

        return view('front.search-user')->with("userList",$userList)->with("keyword", $request->q);
    }



}
