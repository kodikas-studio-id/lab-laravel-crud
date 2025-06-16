@extends('layouts.app')

@section('title', 'Student Details')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mx-auto bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Student Details</h2>

        <div class="grid grid-cols-1 gap-4">
            <div>
                <p class="text-sm text-gray-500">Full Name</p>
                <p class="text-lg text-gray-900">{{ $student->name }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Student Number (NIM)</p>
                <p class="text-lg text-gray-900">{{ $student->student_number }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Email Address</p>
                <p class="text-lg text-gray-900">{{ $student->email }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Study Program</p>
                <p class="text-lg text-gray-900">
                    {{ $student->studyProgram->name ?? '-' }}
                </p>
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('students.index') }}"
                class="inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">
                Back
            </a>
            <a href="{{ route('students.edit', $student->id) }}"
                class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Edit
            </a>
        </div>
    </div>
</div>
@endsection
