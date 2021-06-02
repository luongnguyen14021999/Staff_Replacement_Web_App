<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StaffDetailController extends Controller
{
    public function index() {
        $value = Auth::user()->id;
        $data = DB::table('staff')
            ->select('staff.staff_id','staff.first_name','staff.surname')
            ->where('staff.user_id',$value)
            ->get();
        return view('staff_detail',['data'=>$data]);
    }
}
