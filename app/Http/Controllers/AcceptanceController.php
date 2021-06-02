<?php

namespace App\Http\Controllers;

use Faker\Provider\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RequestTracker;

class AcceptanceController extends Controller
{
    function showClassInfo()
    {
        $data = DB::table('replacement_requests')
            ->join('timetables', 'timetables.id', '=', 'replacement_requests.timetable_id')
            ->join('staff', 'staff.id', '=', 'replacement_requests.staff_id')
            ->select('replacement_requests.id','timetables.timetable_id','timetables.session',
                'timetables.day','timetables.campus','timetables.start_time','timetables.location','staff.first_name','staff.surname','staff.email','timetables.position_type')
            ->get();
        return view('accept',  ['data'=>$data]);
    }

    function formConfirmAccept($id){
        $data = DB::table('replacement_requests')
            ->join('timetables', 'timetables.id', '=', 'replacement_requests.timetable_id')
            ->join('staff', 'staff.id', '=', 'replacement_requests.staff_id')
            ->select('replacement_requests.id','timetables.timetable_id','timetables.session',
                'timetables.day','timetables.campus','timetables.start_time','timetables.location','staff.first_name','staff.surname','timetables.staff_id','timetables.position_type')
            ->where('replacement_requests.id',$id)
            ->get();
        return view('accept_request_form',  ['data'=>$data]);
    }

    function updateAcceptedRequest(Request $request) {

        $check = DB::table('request_tracker')
            ->where('request_tracker.replacement_id',$request->input('id'))->count();

        if($check > 0) {
            return back()->with('fail','wrong');
        } else {
            $query = RequestTracker::create([
                'replacement_id' => $request->input('id'),
                'staff_id' => $request->input('staff_id'),
                'accepted' => 1,
            ]);
            if($query) {
                return back()->with('success','successfully');
            }
        }
    }

    function formConfirmReject($id){
        $data = DB::table('replacement_requests')
            ->join('timetables', 'timetables.id', '=', 'replacement_requests.timetable_id')
            ->join('staff', 'staff.id', '=', 'replacement_requests.staff_id')
            ->select('replacement_requests.id','timetables.timetable_id','timetables.session',
                'timetables.day','timetables.campus','timetables.start_time','timetables.location','staff.first_name','staff.surname','timetables.staff_id','timetables.position_type')
            ->where('replacement_requests.id',$id)
            ->get();
        return view('reject_request_form',  ['data'=>$data]);
    }

    function updateRejectedRequest(Request $request) {
        $query = RequestTracker::create([
            'replacement_id' => $request->input('id'),
            'staff_id' => $request->input('staff_id'),
            'accepted' => 0,
        ]);

        if($query) {
            return back()->with('success','successfully');
        } else {
            return back()->with('fail','wrong');
        }
    }


}
