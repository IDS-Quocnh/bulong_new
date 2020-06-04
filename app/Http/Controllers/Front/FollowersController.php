<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;

class FollowersController extends Controller
{
    public function index()
    {
        $list = User::query()
            ->join("follower", "users.id","=","follower.user_id")
            ->where('user_follow_id','=',auth()->user()->id)
            ->get();
        foreach ($list as $item){
            $item->subname = substr($item->username,0,10);
        }

        return view('front.follower')->with('list', $list);
    }
}
