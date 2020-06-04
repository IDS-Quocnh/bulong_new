<?php

namespace App\Http\Controllers\Admin;

use App\Bulong\News\News;
use App\Bulong\Users\User;
use App\Model\Stat;
use Illuminate\Http\Request;
use App\Bulong\Categories\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index()
    {
        $list = Stat::query()->orderBy("id","desc")->get(['online','post_today','feel_today',DB::raw('DATE(created_at) as date' ),'comment_today','replies_today','share_today','report_today']);
        return view('StatisticController.list')->with("list", $list);
    }
}
