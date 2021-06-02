<?php

namespace App\Http\Controllers\ImportExcel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ImportTimetable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Timetable;
use App\Models\ReplacementRequests;

class ImportExcelController extends Controller
{
    public function index()
    {
        $timetable = Timetable::with('unit', 'staff')->get();

        return view('admin_timetable',compact('timetable'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new ImportTimetable, request()->file('import_file'));
        \Log::debug(route('admin_timetable_list'));
        return redirect()->route('admin_timetable_list');
    }

    public function destroy()
    {
        Timetable::whereNotNull('id')->delete();
        return redirect('admin_timetable');
    }
}
