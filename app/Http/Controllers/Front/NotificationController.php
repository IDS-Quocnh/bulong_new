<?php

namespace App\Http\Controllers\Front;

use App\Model\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bulong\Categories\Repositories\Interfaces\CategoryRepositoryInterface;

class NotificationController extends Controller
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepo;

    /**
     * HomeController constructor.
     *
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->categoryRepo = $categoryRepository;
    }

    public function read(Request $request){
        $item = Notification::find($request->post_id);
        $item->is_read= 1;
        $item->save();
    }

    public function index()
    {
        $listUnread = Notification::query()
            ->leftJoin("users","users.id","=","notifications.from_user_id")
            ->where("is_read","=",0)
            ->where("to_user_id","=", auth()->user()->id)
            ->where("from_user_id","!=", auth()->user()->id)
            ->orderBy("notifications.id","desc")
            ->get(['notifications.id','notifications.type', 'notifications.created_at','notifications.confession_id', "users.username"]);

        foreach($listUnread as $item){
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
        }

        $listRead = Notification::query()
            ->leftJoin("users","users.id","=","notifications.from_user_id")
            ->where("is_read","=",1)
            ->where("to_user_id","=", auth()->user()->id)
            ->where("from_user_id","!=", auth()->user()->id)
            ->orderBy("notifications.id","desc")
            ->get(['notifications.id','notifications.type', 'notifications.created_at','notifications.confession_id', "users.username"]);
        foreach($listRead as $item){
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
        }

        return view('front.users.notifications')->with('listUnread',$listUnread)->with('listRead',$listRead)->with("item",$item);
    }

    public function markAllAsRead()
    {
        $user = auth()->user();

        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        return redirect()->back();
    }
}
