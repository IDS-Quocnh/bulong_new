<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Ads;
use App\Http\Controllers\Controller;

class ManageAdsController extends Controller
{
    public function index()
    {
    //    $totalUsers = User::all()->count();
    //    $totalNews = News::all()->count();
    //    $totalAds = Ads::all()->count();
    //    $totalConfession = 0;

    //    return view('admin.dashboard', [
    //        'totalUsers' => $totalUsers,
    //        'totalNews' => $totalNews,
    //        'totalAds' => $totalAds,
    //        'totalConfession' => $totalConfession,
     //   ]);
        $item = Ads::orderBy('id','desc')->get()->first();

        return view('ManageAdsController.main')->with("item", $item);
    }

    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
            $item = Ads::orderBy('id','desc')->get()->first();
            $item->setAttributeMap($request->all());
            $item->save();
            return view('ManageAdsController.main')->with('susscessMessage','Ads edit successfully')
                ->with('item', $item);
        }else{
            $item = Ads::orderBy('id','desc')->get()->first();
            return view('ManageAdsController.main')->with('item', $item);
        }
    }
}
