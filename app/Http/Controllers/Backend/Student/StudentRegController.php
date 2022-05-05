<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssingStudent;
use App\Models\DiscountStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Http\Request;

class StudentRegController extends Controller
{
    public function StudentRegitrationView(){
        $data['allData'] = AssingStudent::all();

        return view('backend.student.student_reg.view_student', $data);
    }

    public function StudentRegitrationAdd(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();

        return view('backend.student.student_reg.add_student', $data);
    }

    public function StudentRegitrationStore(Request $request){

    }

}
