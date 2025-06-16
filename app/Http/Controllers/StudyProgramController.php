<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StudyProgramController extends Controller
{
    // Data statis program studi dan mahasiswa
    protected $studyPrograms = [
        [
            'id' => 1,
            'name' => 'Informatika',
        ],
        [
            'id' => 2,
            'name' => 'Sistem Informasi',
        ],
    ];

    protected $students = [
        [
            'id' => 1,
            'name' => 'Ayu Larasati',
            'student_number' => '20210001',
            'email' => 'ayu@example.com',
            'study_program_id' => 1,
        ],
        [
            'id' => 2,
            'name' => 'Budi Santoso',
            'student_number' => '20210002',
            'email' => 'budi@example.com',
            'study_program_id' => 2,
        ],
        [
            'id' => 3,
            'name' => 'Citra Andini',
            'student_number' => '20210003',
            'email' => 'citra@example.com',
            'study_program_id' => 1,
        ],
    ];

    public function index(Request $request)
    {
        $keyword = $request->query('q');

        $studyPrograms = collect($this->studyPrograms);


        return view('pages.study-programs.index', [
            'studyPrograms' => $studyPrograms->values()
        ]);
    }

    public function create()
    {
        return view('pages.study-programs.create');
    }

    public function store(Request $request)
    {
        // Simulasi penyimpanan
        return redirect()->route('study-programs.index')->with('success', 'Study Program created successfully (simulasi).');
    }

    public function show($id)
    {
        $studyProgram = collect($this->studyPrograms)->firstWhere('id', $id);

        if (!$studyProgram) {
            return redirect()->route('study-programs.index')->with('error', 'Study Program not found.');
        }

        $students = collect($this->students)
            ->where('study_program_id', $id)
            ->values();

        return view('pages.study-programs.show', compact('studyProgram', 'students'));
    }

    public function edit($id)
    {
        $studyProgram = collect($this->studyPrograms)->firstWhere('id', $id);

        if (!$studyProgram) {
            return redirect()->route('study-programs.index')->with('error', 'Study Program not found.');
        }

        return view('pages.study-programs.edit', compact('studyProgram'));
    }

    public function update(Request $request, $id)
    {
        // Simulasi update
        return redirect()->route('study-programs.index')->with('success', 'Study Program updated successfully (simulasi).');
    }

    public function destroy($id)
    {
        // Simulasi delete
        return redirect()->route('study-programs.index')->with('success', 'Study Program deleted successfully (simulasi).');
    }
}
