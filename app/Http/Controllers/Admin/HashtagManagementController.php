<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Hashtag;
use App\Http\Controllers\Controller;

class HashtagManagementController extends Controller
{
    public function index(Request $request)
    {
        $list = Hashtag::orderBy('created_at','desc')->get();
        if(isset($request->addHashtag)){
            return view('HashtagManagementController.list')->with('susscessMessage', 'hashtag registered successfully')->with('list', $list);
        }
        return view('HashtagManagementController.list')->with('list', $list);
    }

    public function delete(Request $request)
    {
        $item = Hashtag::find($request->id);
        $name = $item->name;
        $item->delete();
        $list = Hashtag::orderBy('created_at', 'desc')->get();
        return view('HashtagManagementController.list')->with('susscessMessage', 'Hashtag name "' . $name . '" deleted successfully')->with('list', $list);
    }
}
