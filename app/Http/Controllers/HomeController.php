<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $value = Auth::user()->id;
        DB::table('staff')
            ->where('staff.email', Auth::user()->email)
            ->update(['user_id' => $value]);
        $data = DB::table('staff')
            ->select('staff.email','staff.first_name','staff.surname')
            ->where('staff.user_id',$value)
            ->get();
        return view('home',['data'=>$data]);
    }
}
