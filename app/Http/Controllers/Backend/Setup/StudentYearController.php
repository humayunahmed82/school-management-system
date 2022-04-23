<?php

namespace App\Http\Controllers\Backend\setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    public function ViewYear(){
        $data['allData'] = StudentYear::all();

        return view('backend.setup.student_year.view_year',  $data);
    }

    public function AddYear(){

        return view('backend.setup.student_year.add_year');
    }

    public function YearStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);

        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function YearEdit($id){
        $editData = StudentYear::find($id);

        return view('backend.setup.student_year.edit_year', compact('editData'));
    }

    public function YearUpdate(Request $request, $id){
        $data = StudentYear::find($id);

        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name,'.$data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function YearDelete($id){
        $data = StudentYear::find($id);

        $data->delete();

        $notification = array(
            'message' => 'Student Year Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notification);
    }
}
