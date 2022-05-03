<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssingSubject extends Model
{
    public function student_classes(){
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }
    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

}
