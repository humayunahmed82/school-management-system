<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function ViewDesignation(){
        $data['allData'] = Designation::all();

        return view('backend.setup.designation.view_designation', $data);
    }

    public function AddDesignation(){
        return view('backend.setup.designation.add_designation');
    }

    public function StoreDesignation(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:designations,name',
        ]);

        $data = new Designation();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('designation.view')->with($notification);
    }

    public function EditDesignation($id){
        $data['editData'] = Designation::find($id);

        return view('backend.setup.designation.edit_designation', $data);
    }

    public function UpdateDesignation(Request $request, $id){

        $data = Designation::find($id);

        $validateData = $request->validate([
            'name' => 'required|unique:designations,name,'.$data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('designation.view')->with($notification);
    }

    public function DeleteDesignation($id){
        $data = Designation::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Designation Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('designation.view')->with($notification);
    }
}
