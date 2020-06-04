<?php

namespace App\Http\Controllers\Front;

use App\Model\Poll;
use Carbon\Carbon;
use App\Model\Confession;
use App\Bulong\Feeds\Feed;
use Illuminate\Http\Request;
use App\Traits\ApiJsonResponse;
use App\Http\Controllers\Controller;

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
        if($item->username == auth()->user()->username){
            $item->delete();
        }
        return redirect()->route('home');
    }

}
