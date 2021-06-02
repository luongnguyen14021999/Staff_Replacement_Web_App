<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    function listUnit() {
        $data = DB::table('units')
            ->select( 'units.id','units.unit_code','units.unit_name')
            ->paginate(8);
        return view('unit', ['data'=>$data]);
    }

    function showData($id) {
        $data = DB::table('units')
            ->select('units.id','units.unit_code','units.unit_name')
            ->where('units.id',$id)
            ->get();
        return view('edit_unit', ['data'=>$data]);
    }

    function update(Request $request) {
        $request->validate([
            'unit_code' => ['required','integer'],
            'unit_name' => ['required'],
        ]);

        DB::table('units')
            ->where('id',$request->input('id'))
            ->update([
                'unit_code' => $request->input('unit_code'),
                'unit_name' => $request->input('unit_name'),
            ]);
        return redirect('admin_unit');
    }

    function delete($id) {
        DB::table('units')
            ->where('units.id',$id)
            ->delete();
        return redirect('admin_unit');
    }
}
