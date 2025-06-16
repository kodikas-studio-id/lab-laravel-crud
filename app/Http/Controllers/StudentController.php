<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $q = $request->query('q');
        $students = Student::with('studyProgram')->when($q, function($query) use($q){
            $query->where('name','like', '%' . $q . '%');
            $query->orWhere('student_number', 'like', '%' . $q . '%');
            $query->orWhere('email', 'like', '%' . $q . '%');
        })->latest()->get();
        return view('pages.students.index', [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $studyPrograms = StudyProgram::get();
        return view('pages.students.create', [
            'studyPrograms' => $studyPrograms
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'student_number' => 'required|string',
                'study_program_id' => 'required|exists:study_programs,id',
                'email' => 'required|email|unique:students,email',
            ]);
            Student::create([
                'name' => $request->name,
                'student_number' => $request->student_number,
                'student_number' => $request->student_number,
                'study_program_id' => $request->study_program_id,
                'email' => $request->email,
            ]);
            return redirect()->route('students.index')->with('success', 'Success create student!');
        } catch (\Throwable $th) {
            Log::debug($th);
            throw $th;
            // return redirect()->route('students.index')->with('error', "Something wrong!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);
        return view('pages.students.show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        $studyPrograms = StudyProgram::get();
        return view('pages.students.edit', [
            'student' => $student,
            'studyPrograms' => $studyPrograms
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      try {
            $request->validate([
                'name' => 'required|string',
                'student_number' => 'required|string',
                'study_program_id' => 'required|exists:study_programs,id',
                'email' => 'required|email',
            ]);

            Student::where('id', $id)->update([
                'name' => $request->name,
                'student_number' => $request->student_number,
                'study_program_id' => $request->study_program_id,
                'email' => $request->email,
            ]);
            return redirect()->route('students.index')->with('success', 'Success update student!');
        } catch (\Throwable $th) {
            if ($th->getCode() == 23000) {
                return redirect()->route('students.edit', $id)->with('error', 'Email allready used!');
            }
      }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Student::where('id', $id)->delete();
            return redirect()->route('students.index')->with('success', 'Student delete!');
        } catch (\Throwable $th) {
            throw $th;
       }
    }
}
