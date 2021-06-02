<?php

namespace App\Http\Controllers;

use App\Models\Timetable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminTableController extends Controller
{
    function listAdminTimetable() {
        $data = DB::table('timetables')
            ->join('units', 'units.id', '=', 'timetables.unit_code_id')
            ->join('staff', 'staff.id', '=', 'timetables.staff_id')
            ->select('timetables.timetable_id','timetables.session','units.unit_name',
                'timetables.day','timetables.campus','timetables.start_time','timetables.location','staff.first_name','staff.surname','timetables.position_type','timetables.id')
            ->paginate(8);
        return view('admin_timetable', ['data'=>$data]);
    }

    function showData($id) {
        $data = DB::table('timetables')
            ->select('timetables.id','timetables.timetable_id','timetables.session','timetables.unit_code_id',
                'timetables.day','timetables.campus','timetables.start_time','timetables.location','timetables.staff_id','timetables.position_type')
            ->where('timetables.id',$id)
            ->get();
        return view('edit', ['data'=>$data]);
    }

    function update(Request $request) {
        $request->validate([
            'timetable_id' => ['required'],
            'session' => ['required'],
            'day' => ['required'],
            'unit_code_id' => ['required', 'digits_between:1,39'],
            'campus' => ['required'],
            'time_start' => ['date_format:H:i'],
            'location' => ['required'],
            'staff_id' => ['required', 'digits_between:1,326'],
            'position_type' => ['required'],
        ]);

        DB::table('timetables')
            ->where('id',$request->input('id'))
            ->update([
                'timetable_id' => $request->input('timetable_id'),
                'session' => $request->input('session'),
                'unit_code_id' => $request->input('unit_code_id'),
                'day' => $request->input('day'),
                'campus' => $request->input('campus'),
                'start_time' => $request->input('start_time'),
                'location' => $request->input('location'),
                'staff_id' => $request->input('staff_id'),
                'position_type' => $request->input('position_type'),
            ]);
        return redirect('admin_timetable');
    }

    function delete($id) {
       DB::table('timetables')
           ->where('timetables.id',$id)
           ->delete();
       return redirect('admin_timetable');
    }
}
