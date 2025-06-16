@extends('layouts.app')

@section('title', 'Study Program Detail')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow rounded-lg p-6 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Study Program Detail</h2>

        <div class="mb-4">
            <p class="text-sm text-gray-500">Program Name</p>
            <p class="text-lg text-gray-900 font-semibold">{{ $studyProgram['name'] }}</p>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('study-programs.index') }}"
                class="inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">
                Back
            </a>
            <a href="{{ route('study-programs.edit', $studyProgram['id']) }}"
                class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Edit
            </a>
        </div>
    </div>

    {{-- Students List --}}
    <div class="bg-white shadow rounded-lg p-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Students in This Program</h3>

        <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-3 text-left">#</th>
                            <th class="px-4 py-3 text-left">Name</th>
                            <th class="px-4 py-3 text-left">Student Number</th>
                            <th class="px-4 py-3 text-left">Email</th>
                            <th class="px-4 py-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($students as $index => $student)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-2">{{ $index + 1 }}</td>
                                <td class="px-4 py-2">{{ $student['name'] }}</td>
                                <td class="px-4 py-2">{{ $student['student_number'] }}</td>
                                <td class="px-4 py-2">{{ $student['email'] }}</td>
                                <td class="px-4 py-2 flex space-x-2">
                                    <a href="{{ route('students.show', $student['id']) }}"
                                        class="bg-purple-500 hover:bg-purple-600 text-white px-3 py-1 rounded-md text-sm shadow">Show</a>
                                  
                                    <a href="{{ route('students.edit', $student['id']) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md text-sm shadow">Edit</a>
                                    <form method="POST" action="{{ route('students.destroy', $student['id']) }}" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm shadow">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center px-4 py-6 text-gray-500">
                                    No students found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
