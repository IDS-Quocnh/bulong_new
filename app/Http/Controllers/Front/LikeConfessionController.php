<?php

namespace App\Http\Controllers\Front;

use App\Model\Comment;
use App\Model\Confession;
use App\Model\Notification;
use App\Model\Stat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\FeltConfession;
use App\Model\Like;
use Illuminate\Support\Facades\DB;

class LikeConfessionController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->id);
        $confession = Confession::findOrFail($request->id);

        if (!auth()->user()->hasLiked($confession)) {
            $confession->user->notify(new FeltConfession($confession));
            auth()->user()->like($confession);
            $confession->increment('like');
        } else {
            auth()->user()->unlike($confession);
            $confession->decrement('like');
        }

        return response()->json(['message' => 'success']);
    }

    public function addLike(Request $request){
        $like = Like::query()
            ->where('likeable_type',"=","Confession")
            ->where('user_id',"=",auth()->user()->id)
            ->where('likeable_id','=',$request->post_id)
            ->get()->first();
        $confession = Confession::find($request->post_id);

        if(isset($like)){
            $like->delete();

            $confession->like_count --;
            $confession->save();
            if($confession->user_id != auth()->user()->id) {
                $notification = Notification::query()
                    ->where('type', "=", "post-like")
                    ->where('from_user_id', "=", auth()->user()->id)
                    ->where('to_user_id', "=", $confession->user_id)
                    ->where('confession_id', "=", $confession->id)
                    ->first();
                $notification->delete();
            }

            $stas = Stat::query()->whereRaw( DB::raw('DATE(created_at) = curdate()'))->first();
            if(!isset($stas)){
                $stas = new Stat;
            }
            $stas->feel_today --;
            $stas->save();

        }else{
            $like = new Like;
            $like->user_id = auth()->user()->id;
            $like->likeable_type = "Confession";
            $like->likeable_id = $request->post_id;
            $like->save();
            $confession->like_count ++;
            $confession->save();

            $stas = Stat::query()->whereRaw( DB::raw('DATE(created_at) = curdate()'))->first();
            if(!isset($stas)){
                $stas = new Stat;
            }
            $stas->feel_today ++;
            $stas->save();

            if($confession->user_id != auth()->user()->id) {
                $notification = new Notification;
                $notification->type = "post-like";
                $notification->from_user_id = auth()->user()->id;
                $notification->to_user_id = $confession->user_id;
                $notification->confession_id = $confession->id;
                $notification->save();
            }
        }
    }

    public function addLikeComment(Request $request){
        $like = Like::query()
            ->where('likeable_type',"=","Comment")
            ->where('user_id',"=",auth()->user()->id)
            ->where('likeable_id','=',$request->likeable_id)
            ->get()->first();
        $comment = Comment::find($request->likeable_id);

        $confession = Confession::find($request->post_id);
        if(isset($like)){
            $like->delete();

            $comment->like_count --;
            $comment->save();
            if($confession->user_id != auth()->user()->id) {
                $notification = Notification::query()
                    ->where('type', "=", "comment-like")
                    ->where('from_user_id', "=", auth()->user()->id)
                    ->where('to_user_id', "=", $confession->user_id)
                    ->where('confession_id', "=", $confession->id)
                    ->first();

            $notification->delete();
            $stas = Stat::query()->whereRaw( DB::raw('DATE(created_at) = curdate()'))->first();
            if(!isset($stas)){
                $stas = new Stat;
            }
            $stas->feel_today --;
            $stas->save();
            }
        }else{
            $like = new Like;
            $like->user_id = auth()->user()->id;
            $like->likeable_type = "Comment";
            $like->likeable_id = $request->likeable_id;
            $like->save();
            $comment->like_count ++;
            $comment->save();

            if($request->userid != auth()->user()->id) {
                $notification = new Notification;
                $notification->type = "comment-like";
                $notification->from_user_id = auth()->user()->id;
                $notification->to_user_id = $request->userid;
                $notification->confession_id = $confession->id;
                $notification->save();
            }
            $stas = Stat::query()->whereRaw( DB::raw('DATE(created_at) = curdate()'))->first();
            if(!isset($stas)){
                $stas = new Stat;
            }
            $stas->feel_today ++;
            $stas->save();

        }
    }

}
