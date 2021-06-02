<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    function listStaff() {
        $data = DB::table('staff')
            ->select('staff.id','staff.staff_id','staff.first_name','staff.surname', 'staff.email')
            ->paginate(8);
        return view('staff', ['data'=>$data]);
    }

    function showData($id) {
        $data = DB::table('staff')
            ->select('staff.id','staff.staff_id','staff.first_name','staff.surname', 'staff.email')
            ->where('staff.id',$id)
            ->get();
        return view('edit_staff', ['data'=>$data]);
    }

    function update(Request $request) {
        $request->validate([
            'staff_id' => ['required'],
            'first_name' => ['required'],
            'surname' => ['required'],
            'email' => ['required', 'email'],
        ]);

        DB::table('staff')
            ->where('id',$request->input('id'))
            ->update([
                'staff_id' => $request->input('staff_id'),
                'first_name' => $request->input('first_name'),
                'surname' => $request->input('surname'),
                'email' => $request->input('email'),
            ]);
        return redirect('admin_staff');

    }

    function delete($id) {
        DB::table('staff')
            ->where('staff.id',$id)
            ->delete();
        return redirect('admin_staff');
    }
}
