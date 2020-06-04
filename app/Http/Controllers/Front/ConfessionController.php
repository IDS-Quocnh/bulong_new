<?php

namespace App\Http\Controllers\Front;

use App\Model\Hashtag;
use App\Model\Notification;
use App\Model\Poll;
use App\Model\Stat;
use Carbon\Carbon;
use App\Model\Confession;
use App\Bulong\Feeds\Feed;
use Illuminate\Http\Request;
use App\Traits\ApiJsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ConfessionController extends Controller
{
    use ApiJsonResponse;

    public function index()
    {
        return Confession::latest()->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Confession::create([
            'text' => $request->text,
            'user_id' => auth()->id(),
            'category_id' => $request->categoryId,
            'background_image_id' => request('backgroundId', 1)
        ]);
    }

    /**
     * Show particular confession.
     *
     * @param Confession $confession
     * @return \Illuminate\Http\Response
     */
    public function show(Confession $confession)
    {
        return view('front.confessions.show', compact('confession'));
    }

    public function update(Request $request, $id)
    {
        $confession = Confession::findOrFail($id);

        if ($confession->user_id != auth()->id()) {
            return response()->json(['message' => 'unauthorized'], 403);
        }

        $confession->update([
            'text' => $request->text,
            'user_id' => auth()->id(),
            'category_id' => request('categoryId', $confession->category_id),
            'background_image_id' => request('backgroundId', $confession->background_image_id)
        ]);

        return response()->json(['message' => 'success']);
    }

    public function destroy($id)
    {
        $confession = Confession::findOrFail($id);

        if ($confession->user_id != auth()->id()) {
            return response()->json(['message' => 'unauthorized'], 403);
        }

        $confession->delete();

        return response()->json(['message' => 'success']);
    }

    public function latest()
    {
        $feeds = Feed::latest()->get();

        return $feeds;
    }

    public function trending()
    {
        $date = Carbon::now()->subDays(15);
        $feeds = Feed::where('created_at', '>=', $date)->orderBy('likes', 'desc')->get();

        if ($feeds) {
            return $feeds;
        }
        $this->mostFelt();
    }

    public function mostFelt()
    {
        $feeds = Feed::orderBy('likes', 'desc')->get();

        return $feeds;
    }

    public function getUserConfessions($userId)
    {
        return Confession::where('user_id', $userId)->latest()->get();
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $item = new Confession;

            $item->setAttributeMap($request->all());
            $item->user_id = auth()->user()->id;
            $item->username = auth()->user()->username;

            $item->save();

            $confession = Confession::find($item->id);
            $item->text = strip_tags($item->text);
            $item->text = $item->text . " ";
            $i = 0;
            while($i < strlen($item->text)){
                if($item->text[$i] == "@"){
                    $k=0;
                    for($j=$i+1 ; $j < strlen($item->text) ; $j++){
                        $k++;
                        if($item->text[$j] == " "){
                            $username = substr( $item->text,$i+1, $k-1);
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
                    $item->text = substr( $item->text,0, $i) . "<a class='tag-name' style='font-weight: bold;color: black' href='/user/" . $username. "'>" . $username . "</a>" . substr( $item->text,$i + $k, strlen($item->text));

                }
                $i++;
            }

            $i = 0;
            while($i < strlen($item->text)){
                if($item->text[$i] == "#"){
                    $k=0;
                    for($j=$i+1 ; $j < strlen($item->text) ; $j++){
                        $k++;
                        if($item->text[$j] == " "){
                            $tagName = substr( $item->text,$i+1, $k-1);

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
                    $item->text = substr( $item->text,0, $i) . $add . substr( $item->text,$i + $k, strlen($item->text));
                    $i+= strlen($add);
                }
                $i++;

            }



            $item->save();
            $stas = Stat::query()->whereRaw( DB::raw('DATE(created_at) = curdate()'))->first();
            if(!isset($stas)){
                $stas = new Stat;
            }
            $stas->post_today ++;
            $stas->save();

            return redirect()->route('lastest');
        } else {
            return redirect()->route('lastest');
        }
    }

    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
            $item = Confession::find($request->confession_id);
            if(isset($request->category_id)){
                $item->category_id = $request->category_id;
            }
            $item->text = $request->text;
            $item->background_image = $request->background_image;
            $item->save();
        }
    }
    public function delete(Request $request)
    {
        $item = Confession::find($request->confession_id);
        if($item->username == auth()->user()->username || auth()->user()->is_admin == 1){
            $item->delete();
        }
        return redirect()->route('home');
    }

}
