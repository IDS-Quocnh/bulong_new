<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Confession;
use App\Bulong\Feeds\Feed;
use App\Bulong\Users\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Bulong\Users\Requests\RegisterUserRequest;
use App\Bulong\Users\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    private $userRepo;

    /**
     * Crate a new controller instance.
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware('guest');
        $this->userRepo = $userRepository;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'dob' => $data['birthday'],
            'gender' => $data['gender'],
            'city_id' => $data['city_id'],
        ]);
    }

    /**
     * @param RegisterUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterUserRequest $request)
    {
        $request->validate([
            'username' => 'required|max:30|alpha_dash',
        ], [
            'birthday' => 'required|date|before:-18 years',
            'username.alpha_dash' => 'The username may only contain letters, numbers, dashes and underscores. No spaces allowed'
        ]);

        $user = $this->create($request->except('_method', '_token'));
        Auth::login($user);

        return response()->json(['message' => 'success']);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
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


        return view('auth.register')->with('trendingConfessions', $trendingConfessions);

       // $date = Carbon::now()->subDays(15);

       // $trendingConfessions = Confession::where('created_at', '>=', $date)
         //   ->orderBy('like_count', 'desc')->take(2)->get();

        //return view('auth.register', compact('trendingConfessions'));
    }
}
