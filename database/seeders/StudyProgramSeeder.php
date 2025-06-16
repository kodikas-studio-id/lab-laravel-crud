<?php

namespace Database\Seeders;

use App\Models\StudyProgram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudyProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studyPrograms = [
            ['name' => 'PJJ Informatika'],
            ['name' => 'PJJ Akuntansi'],
            ['name' => 'PJJ Management'],
            ['name' => 'PJJ Komunikasi'],
            ['name' => 'PJJ Bahasa Korea'],
        ];

        foreach ($studyPrograms as $studyProgram) {
            StudyProgram::create($studyProgram);
        }
    }
}
