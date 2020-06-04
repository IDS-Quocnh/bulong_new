<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Confession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $date = Carbon::now()->subDays(15);

        //$trendingConfessions = Confession::where('created_at', '>=', $date)

        //->orderBy('like_count', 'desc')->take(20)->get();

        $trendingConfessions = \App\Model\Confession::query()
            ->leftJoin("users", "confessions.user_id", "=","users.id")
            ->leftJoin("categories", "categories.id", "=","confessions.category_id")
            ->groupBy(['confessions.id', 'confessions.text', 'confessions.user_id', 'confessions.category_id',
                'confessions.background_image','confessions.like_count', 'confessions.comment_count', 'confessions.username','confessions.created_at',
                'confessions.user_name', 'categories.name', 'categories.slug','users.avatar'])
            ->orderBy('confessions.like_count','desc')
            ->where('confessions.created_at', '>=', $date)
            ->limit(20)
            ->get(['confessions.id', 'confessions.text', 'confessions.user_id', 'confessions.category_id',
                'confessions.background_image','confessions.like_count', 'confessions.comment_count', 'confessions.username', 'confessions.created_at', 'categories.slug',
                'confessions.user_name', DB::raw('0 as is_like'), DB::raw('categories.name as categories_name'),DB::raw('0 as is_follow'),
                'users.avatar']);

        foreach($trendingConfessions as $item){
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


        return view('auth.login')->with('trendingConfessions', $trendingConfessions);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            // $this->username() => 'required|string',
             $this->username() => 'exists:users,' . $this->username() . ',is_deleted,0',
            'password' => 'required|string',
        ]);
    }
}
