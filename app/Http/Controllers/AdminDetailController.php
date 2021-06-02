<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminDetailController extends Controller
{
    public function index() {
        $value = Auth::user()->id;
        $data = DB::table('staff')
            ->select('staff.staff_id','staff.first_name','staff.surname','staff.email')
            ->where('staff.user_id',$value)
            ->get();
        return view('admin_detail',['data'=>$data]);
    }
}
