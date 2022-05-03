<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\Subject;
use App\Models\AssingSubject;
use Illuminate\Http\Request;

class AssingSubjectController extends Controller
{
    public function AssingSubjectView(){
        // $data['allData'] = AssingSubject::all();
        $data['allData'] = AssingSubject::select('class_id')->groupBy('class_id')->get();

        return view('backend.setup.assing_subject.view_assing_subject', $data);
    }

    public function AssingSubjectAdd(){
        $data['subjects'] = Subject::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.assing_subject.add_assing_subject', $data);
    }

    public function AssingSubjectStore(Request $request){

        $subjectCount = count($request->subject_id);

        if ($subjectCount !=NULL) {
            for ($i=0; $i <$subjectCount ; $i++) {

                $assing_subject = new AssingSubject();
                $assing_subject->class_id = $request->class_id;
                $assing_subject->subject_id = $request->subject_id[$i];
                $assing_subject->full_mark = $request->full_mark[$i];
                $assing_subject->pass_mark = $request->pass_mark[$i];
                $assing_subject->subjective_mark = $request->subjective_mark[$i];
                $assing_subject->save();

            } //End For Loop
        } // End Condition

        $notification = array(
            'message' => 'Subject Assing Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('assing.subject.view')->with($notification);
    }

    public function AssingSubjectEdit($class_id){

        $data['editData'] = AssingSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
        $data['subjects'] = Subject::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.assing_subject.edit_assing_subject', $data);

    }

    public function AssingSubjectUpdate(Request $request, $class_id){


        if ($request->subject_id == NULL) {

            $notification = array(
                'message' => 'Sorry You do not Select any class amount',
                'alert-type' => 'error'
            );

            return redirect()->route('assing.subject.edit', $class_id)->with($notification);

        }else {
            $subjectCount = count($request->subject_id);
            AssingSubject::where('class_id', $class_id)->delete();

            for ($i=0; $i <$subjectCount ; $i++) {

                $assing_subject = new AssingSubject();
                $assing_subject->class_id = $request->class_id;
                $assing_subject->subject_id = $request->subject_id[$i];
                $assing_subject->full_mark = $request->full_mark[$i];
                $assing_subject->pass_mark = $request->pass_mark[$i];
                $assing_subject->subjective_mark = $request->subjective_mark[$i];
                $assing_subject->save();

            } //End For Loop

            $notification = array(
                'message' => 'Assing Subject Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('assing.subject.view', $class_id)->with($notification);
        }

    }

}
