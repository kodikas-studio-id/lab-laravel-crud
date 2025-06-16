<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyProgram extends Model
{
    /** @use HasFactory<\Database\Factories\StudyProgramFactory> */
    use HasFactory;
    protected $fillable = ['name'];
    
    public function students()
    {
        return $this->hasMany(Student::class, 'study_program_id');
    }
}
