<?php

namespace App\Http\Controllers\Front;

use App\Model\Confession;
use App\Model\Follower;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    public function index($username)
    {
        $item = User::where('username', $username)->first();
        if($item->username == auth()->user()->username){
            $item->is_me = 1;
        }else{
            $item->is_me = 0;
        }

        $is_follow = Follower::query()
            ->where('user_id', auth()->user()->id)
            ->where('user_follow_id', $item->id)
            ->get();

        if(isset($is_follow) && sizeof($is_follow) > 0){
            $item->is_follow = true;
        }else{
            $item->is_follow = false;
        }
        $item->showFollow = true;
        $item->user_follow_id = $item->id;

        $list = Confession::query()
            ->leftjoin('likes', function($join)
            {
                $join->on('confessions.id', '=', 'likes.likeable_id');
                $join->on('likes.likeable_type','=', DB::raw('"App\Confession"'));
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
            ->where("confessions.user_id","=", $item->id)
            ->orderBy('confessions.id','desc')->limit(50)->get(['confessions.id', 'confessions.text', 'confessions.user_id', 'confessions.category_id',
                'confessions.background_image','confessions.like_count', 'confessions.comment_count', 'confessions.username', 'confessions.created_at', 'categories.slug','users.avatar',
                'confessions.user_name', DB::raw('count(likes.id) as is_like'), DB::raw('categories.name as categories_name'),DB::raw('count(follower.id) as is_follow')]);
        foreach($list as $item_list){
            $item_list->ago = $item_list->created_at->diffForHumans();
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
            $item_list->loginId = auth()->user()->id;
        }
        return view('front.user_profile')->with("item", $item)->with('list', $list);
    }

    public function myFelt($username)
    {
        //$user = User::where('username', $username)->first();
        return view('front.my_felt');
        // return view('front.user_.profile', compact('user'));
    }

}
