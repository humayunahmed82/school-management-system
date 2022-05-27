<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssingStudent;
use App\Models\DiscountStudent;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;


class MonthlyFeeController extends Controller
{
    public function MonthlyFeeView(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        return view('backend.student.monthly_fee.view_monthly-fee', $data);
    }
}
