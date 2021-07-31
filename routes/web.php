<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\GradesController;
use App\Http\Controllers\Backend\ClassroomController;
use App\Http\Controllers\Backend\MyClassesController;
use App\Http\Controllers\Backend\SectionController;
use App\Http\Controllers\Backend\TeacherController;
use App\Http\Controllers\Backend\Students\StudentController2;

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


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function()
{
   
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/admin/logout',[AdminController::class, 'Logout'])->name('admin.logout');

    Route::prefix('grades/')->group(function(){
        Route::get('view',[GradesController::class, 'ViewGrades'])->name('grades.view');
        Route::get('add',[GradesController::class, 'AddGrades'])->name('grades.add');
        Route::post('store',[GradesController::class, 'StoreGrades'])->name('grades.store');

        Route::get('edit/{id}',[GradesController::class, 'EditGrades'])->name('grades.edit');
        Route::post('update/{id}',[GradesController::class, 'UpdateGrades'])->name('grades.update');
        Route::get('delete/{id}',[GradesController::class, 'DeleteGrades'])->name('grades.delete');


    });
//Classrooms routes
Route::prefix('classrooms/')->group(function(){

    
    // Route::get('view',[ClassroomController::class, 'ViewClassrooms'])->name('Classrooms.index');
    // // Route::get('add',[ClassroomController::class, 'AddClassrooms'])->name('classrooms.add');
    //  Route::post('store',[ClassroomController::class, 'StoreClassrooms'])->name('Classrooms.store');

    // // Route::get('edit/{id}',[ClassroomController::class, 'EditClassrooms'])->name('classrooms.edit');
    //  Route::post('update/{id}',[ClassroomController::class, 'UpdateClassrooms'])->name('Classrooms.update');
    // // Route::get('delete/{id}',[ClassroomController::class, 'DeleteClassrooms'])->name('classrooms.delete');

    // Route::post('Filter_Classes', [ClassroomController::class, 'Filter_Classes'])->name('Filter_Classes');
    // Route::post('delete_all', [ClassroomController::class,  'delete_all'])->name('delete_all');
    // Route::post('destroy',[ClassroomController::class, 'destroy'])->name('Classrooms.destroy');


    Route::resource('Classrooms', MyClassesController::class);
    Route::post('delete_all', [MyClassesController::class, 'delete_all'])->name('delete_all');

    Route::post('Filter_Classes', [MyClassesController::class, 'Filter_Classes'])->name('Filter_Classes');
});


// sections routes

Route::group(['namespace' => ''], function (){

    Route::resource('Sections', SectionController::class);

    Route::get('/classes/{id}', [SectionController::class ,'getclasses']);


});

//==============================parents============================

Route::view('list_parent','livewire.show_Form');


//==============================teachers============================



Route::group(['namespace' => ''], function () {
    Route::resource('Teachers', TeacherController::class);
});

//=====================Student==============


Route::group(['namespace' => ''], function () {
    Route::resource('Students', StudentController2::class);

    Route::get('/Get_classrooms/{id}', [SectionController::class ,' Get_classrooms']);
    Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');

   


});







});


