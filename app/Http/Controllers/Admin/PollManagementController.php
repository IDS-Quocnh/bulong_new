<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Poll;
use App\Http\Controllers\Controller;

class PollManagementController extends Controller
{
    public function index(Request $request)
    {
        $list = Poll::orderBy('created_at', 'desc')->get();
        foreach ($list as $item) {
            $item->total = $item->poll1_count + $item->poll2_count + $item->poll3_count + $item->poll4_count + $item->poll5_count + $item->poll6_count;
        }
        if (isset($request->addPoll)) {
            return view('PollManagementController.list')->with('susscessMessage', 'poll registered successfully')->with('list', $list);
        }
        return view('PollManagementController.list')->with('list', $list);
    }

    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
            $item = Poll::find($request->id);
            if ($request->name == $item->name) {
                $keyUnikey = "required|min:3";
            } else {
                $keyUnikey = "required|unique:poll|min:3|max256";
            }
            $request->validate([
                'name' => $keyUnikey,
            ]);

            $item = Poll::find($request->id);
            $name = $item->name;
            $item->setAttributeMap($request->all());
            $item->save();
            $list = Poll::orderBy('created_at', 'desc')->get();
            return view('PollManagementController.list')->with('susscessMessage', 'Poll name "' . $name . '" edit successfully')
                ->with('list', $list);
        } else {
            if (!isset($request->id)) {
                return redirect()->route('home');
            }
            $item = Poll::find($request->id);
            return view('PollManagementController.main')->with('item', $item);
        }
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'name' => 'required|unique:poll|min:3',
            ]);

            $item = new Poll;
            $item->setAttributeMap($request->all());
            $item->save();
            return view('PollManagementController.main')->with('susscessMessage', 'Add poll successfully');
        } else {
            return view('PollManagementController.main');
        }
    }

    public function delete(Request $request)
    {
        $item = Poll::find($request->id);
        $name = $item->name;
        $item->delete();
        $list = Poll::orderBy('created_at', 'desc')->get();
        return view('PollManagementController.list')->with('susscessMessage', 'Poll name "' . $name . '" deleted successfully')->with('list', $list);
    }
}
