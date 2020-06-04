<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;

class FollowingController extends Controller
{
    public function index()
    {
        $list = User::query()
            ->join("follower", "users.id","=","follower.user_follow_id")
            ->where('user_id','=',auth()->user()->id)
            ->get();
        foreach ($list as $item){
            $item->subname = substr($item->username,0,10);
            $item->showFollow = true;
            $item->is_follow = true;
            $item->is_me = 0;
        }

        return view('front.following')->with('list', $list);
    }
}
