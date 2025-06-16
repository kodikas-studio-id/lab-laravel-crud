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
        $students = collect([
            [
                'id' => 1,
                'name' => 'Ayu Larasati',
                'student_number' => '20210001',
                'email' => 'ayu@example.com',
                'studyProgram' => ['name' => 'Informatika']
            ],
            [
                'id' => 2,
                'name' => 'Budi Santoso',
                'student_number' => '20210002',
                'email' => 'budi@example.com',
                'studyProgram' => ['name' => 'Sistem Informasi']
            ],
        ]);
        return view('pages.students.index', [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $studyPrograms = collect([
            (object)['id' => 1, 'name' => 'Informatika'],
            (object)['id' => 2, 'name' => 'Sistem Informasi'],
        ]);
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
       
            return redirect()->route('students.index')->with('success', 'Success create student!');
        } catch (\Throwable $th) {
            Log::debug($th);
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = (object)[
            'id' => $id,
            'name' => 'Demo Mahasiswa',
            'student_number' => '20219999',
            'email' => 'demo@example.com',
            'studyProgram' => (object)['name' => 'Teknik Komputer']
        ];
        return view('pages.students.show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = (object)[
            'id' => $id,
            'name' => 'Demo Mahasiswa',
            'student_number' => '20219999',
            'email' => 'demo@example.com',
            'study_program_id' => '1',
            'studyProgram' => (object)['name' => 'Teknik Komputer']
        ];
        $studyPrograms = collect([
            (object)['id' => 1, 'name' => 'Informatika'],
            (object)['id' => 2, 'name' => 'Sistem Informasi'],
        ]);

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
            return redirect()->route('students.index')->with('success', 'Student delete!');
        } catch (\Throwable $th) {
            throw $th;
       }
    }
}
