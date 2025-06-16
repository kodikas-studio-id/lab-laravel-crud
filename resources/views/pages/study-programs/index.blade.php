@extends('layouts.app')

@section('title', 'Study Program List')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header Section --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-4 sm:mb-0">Study Program List</h1>

            {{-- Search --}}
            <form action="{{ route('study-programs.index') }}" method="GET" class="w-full sm:w-auto">
                <input type="text" name="q" placeholder="Search..."
                       value="{{ request('q') }}"
                       class="w-full sm:w-64 rounded-md border border-gray-300 bg-white text-gray-900 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </form>
        </div>

        {{-- Buttons --}}
        <div class="flex flex-wrap gap-2 mb-6">
            <a href="{{ route('study-programs.create') }}"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-semibold shadow transition">
                Add Study Program
            </a>
            <a href="{{ route('students.index') }}"
               class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md font-semibold shadow transition">
                List Student
            </a>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left">#</th>
                        <th class="px-4 py-3 text-left">Program Name</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($studyPrograms as $index => $program)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $program['name'] }}</td>
                            <td class="px-4 py-2 flex space-x-2">
                                <a href="{{ route('study-programs.show', $program['id']) }}"
                                   class="bg-purple-500 hover:bg-purple-600 text-white px-3 py-1 rounded-md text-sm shadow">Show</a>
                                <a href="{{ route('study-programs.edit', $program['id']) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md text-sm shadow">Edit</a>
                                <form method="POST" action="{{ route('study-programs.destroy', $program['id']) }}" onsubmit="return confirm('Are you sure?')">
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
                            <td colspan="3" class="text-center px-4 py-6 text-gray-500">
                                No study programs found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
