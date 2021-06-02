<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class TimetableController extends Controller
{
    function listTimetable() {
       $data = DB::table('timetables')
            ->join('units', 'units.id', '=', 'timetables.unit_code_id')
            ->join('staff', 'staff.id', '=', 'timetables.staff_id')
            ->select('timetables.id','timetables.timetable_id','timetables.session','units.unit_name',
                'timetables.day','timetables.campus','timetables.start_time','timetables.location','staff.first_name','staff.surname','staff.email','timetables.position_type')
           ->where('staff.email',Auth::user()->email)
           ->paginate(8);
        return view('timetable', ['data'=>$data]);
    }

    function showData($id) {
        $data = DB::table('timetables')
            ->join('units', 'units.id', '=', 'timetables.unit_code_id')
            ->join('staff', 'staff.id', '=', 'timetables.staff_id')
            ->select('timetables.id','timetables.timetable_id','timetables.session','units.unit_name',
                'timetables.day','timetables.campus','timetables.start_time','timetables.location','timetables.staff_id','staff.first_name','staff.surname','timetables.position_type')
            ->where('timetables.id',$id)
            ->get();
        return view('NotificationSend', ['data'=>$data]);
    }

}
