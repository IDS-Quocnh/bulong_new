<?php

namespace App\Http\Controllers\Admin;

use App\Bulong\News\News;
use App\Bulong\Users\User;
use App\Model\ReportConfession;
use Illuminate\Http\Request;
use App\Bulong\Categories\Category;
use App\Http\Controllers\Controller;

class ManageReportConfessionController extends Controller
{
    public function index()
    {
        $list = ReportConfession::query()
            ->join("confessions","confessions.id","=","report_confessions.confession_id")
            ->leftJoin("users","confessions.user_id","=","users.id")
            ->orderBy("report_confessions.id","desc")
            ->get(["report_confessions.id","report_confessions.user_id","report_confessions.confession_id", "report_confessions.reason","report_confessions.details","users.avatar","users.username"]);

        foreach ($list as $item){
            $user = \App\Model\User::find($item->user_id);
            $item->report_user_name = $user->username;
        }
        return view('ManageReportConfessionController.index')->with("list",$list);
    }

    public function delete(Request $request)
    {
        $item = ReportConfession::find($request->id);
        $item->delete();
    }
}
