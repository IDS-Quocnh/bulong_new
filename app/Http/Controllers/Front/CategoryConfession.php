<?php

namespace App\Http\Controllers\Front;

use App\Bulong\Users\User;
use App\Model\Confession;
use Illuminate\Http\Request;
use App\Model\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryConfession extends Controller
{
    public function index(Request $request)
    {

        $ip = $request->ip();
        $user = \App\Bulong\Users\User::find(auth()->user()->id);
        $user->ip_address = $ip;
        $user->save();


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
            ->orderBy('confessions.id','desc')
            ->limit(50)
            ->havingRaw('categories.slug = "' . $request->slug .'"')
            ->get(['confessions.id', 'confessions.text', 'confessions.user_id', 'confessions.category_id',
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
        $category = Categories::query()
            ->where('slug','=',$request->slug)->first();
        return view('front.category')->with('list', $list)->with('category', $category);
    }
}
