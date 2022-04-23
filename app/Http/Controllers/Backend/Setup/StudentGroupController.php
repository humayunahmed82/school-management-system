<?php

namespace App\Http\Controllers\Backend\setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function ViewGroup(){
        $data['allData'] = StudentGroup::all();

        return view('backend.setup.student_group.view_group', $data);
    }

    public function AddGroup(){
        return view('backend.setup.student_group.add_group');
    }

    public function GroupStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);

        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function GroupEdit($id){

        $editData =  StudentGroup::find($id);

        return view('backend.setup.student_group.edit_group', compact('editData'));
    }

    public function GroupUpdate(Request $request, $id){
        $data = StudentGroup::find($id);

        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name,'.$data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function GroupDelete($id){
        $data = StudentGroup::find($id);

        $data->delete();

        $notification = array(
            'message' => 'Student Group Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.view')->with($notification);
    }
}
