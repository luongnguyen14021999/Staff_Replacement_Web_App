<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\StaffDetailController;
use App\Http\Controllers\OtherLoginController;
use App\Http\Controllers\AbsenceFormController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminTableController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminDetailController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AcceptanceController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

Route::get('/details', [StaffDetailController::class, 'index'])->middleware('auth');

Route::get('/admin_details', [AdminDetailController::class, 'index'])->middleware('admin');

Route::get('/admin_home', [AdminHomeController::class, 'index'])->name('admin_home');

//Route::post('absence_form',[AbsenceFormController::class,'absenceView']);

//Route::view("absenceForm","absence_form")->middleware('auth');

Route::post('/NotificationSend', [NotificationController::class, 'index'])->name('NotificationSend');

Route::get('/accept',[AcceptanceController::class,'showClassInfo'])->name('accept')/*->middleware('signed')*/->middleware('auth');

Route::get('accept/accept_request_form/{id}',[AcceptanceController::class,'formConfirmAccept'])->middleware('auth');

Route::post('accept/accept_request_form/{id}',[AcceptanceController::class,'updateAcceptedRequest'])->middleware('auth');

Route::get('accept/reject_request_form/{id}',[AcceptanceController::class,'formConfirmReject'])->middleware('auth');

Route::post('accept/reject_request_form/{id}',[AcceptanceController::class,'updateRejectedRequest'])->middleware('auth');

Route::get('timetable/NotificationSend/{id}',[TimetableController::class,'showData'])->middleware('auth');

Route::post('timetable/NotificationSend/{id}',[NotificationController::class, 'index'])->middleware('auth');

Route::get('admin_timetable/delete/{id}',[\App\Http\Controllers\ImportExcel\ImportExcelController::class,'delete'])->middleware('admin');

Route::get('admin_timetable/edit/{id}',[\App\Http\Controllers\ImportExcel\ImportExcelController::class,'showData'])->middleware('admin');

Route::post('admin_timetable/edit/{id}',[\App\Http\Controllers\ImportExcel\ImportExcelController::class,'update'])->middleware('admin');

Route::get('admin_staff/delete/{id}',[StaffController::class,'delete'])->middleware('admin');

Route::get('admin_staff/edit_staff/{id}',[StaffController::class,'showData'])->middleware('admin');

Route::post('admin_staff/edit_staff/{id}',[StaffController::class,'update'])->middleware('admin');

Route::get('admin_unit/delete/{id}',[UnitController::class,'delete'])->middleware('admin');

Route::get('admin_unit/edit_unit/{id}',[UnitController::class,'showData'])->middleware('admin');

Route::post('admin_unit/edit_unit/{id}',[UnitController::class,'update'])->middleware('admin');

//Route::get('admin_timetable',[AdminTableController::class,'listAdminTimetable'])->middleware('admin');

Route::get('admin_staff',[StaffController::class,'listStaff'])->middleware('admin');

Route::get('admin_unit',[UnitController::class,'listUnit'])->middleware('admin');

Route::get('admin', [AdminController::class,'index'])->middleware('admin');

Route::get('deleteStaff', [\App\Http\Controllers\ImportExcel\ImportStaffExcelController::class, 'destroy']);

Route::get('staffDetails', [\App\Http\Controllers\ImportExcel\ImportStaffExcelController::class, 'index']);
Route::post('staffDetails', [\App\Http\Controllers\ImportExcel\ImportStaffExcelController::class, 'import'])->name('import_staff');

Route::get('deleteTimetable', [\App\Http\Controllers\ImportExcel\ImportExcelController::class, 'destroy']);

Route::get('admin_timetable', [\App\Http\Controllers\ImportExcel\ImportExcelController::class, 'index'])->name('admin_timetable_list');
Route::post('/import_timetable', [\App\Http\Controllers\ImportExcel\ImportExcelController::class, 'import'])->name('import_timetable');


