<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Exchange;
use App\Models\Trading;
use App\Models\QNA;
use DB;

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
        // $deposit = Cash::where
        return view('admin.home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function realtime_info()
    {
        
        
        return response()->json(["status" => "success", "data" => ""]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function mypage(Request $request)
    {
        $title="My Info";
        return view('admin.mypage', compact('title'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function check_password(Request $request)
    {
        if(Hash::check($request->post('password'), Auth::user()->password)){
            $message = "Password doesn't match with your old password.";
            return response()->json(["status" => "success", "data" => compact('message')]);
        }else{
            $message = "Password is incorrect.";
            return response()->json(["status" => "failed", "data" => compact('message')]);
        }
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function change_password(Request $request)
    {
        $new_password = Hash::make($request->post('password_new'));
        $user = User::find(Auth::id());
        $user->password = $new_password;
        $user->save();
        $message = "Your password changed successfully.";
        return response()->json(["status" => "success", "data" => compact('message')]);
    }
}
