<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\{Mail\NotificationSent, Models\ReplacementRequests, Models\Staff, Models\Timetable, Models\RequestTracker};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Helper\Table;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this -> middleware(['auth']);
    }

    public function index(Request $request)
    {
        $user = auth()->user();

       $staffEmail = DB::table('staff')
                   ->select('staff.email')
                    ->where('staff.email', 'NOT LIKE', 'NEW%' )
                     ->where('staff.email','!=', $user->email)
                     ->get();


        $request->validate([
            'reason' => ['required'],
        ]);

        $week_day = $request->input('day');
        $compare_number = 0;
        if($week_day == 'Mon') {
            $compare_number = 1;
        } else if($week_day == 'Tue') {
            $compare_number = 2;
        } else if($week_day == 'Wed') {
            $compare_number =  3;
        } else if ($week_day == 'Thu') {
            $compare_number = 4;
        } else if ($week_day == 'Fri') {
            $compare_number = 5;
        }

        if($compare_number <= date('w'))  {
            return back()->with('bad','wrong');
        }

        Mail::to($staffEmail)->send(new NotificationSent());

        $query = ReplacementRequests::create([
            'timetable_id' => $request->input('timetable_id'),
            'staff_id' => $request->input('staff_id'),
            'reason' =>$request->input('reason'),
        ]);


        if($query) {
            return back()->with('success','Your request has been successfully sent');
        } else {
            return back()->with('fail','Something went wrong');
        }

        /*
        $classData = RequestTracker::create([
            'staff_id' => $request->staff_id,
            'timetable_id' => $request->timetable_id,
            //'reason' =>($request['reason']),
        ]);

        DB::table('replacement_requests')->insert(array('staff_id' => $classData['staff_id'], 'timetable_id' => $classData['timetable_id'])
        ); */
    }
}

