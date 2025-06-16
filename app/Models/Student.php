<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = ['name', 'student_number', 'study_program_id', 'email'];

    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class);
    }
}
