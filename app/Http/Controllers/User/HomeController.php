<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CardSell;
use App\Models\User;
use App\Models\Notice;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Home';
        $lstNotice = Notice::where('is_del', 0)->where('is_popup', 1)->get();
        return view('user.home', compact('lstNotice', 'title'));
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function realtime_info(Request $request)
    {
        //echo Auth::id();
        $user_info = User::find(Auth::id(), ['money']);
        $user_info->cart_cnt = CardSell::where('user_id', Auth::id())->count();

        return response()->json(["status" => "success", "data" => compact('user_info')]);
        
    }
}
