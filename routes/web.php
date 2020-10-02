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
    return view('auth.login');
});

Route::get('/login',function(){
    return view('auth.login');
});

Route::get('auth/google', 'LoginController@redirectToGoogle');
Route::get('google/callback', 'LoginController@handleGoogleCallback');


//admin
Route::group(['middleware'=>'CheckAdmin'],function() {
Route::prefix('admin')->group(function () {
        Route::get('/dashboard',function(){
            return view('admin.dashboard')->with('title','Admin Dashboard');
        });
        Route::resource('/users', 'UserController');
        Route::get('/getAllUsers','UserController@getAllUsers');
        Route::post('/importUser','UserController@importData');
        Route::get('/getAllCourses','CourseController@getAllCourses');
        Route::post('/importCourse','CourseController@importData');
        Route::get('/getAllSections','SectionController@getAllSections');
        Route::post('/importSection','SectionController@importData');
        Route::get('/getAllEnrollments','EnrollmentController@getAllEnrollments');
        Route::post('/importEnrollment','EnrollmentController@importData');
        Route::get('/logout','LoginController@logout');
        });
});
//student
Route::group(['middleware'=>'CheckStudent'],function() {
    
    Route::get('/getTeacherFromCourse/{courseId}','StudentController@getTeacherFromCourse');
    Route::get('/selectTime/{courseId}/{userId}','StudentController@getTeacherAvailableTime');
    Route::get('/checkTeacherDate/{date}/{userId}','StudentController@checkTeacherDate');
    Route::post('/finaliseAppointment','StudentController@finaliseAppointment');

Route::prefix('student')->group(function () {

        Route::get('/dashboard','StudentController@dashboard');
        Route::get('/allCourses','StudentController@viewAllCourses');
        Route::get('/myAppointment','StudentController@myAppointments');
        Route::post('/cancel/{id}','StudentController@cancelAppointment');
        Route::get('/logout','LoginController@logout');
});

});



//teacher
Route::group(['middleware'=>'CheckTeacher'],function() {

Route::prefix('teacher')->group(function () {
    Route::get('/dashboard','TeacherController@dashboard');
    Route::get('/myAppointment','TeacherController@viewAllAppointments');
    Route::get('/pendingAppointment','TeacherController@pendingAppointment');
    Route::post('/accept/{id}','TeacherController@acceptAppointment');
    Route::post('/decline/{id}','TeacherController@declineAppointment');
    Route::post('/updateAppointmentTime/{id}','TeacherController@updateTime');
    Route::get('/changeTime','TeacherController@changeTimeForm');
    Route::post('/updateTime','TeacherController@updateTimeAvailable');
    Route::get('/logout','LoginController@logout');
});
});
