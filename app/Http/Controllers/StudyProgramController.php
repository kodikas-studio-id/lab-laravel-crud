<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StudyProgramController extends Controller
{
    public function index()
    {
        $programs = DB::table('study_programs')->orderByDesc('created_at')->get();
        return view('study-programs.index', compact('programs'));
    }

    public function create()
    {
        return view('study-programs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:study_programs,name',
        ]);

        try {
            DB::table('study_programs')->insert([
                'name' => $request->name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('study-programs.index')->with('success', 'Study Program created successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to store study program: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create study program.');
        }
    }

    public function show($id)
    {
        try {
            $studyProgram = DB::table('study_programs')->find($id);

            if (!$studyProgram) {
                return redirect()->route('study-programs.index')->with('error', 'Study Program not found.');
            }

            return view('study-programs.show', compact('studyProgram'));
        } catch (\Exception $e) {
            Log::error('Failed to show study program: ' . $e->getMessage());
            return redirect()->route('study-programs.index')->with('error', 'Error retrieving study program.');
        }
    }

    public function edit($id)
    {
        try {
            $studyProgram = DB::table('study_programs')->find($id);

            if (!$studyProgram) {
                return redirect()->route('study-programs.index')->with('error', 'Study Program not found.');
            }

            return view('study-programs.edit', compact('studyProgram'));
        } catch (\Exception $e) {
            Log::error('Failed to load edit form: ' . $e->getMessage());
            return redirect()->route('study-programs.index')->with('error', 'Error loading edit form.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:study_programs,name,' . $id,
        ]);

        try {
            $updated = DB::table('study_programs')->where('id', $id)->update([
                'name' => $request->name,
                'updated_at' => now(),
            ]);

            if (!$updated) {
                return redirect()->route('study-programs.index')->with('error', 'No changes made or program not found.');
            }

            return redirect()->route('study-programs.index')->with('success', 'Study Program updated successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to update study program: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update study program.');
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = DB::table('study_programs')->where('id', $id)->delete();

            if (!$deleted) {
                return redirect()->route('study-programs.index')->with('error', 'Study Program not found or already deleted.');
            }

            return redirect()->route('study-programs.index')->with('success', 'Study Program deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to delete study program: ' . $e->getMessage());
            return redirect()->route('study-programs.index')->with('error', 'Failed to delete study program.');
        }
    }
}
