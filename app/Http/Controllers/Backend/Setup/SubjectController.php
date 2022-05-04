<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function ViewSubject(){
        $data['allData'] = Subject::all();

        return view('backend.setup.subject.view_subject', $data);
    }

    public function AddSubject(){
        return view('backend.setup.subject.add_subject');
    }

    public function StoreSubject(Request $request){

        $validateData = $request->validate([
            'name' => 'required|unique:subjects,name',
        ]);

        $data = new Subject();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Subject Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('subject.view')->with($notification);

    }

    public function EditSubject($id){
        $data['editData'] = Subject::find($id);

        return view('backend.setup.subject.edit_subject', $data);
    }

    public function UpdateSubject(Request $request, $id){

        $data = Subject::find($id);

        $validateData = $request->validate([
            'name' => 'required|unique:subjects,name',
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Subject Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('subject.view')->with($notification);
    }

    public function DeleteSubject($id){
        $data = Subject::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Subject Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('subject.view')->with($notification);
    }
}
