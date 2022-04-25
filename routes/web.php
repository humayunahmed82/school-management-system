<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\setup\StudentYearController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');


// User Management Roll All

Route::prefix('users')->group(function(){

    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');

    Route::get('/add', [UserController::class, 'UserAdd'])->name('users.add');

    Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');

    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');

    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');

    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');
});


// Profile Management Roll All

Route::prefix('profile')->group(function(){

    Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');

    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');

    Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');

    Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');

    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');

});


// Setup Management Roll All

Route::prefix('setups')->group(function(){

    // Student Class Route
    Route::get('student/class/view', [StudentClassController::class, 'ViewStudent'])->name('student.class.view');

    Route::get('student/class/add', [StudentClassController::class, 'StudentClassAdd'])->name('student.class.add');

    Route::post('student/class/store', [StudentClassController::class, 'StudentClassStore'])->name('store.student.class');

    Route::get('student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');

    Route::post('student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('student.class.update');

    Route::get('student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');


    // Student Year Route
    Route::get('student/year/view', [StudentYearController::class, 'ViewYear'])->name('student.year.view');

    Route::get('student/year/add', [StudentYearController::class, 'AddYear'])->name('student.year.add');

    Route::post('student/year/store', [StudentYearController::class, 'YearStore'])->name('store.student.year');

    Route::get('student/year/edit/{id}', [StudentYearController::class, 'YearEdit'])->name('student.year.edit');

    Route::post('student/year/update/{id}', [StudentYearController::class, 'YearUpdate'])->name('student.year.update');

    Route::get('student/year/delete/{id}', [StudentYearController::class, 'YearDelete'])->name('student.year.delete');


    // Student Group Route
    Route::get('student/group/view', [StudentGroupController::class, 'ViewGroup'])->name('student.group.view');

    Route::get('student/group/add', [StudentGroupController::class, 'AddGroup'])->name('student.group.add');

    Route::post('student/group/store', [StudentGroupController::class, 'GroupStore'])->name('store.student.group');

    Route::get('student/group/edit/{id}', [StudentGroupController::class, 'GroupEdit'])->name('student.group.edit');

    Route::post('student/group/update/{id}', [StudentGroupController::class, 'GroupUpdate'])->name('student.group.update');

    Route::get('student/group/delete/{id}', [StudentGroupController::class, 'GroupDelete'])->name('student.group.delete');


    // Student Shift Route
    Route::get('student/shift/view', [StudentShiftController::class, 'ViewShift'])->name('student.shift.view');

    Route::get('student/shift/add', [StudentShiftController::class, 'AddShift'])->name('student.shift.add');

    Route::post('student/shift/store', [StudentShiftController::class, 'ShiftStore'])->name('store.student.shift');

    Route::get('student/shift/edit/{id}', [StudentShiftController::class, 'ShiftEdit'])->name('student.shift.edit');

    Route::post('student/shift/update/{id}', [StudentShiftController::class, 'ShiftUpdate'])->name('student.shift.update');

    Route::get('student/shift/delete/{id}', [StudentShiftController::class, 'ShiftDelete'])->name('student.shift.delete');


    // Fee Category Route
    Route::get('fee/category/view', [FeeCategoryController::class, 'ViewFeeCategory'])->name('fee.category.view');

    Route::get('fee/category/add', [FeeCategoryController::class, 'AddFeeCategory'])->name('fee.category.add');

    Route::post('fee/category/store', [FeeCategoryController::class, 'StoreFeeCategory'])->name('store.fee.category');

    Route::get('fee/category/edit/{id}', [FeeCategoryController::class, 'EditFeeCategory'])->name('fee.category.edit');

    Route::post('fee/category/update/{id}', [FeeCategoryController::class, 'FeeCategoryUpdate'])->name('fee.category.update');

    Route::get('fee/category/delete/{id}', [FeeCategoryController::class, 'FeeCategoryDelete'])->name('fee.category.delete');


    // Fee Amount Route
    Route::get('fee/amount/view', [FeeAmountController::class, 'ViewFeeAmount'])->name('fee.amount.view');

    Route::get('fee/amount/add', [FeeAmountController::class, 'AddFeeAmount'])->name('fee.amount.add');

});
