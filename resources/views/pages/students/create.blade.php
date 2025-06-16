@extends('layouts.app')

@section('title', 'Create Student')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Add Student</h2>

    <form action="{{ route('students.store') }}" method="POST" class="space-y-6 bg-white p-6">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-900">Full Name</label>
            <input type="text" name="name" id="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('name') border-red-500 @enderror"
                placeholder="John Doe" value="{{ old('name') }}" required>
            @error('name')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="student_number" class="block text-sm font-medium text-gray-900">Student Number</label>
            <input type="text" name="student_number" id="student_number"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('student_number') border-red-500 @enderror"
                placeholder="2021001234" value="{{ old('student_number') }}" required>
            @error('student_number')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="study_program_id" class="block text-sm font-medium text-gray-900">Study Program</label>
            <select name="study_program_id" id="study_program_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('study_program_id') border-red-500 @enderror" required>
                <option value="">-- Select --</option>
                @foreach($studyPrograms as $program)
                    <option value="{{ $program->id }}" {{ old('study_program_id') == $program->id ? 'selected' : '' }}>
                        {{ $program->name }}
                    </option>
                @endforeach
            </select>
            @error('study_program_id')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-900">Email Address</label>
            <input type="email" name="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('email') border-red-500 @enderror"
                placeholder="student@email.com" value="{{ old('email') }}" required>
            @error('email')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end pt-4 gap-3">
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Save
            </button>
            <a href="{{ route('study-programs.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
