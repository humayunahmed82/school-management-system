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
use Illuminate\Support\Facades\DB;

class StudentRegController extends Controller
{
    public function StudentRegitrationView(){
        $data['allData'] = AssingStudent::all();
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

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


        DB::transaction(function () use($request){
            $checkYear = StudentYear::find($request->year_id)->name;
            $student = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first();

            if ($student == null) {
                $firstReg = 0;
                $studentId = $firstReg+1;

                if ($studentId < 10) {
                    $id_no = '000'.$studentId;
                }elseif ($studentId < 100) {
                    $id_no = '00'.$studentId;
                }elseif ($studentId < 1000) {
                    $id_no = '0'.$studentId;
                }
            }else {
                $student = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first()->id;
                $studentId = $student+1;

                if ($studentId < 10) {
                    $id_no = '000'.$studentId;
                }elseif ($studentId < 100) {
                    $id_no = '00'.$studentId;
                }elseif ($studentId < 1000) {
                    $id_no = '0'.$studentId;
                }
            }

            $final_id_no = $checkYear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'Student';
            $user->code = $code;
            $user->name = $request->name;
            $user->f_name = $request->f_name;
            $user->m_name = $request->m_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));

            if ($request->file('image')) {
                $file = $request->file('image');

                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images/'),$filename);
                $user['image'] = $filename;
            }

            $user->save();

            $assing_student = new AssingStudent();
            $assing_student->student_id = $user->id;
            $assing_student->year_id = $request->year_id;
            $assing_student->class_id = $request->class_id;
            $assing_student->group_id = $request->group_id;
            $assing_student->shift_id = $request->shift_id;
            $assing_student->save();

            $discount_student = new DiscountStudent();
            $discount_student->assing_student_id = $assing_student->id;
            $discount_student->fee_category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();

        });

        $notification = array(
            'message' => 'Student Regitration Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.regitration.view')->with($notification);

    }

}
