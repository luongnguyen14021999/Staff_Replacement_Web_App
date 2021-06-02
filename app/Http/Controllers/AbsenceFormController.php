<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsenceFormController extends Controller
{
    function absenceView(Request $request) {
        return $request->input();
    }
}
