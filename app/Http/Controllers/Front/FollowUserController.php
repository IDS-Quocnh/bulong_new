<?php

namespace App\Http\Controllers\Front;

use App\Bulong\Users\User;
use App\Model\Confession;
use App\Model\Follower;
use App\Model\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowUserController extends Controller
{
    public function store(Request $request)
    {
        $user = User::findOrFail($request->id);

        auth()->user()->toggleFollow($user);

        return response()->json(['message' => 'success']);
    }

    public function addFollow(Request $request){
        $follower = Follower::query()
            ->where('user_id',"=",auth()->user()->id)
            ->where('user_follow_id',"=", $request->userid)
            ->get()->first();

        if(isset($follower)){
            $follower->delete();
        }else{
            $follower = new Follower;
            $follower->user_id = auth()->user()->id;
            $follower->user_follow_id = $request->userid;
            $follower->save();
          }
    }
}
