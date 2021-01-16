<?php

use Illuminate\Support\Facades\Route;

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
    return view('admin/admin_layout');
});
Route::resource('/lecture','App\Http\Controllers\LecturesController');
Route::resource('/result_exam','App\Http\Controllers\ExamResultController');
Route::resource('/employees','App\Http\Controllers\EmpController');
Route::resource('/notification','App\Http\Controllers\NotificationController');
Route::resource('/student_eco','App\Http\Controllers\StudentEcoController');
Route::resource('/rule','App\Http\Controllers\EmpRuleController');
Route::resource('/important_websites','App\Http\Controllers\ImportantSitesController');
Route::resource('/videos','App\Http\Controllers\VideosController');
Route::resource('/general_questions','App\Http\Controllers\GeneralQuestionsController');
Route::resource('/inbox_problems','App\Http\Controllers\InboxProblemsController');
Route::resource('/college_info','App\Http\Controllers\CollegeInfoController');
Route::resource('/grad','App\Http\Controllers\GradController');
Route::resource('/master','App\Http\Controllers\MasterController');

Route::resource('/marks','App\Http\Controllers\MarksController');
Route::post('/import_marks','App\Http\Controllers\MarksController@import')->name('marks.import');

//students
Route::resource('/students','App\Http\Controllers\StudentsController');
Route::post('/import_students','App\Http\Controllers\StudentsController@import')->name('students.import');

/// resources of rule read-add-delete-update

