<?php

namespace App\Http\Controllers\Admin;

use App\Bulong\Users\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
    //    $totalUsers = User::all()->count();
    //    $totalNews = News::all()->count();
    //    $totalCategory = Category::all()->count();
    //    $totalConfession = 0;

    //    return view('admin.dashboard', [
    //        'totalUsers' => $totalUsers,
    //        'totalNews' => $totalNews,
    //        'totalCategory' => $totalCategory,
    //        'totalConfession' => $totalConfession,
     //   ]);

        return view('DashboardController.index');
    }

}
