<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    public function ViewShift(){
        $data['allData'] = StudentShift::all();

        return view('backend.setup.student_shift.view_shift', $data);
    }

    public function AddShift(){
        return view('backend.setup.student_shift.add_shift');
    }

    public function ShiftStore(Request $request){
        $validation = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);

        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();

        $notification = array (
            'message' => 'Student Shift Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function ShiftEdit($id){
        $editData = StudentShift::find($id);

        return view('backend.setup.student_shift.edit_shift', compact('editData'));
    }

    public function ShiftUpdate(Request $request, $id){

        $data = StudentShift::find($id);

        $validation = $request->validate([
            'name' => 'required|unique:student_shifts,name,'.$data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array (
            'message' => 'Student Shift Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function ShiftDelete($id){

        $data = StudentShift::find($id);
        $data->delete();

        $notification = array (
            'message' => 'Student Shift Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }
}
