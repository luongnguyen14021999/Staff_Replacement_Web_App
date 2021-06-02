<?php

namespace App\Http\Controllers\ImportExcel;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Imports\ImportStaff;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Staff;

class ImportStaffExcelController extends Controller
{
    public function index()
    {
        $staff = Staff::get();
        return view('staffDetails',compact('staff'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new ImportStaff, request()->file('import_file'));
        return redirect('admin_staff');
    }

    public function destroy()
    {
        Staff::whereNotNull('id')->delete();
        Unit::whereNotNull('id')->delete();
        return redirect('admin_staff');
    }
}
