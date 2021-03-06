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
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SubjectController;
use App\Http\Controllers\Backend\Setup\AssingSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\Student\RegistrationFeeContoller;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\ExamFeeController;
use App\Http\Controllers\Backend\Employee\EmployeeRegController;
use Illuminate\Routing\RouteGroup;
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


Route::group(['middleware' => 'auth'],function(){



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

    Route::post('fee/amount/store', [FeeAmountController::class, 'StoreFeeAmount'])->name('store.fee.amount');

    Route::get('fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'EditFeeAmount'])->name('fee.amount.edit');

    Route::post('fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'UpdateFeeAmount'])->name('update.fee.amount');

    Route::get('fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'DetailsFeeAmount'])->name('fee.amount.details');


    // Exam Type Route
    Route::get('exam/type/view', [ExamTypeController::class, 'ViewExamType'])->name('exam.type.view');

    Route::get('exam/type/add', [ExamTypeController::class, 'AddExamType'])->name('exam.type.add');

    Route::post('exam/type/store', [ExamTypeController::class, 'StoreExamType'])->name('store.exam.type');

    Route::get('exam/type/edit/{id}', [ExamTypeController::class, 'EditExamType'])->name('exam.type.edit');

    Route::post('exam/type/update/{id}', [ExamTypeController::class, 'ExamTypeUpdate'])->name('exam.type.update');

    Route::get('exam/type/delete/{id}', [ExamTypeController::class, 'ExamTypeDelete'])->name('exam.type.delete');


    // Subject Route
    Route::get('subject/view', [SubjectController::class, 'ViewSubject'])->name('subject.view');

    Route::get('subject/add', [SubjectController::class, 'AddSubject'])->name('subject.add');

    Route::post('subject/store', [SubjectController::class, 'StoreSubject'])->name('store.subject');

    Route::get('subject/edit/{id}', [SubjectController::class, 'EditSubject'])->name('subject.edit');

    Route::post('subject/update/{id}', [SubjectController::class, 'UpdateSubject'])->name('subject.update');

    Route::get('subject/delete/{id}', [SubjectController::class, 'DeleteSubject'])->name('subject.delete');


    // Assing Subject Route
    Route::get('assing/subject/view', [AssingSubjectController::class, 'AssingSubjectView'])->name('assing.subject.view');

    Route::get('assing/subject/add', [AssingSubjectController::class, 'AssingSubjectAdd'])->name('assing.subject.add');

    Route::post('assing/subject/store', [AssingSubjectController::class, 'AssingSubjectStore'])->name('store.assing.subject');

    Route::get('assing/subject/edit/{class_id}', [AssingSubjectController::class, 'AssingSubjectEdit'])->name('assing.subject.edit');

    Route::post('assing/subject/update/{class_id}', [AssingSubjectController::class, 'AssingSubjectUpdate'])->name('assing.subject.update');

    Route::get('assing/subject/details/{class_id}', [AssingSubjectController::class, 'AssingSubjectDetails'])->name('assing.subject.details');


    // Designation Route
    Route::get('designation/view', [DesignationController::class, 'ViewDesignation'])->name('designation.view');

    Route::get('designation/add', [DesignationController::class, 'AddDesignation'])->name('designation.add');

    Route::post('designation/store', [DesignationController::class, 'StoreDesignation'])->name('store.designation');

    Route::get('designation/edit/{id}', [DesignationController::class, 'EditDesignation'])->name('designation.edit');

    Route::post('designation/update/{id}', [DesignationController::class, 'UpdateDesignation'])->name('designation.update');

    Route::get('designation/delete/{id}', [DesignationController::class, 'DeleteDesignation'])->name('designation.delete');

});


// Student Management Roll All

Route::prefix('students')->group(function(){

    Route::get('/regitration/view', [StudentRegController::class, 'StudentRegitrationView'])->name('student.regitration.view');

    Route::get('/regitration/add', [StudentRegController::class, 'StudentRegitrationAdd'])->name('student.regitration.add');

    Route::post('/regitration/store', [StudentRegController::class, 'StudentRegitrationStore'])->name('store.student.regitration');

    Route::get('/year/class/wise', [StudentRegController::class, 'StudentClassYearWise'])->name('student.year.class.wise');

    Route::get('/regitration/edit/{student_id}', [StudentRegController::class, 'StudentRegitrationEdit'])->name('student.regitration.edit');

    Route::post('/regitration/update/{student_id}', [StudentRegController::class, 'UpdateStudentRegitration'])->name('update.student.regitration');

    Route::get('/regitration/promotion/{student_id}', [StudentRegController::class, 'StudentRegitrationPromotion'])->name('student.regitration.promotion');

    Route::post('/regitration/update/promotion/{student_id}', [StudentRegController::class, 'UpdateStudentPromotion'])->name('promotion.student.regitration');

    Route::get('/regitration/details/{student_id}', [StudentRegController::class, 'StudentRegitrationDetails'])->name('student.regitration.details');


    // Roll Generate
    Route::get('/roll/generate/view', [StudentRollController::class, 'StudentRollView'])->name('roll.generate.view');

    Route::get('/regitration/getstudents', [StudentRollController::class, 'GetStudents'])->name('student.registration.getstudents');

    Route::post('/roll/generate/store', [StudentRollController::class, 'StudentRollStore'])->name('roll.generate.store');


    // Registration Fee
    Route::get('/registration/fee/view', [RegistrationFeeContoller::class, 'RegistrationFeeView'])->name('registration.fee.view');

    Route::get('/registration/fee/classwisedata', [RegistrationFeeContoller::class, 'RegistrationFeeClassData'])->name('student.registration.fee.classwise.get');

    Route::get('/registration/fee/payslip', [RegistrationFeeContoller::class, 'RegistrationFeePayslip'])->name('student.registration.fee.payslip');


    // Monthly Fee
    Route::get('/monthly/fee/view', [MonthlyFeeController::class, 'MonthlyFeeView'])->name('monthly.fee.view');

    Route::get('/monthly/fee/classwisedata', [MonthlyFeeController::class, 'MonthlyFeeClassData'])->name('student.monthly.fee.classwise.get');

    Route::get('/monthly/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePayslip'])->name('student.monthly.fee.payslip');


    // Exam Fee
    Route::get('/exam/fee/view', [ExamFeeController::class, 'ExamFeeView'])->name('exam.fee.view');

    Route::get('/exam/fee/classwisedata', [ExamFeeController::class, 'ExamFeeClassData'])->name('student.exam.fee.classwise.get');

    Route::get('/exam/fee/payslip', [ExamFeeController::class, 'ExamFeePayslip'])->name('student.exam.fee.payslip');


});


// Regitration Management Roll All

Route::prefix('employees')->group(function(){

    Route::get('/regitration/employee/view', [EmployeeRegController::class, 'EmployeeRegitrationView'])->name('employee.regitration.view');

    Route::get('/regitration/employee/add', [EmployeeRegController::class, 'EmployeeRegitrationAdd'])->name('employee.regitration.add');

    Route::post('/regitration/employee/store', [EmployeeRegController::class, 'EmployeeRegitrationStore'])->name('store.employee.regitration');

    Route::get('/regitration/employee/edit/{id}', [EmployeeRegController::class, 'EmployeeRegitrationEdit'])->name('employee.regitration.edit');

    Route::post('/regitration/employee/update/{id}', [EmployeeRegController::class, 'EmployeeRegitrationUpdate'])->name('update.employee.regitration');

    Route::get('/regitration/employee/details/{id}', [EmployeeRegController::class, 'EmployeeRegitrationDetails'])->name('employee.regitration.details');

});




}); // End Middleware Auth Route
