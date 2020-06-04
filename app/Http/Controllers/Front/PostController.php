<?php

namespace App\Http\Controllers\Front;

use App\Bulong\Users\User;
use App\Model\Confession;
use App\Model\Comment;
use App\Model\Hashtag;
use App\Model\Notification;
use App\Model\Poll;
use App\Model\ReportConfession;
use App\Model\Stat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use stdClass;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $ip = $request->ip();
        $user = User::find(auth()->user()->id);
        $user->ip_address = $ip;
        $user->save();

        $item = Confession::query()
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
            ->where('confessions.id', $request->id)
            ->groupBy(['confessions.id', 'confessions.text', 'confessions.user_id', 'confessions.category_id',
                'confessions.background_image','confessions.like_count', 'confessions.comment_count', 'confessions.username','confessions.created_at',
                'confessions.user_name', 'categories.name', 'categories.slug', 'users.avatar', 'categories.slug'])
            ->get(['confessions.id','users.avatar', 'confessions.text', 'confessions.user_id', 'confessions.category_id',
                'confessions.background_image','confessions.like_count', 'confessions.comment_count', 'confessions.username', 'confessions.created_at', 'categories.slug',
                'confessions.user_name', DB::raw('count(likes.id) as is_like'), DB::raw('categories.name as categories_name'),DB::raw('count(follower.id) as is_follow'),
            ])
            ->first();
        if(!isset($item)){
            return redirect()->route('home');
        }
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
        $commentList= Comment::query()
            ->join("users","comments.user_id", "=", "users.id")
            ->leftjoin('likes', function($join)
            {
                $join->on('comments.id', '=', 'likes.likeable_id');
                $join->on('likes.likeable_type','=', DB::raw('"Comment"'));
                $join->on('likes.user_id','=', DB::raw('"'. auth()->user()->id . '"'));
            })
            ->where("confession_id","=", $request->id)
            ->where('parent_id', "=",0)
            ->orderBy('comments.id','desc')
            ->get(['comments.id','comments.user_id','comments.content','comments.created_at','comments.confession_id','comments.like_count','likes.likeable_type','users.avatar', 'users.username']);
        foreach($commentList as $comment){
            $comment->ago = $comment->created_at->diffForHumans();
            $comment->ago = str_replace("minutes ago","m",$comment->ago);
            $comment->ago = str_replace("minute ago","m",$comment->ago);
            $comment->ago = str_replace("hours ago","h",$comment->ago);
            $comment->ago = str_replace("hour ago","h",$comment->ago);
            $comment->ago = str_replace("days ago","d",$comment->ago);
            $comment->ago = str_replace("day ago","d",$comment->ago);
            $comment->ago = str_replace("months ago","mo",$comment->ago);
            $comment->ago = str_replace("month ago","mo",$comment->ago);
            $comment->ago = str_replace("weeks ago","w",$comment->ago);
            $comment->ago = str_replace("week ago","w",$comment->ago);
            $comment->ago = str_replace("years ago","y",$comment->ago);
            $comment->ago = str_replace("year ago","y",$comment->ago);

        }

        $commentListLayer2= Comment::query()
            ->join("users","comments.user_id", "=", "users.id")
            ->leftjoin('likes', function($join)
            {
                $join->on('comments.id', '=', 'likes.likeable_id');
                $join->on('likes.likeable_type','=', DB::raw('"Comment"'));
                $join->on('likes.user_id','=', DB::raw('"'. auth()->user()->id . '"'));
            })
            ->where("confession_id","=", $request->id)
            ->where('parent_id', "!=",0)
            ->orderBy('comments.id','asc')
            ->get(['comments.id','comments.user_id','comments.content','comments.parent_id','comments.created_at','comments.confession_id','comments.like_count','likes.likeable_type','users.avatar', 'users.username']);

        foreach($commentListLayer2 as $comment){
            $comment->ago = $comment->created_at->diffForHumans();
            $comment->ago = str_replace("minutes ago","m",$comment->ago);
            $comment->ago = str_replace("minute ago","m",$comment->ago);
            $comment->ago = str_replace("hours ago","h",$comment->ago);
            $comment->ago = str_replace("hour ago","h",$comment->ago);
            $comment->ago = str_replace("days ago","d",$comment->ago);
            $comment->ago = str_replace("day ago","d",$comment->ago);
            $comment->ago = str_replace("months ago","mo",$comment->ago);
            $comment->ago = str_replace("month ago","mo",$comment->ago);
            $comment->ago = str_replace("weeks ago","w",$comment->ago);
            $comment->ago = str_replace("week ago","w",$comment->ago);
            $comment->ago = str_replace("years ago","y",$comment->ago);
            $comment->ago = str_replace("year ago","y",$comment->ago);
        }

        foreach($commentList as $comment){
            $commentLayer2List =[];
            foreach($commentListLayer2 as $commentLayer2){
                if($commentLayer2->parent_id == $comment->id){
                    array_push($commentLayer2List, $commentLayer2);
                }
            }
            $comment->commentLayer2List = $commentLayer2List;
        }

        return view('front.post')->with("item",$item)->with("commentList",$commentList)->with("windowMode", $request->windowMode);
    }

    public function guest()
    {
        return view('front.post_guest');
    }

    public function addComment(Request $request){
        $item = new Comment;
        $item->setAttributeMap($request->all());
        $item->content = strip_tags($item->content);
        $item->content = $item->content . " ";

        $confession = Confession::find($request->confession_id);
        $i = 0;
        while($i < strlen($item->content)){
            if($item->content[$i] == "@"){
                $k=0;
                for($j=$i+1 ; $j < strlen($item->content) ; $j++){
                    $k++;
                    if($item->content[$j] == " "){
                        $username = substr( $item->content,$i+1, $k-1);
                        $notification = new Notification;
                        $notification->type = "mention";
                        $notification->from_user_id = auth()->user()->id;
                        $user = \App\Model\User::where("username","=",$username)->first();
                        $notification->to_user_id = $user->id;
                        $notification->confession_id = $confession->id;
                        $notification->save();
                        break;
                    }
                }
                $item->content = substr( $item->content,0, $i) . "<a class='tag-name' style='font-weight: bold;color: black' href='/user/" . $username. "'>" . $username . "</a>" . substr( $item->content,$i + $k, strlen($item->content));

            }
            $i++;
        }

        $i = 0;
        while($i < strlen($item->content)){
            if($item->content[$i] == "#"){
                $k=0;
                for($j=$i+1 ; $j < strlen($item->content) ; $j++){
                    $k++;
                    if($item->content[$j] == " "){
                        $tagName = substr( $item->content,$i+1, $k-1);

                        $hashTag = Hashtag::query()->where("name","=",$tagName)->first();
                        if(isset($hashTag)){
                            $hashTag->count++;
                        }else{
                            $hashTag = new Hashtag;
                            $hashTag->name = $tagName;
                            $hashTag->count = 1;
                        }
                        $hashTag->save();
                        break;
                    }
                }
                $add = "<a class='tag-name' style='font-weight: bold; font-family: Helvetica Neue ;color: black;' href='/search-hashtag/" . $tagName. "'>" . "#" . $tagName . "</a>";
                $item->content = substr( $item->content,0, $i) . $add . substr( $item->content,$i + $k, strlen($item->content));
                $i+= strlen($add);
            }
            $i++;

        }

        $item->save();

        $confession->comment_count ++;
        $confession->save();


        $notification = new Notification;
        if($item->parent_id == 0) {
            $notification->type = "post-comment";

            $stas = Stat::query()->whereRaw( DB::raw('DATE(created_at) = curdate()'))->first();
            if(!isset($stas)){
                $stas = new Stat;
            }
            $stas->comment_today ++;
            $stas->save();

        }else{
            $notification->type = "reply-comment";

            $stas = Stat::query()->whereRaw( DB::raw('DATE(created_at) = curdate()'))->first();
            if(!isset($stas)){
                $stas = new Stat;
            }
            $stas->replies_today ++;
            $stas->save();
        }
        $notification->from_user_id = auth()->user()->id;
        $notification->to_user_id = $confession->user_id;
        $notification->confession_id = $confession->id;
        $notification->save();

        $data = new stdClass;
        $str = $item->id . "[[]]]]" . $item->content;
        return $str;
    }

    public function editComment(Request $request){
        $item = Comment::find($request->id);
        if($item->user_id != auth()->user()->id){
            return;
        }
        $item->content = $request->comment_content;
        $item->save();
    }

    public function deleteComment(Request $request){
        $item = Comment::find($request->id);
        if($item->user_id != auth()->user()->id){
            return;
        }
        $confession = Confession::find($item->confession_id);
        $item->delete();
        $confession->comment_count --;

        $list = Comment::query()
            ->where('parent_id', "=", $item->id)->get();
        foreach($list as $deleteItem){
            $deleteItem->delete();
            $confession->comment_count --;
        }
        $confession->save();

        $stas = Stat::query()->whereRaw( DB::raw('DATE(created_at) = curdate()'))->first();
        if(!isset($stas)){
            $stas = new Stat;
        }
        $stas->feel_today --;
        $stas->save();

    }

    public function reportAdd(Request $request){
        $item = new ReportConfession;
        $item->reason = $request->report_reason;
        $item->confession_id = $request->confession_id;
        $item->details = $request->report_details;
        $item->user_id = auth()->user()->id;
        $item->save();

        $stas = Stat::query()->whereRaw( DB::raw('DATE(created_at) = curdate()'))->first();
        if(!isset($stas)){
            $stas = new Stat;
        }
        $stas->report_today ++;
        $stas->save();

        return redirect()->route('post', $request->confession_id);

    }

    public function share(Request $request){
        $stas = Stat::query()->whereRaw( DB::raw('DATE(created_at) = curdate()'))->first();
        if(!isset($stas)){
            $stas = new Stat;
        }
        $stas->share_today ++;
        $stas->save();
    }

    public function rate(Request $request){
        $poll = Poll::find($request->id);

        if($request->select == 1){
            $poll->poll1_count ++;
        }
        if($request->select == 2){
            $poll->poll2_count ++;
        }
        $poll->save();
    }
}
