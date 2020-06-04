<?php

namespace App\Http\Controllers\Front;

use App\Bulong\Feeds\Feed;
use App\Model\Categories;
use App\Model\Confession;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserConfessionController extends Controller
{
    public function myConfession($username)
    {
        $user = User::where('username', $username)->first();
        $feeds = Feed::where('user_id', $user->id)->get();

        return view('front.users.confessions', compact('feeds', 'user'));
    }

    public function myFeltConfessions(Request $request)
    {
        $ip = $request->ip();
        $user = \App\Bulong\Users\User::find(auth()->user()->id);
        $user->ip_address = $ip;
        $user->save();


        $list = Confession::query()
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
            ->havingRaw('count(likes.id) > 0')
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

        return view('front.my_felt')->with('list', $list);
    }

    public function index()
    {
        //return Confession::where('id', $id)->first();
        $item = user::find(auth()->user()->id);
        if(!isset($item->avatar)){
            $item->avatar = '/public/allimage/profile.jpg';
        }
        return view('front.user_edit')->with("item", $item);
    }

    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
            if(isset($request->password)) {
                $request->validate([
                    'password' => "min:6"
                ]);
            }

            $item = User::find($request->id);
            if($item->email != $request->email){
                $request->validate([
                    'email' => 'unique:users'
                ]);
            }

            $request->validate([
                'tagline' => "max:150",
            ]);


            $file = $request->file('avarta-input');


            $item->think = $request->tagline;
            $item->email = $request->email;
            if(isset($file)){
                $item->avatar = $this->uploadImage($file);
            }
            if(isset($request->password)) {
                $item->password = Hash::make($request->password);
            }

            if($request->is_delete == "yes"){
                $item->avatar = "public/allimage/profile.jpg";
            }
            $item->save();
            return redirect()->route('user', ['username' => auth()->user()->username])->with("successMessage", "User edit successfully");
        }else{
            return redirect()->route('user', ['username' => auth()->user()->username]);
        }

    }

    public function destroy($id)
    {
        $feed = Feed::findOrFail($id);

        if (auth()->id() == $feed->user_id) {
            $feed->delete();

            return response()->json(['messgae' => 'success']);
        }
    }

    public function uploadImage($file){
        $destinationPath = 'uploads';
        $fileId=uniqid();
        $fileName=$file->getClientOriginalName();
        $parts = explode('.', $fileName);
        $fileName= uniqid();
        $extent = $parts[count($parts) - 1];
        $file->move($destinationPath . "/" . $fileId ,$fileName . "." . $extent);
        $filePath = $destinationPath . "/" . $fileId  .'/'.$fileName . "." . $extent;
        return $filePath;
    }
}
