@extends('layouts.app')
@section('title', 'Edit Study Program')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-xl font-semibold mb-4">Edit Study Program</h2>

        <form action="{{ route('study-programs.update', $studyProgram->id) }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="name" class="block font-medium mb-1">Program Name</label>
                <input type="text" name="name" id="name"
                       value="{{ old('name', $studyProgram->name) }}"
                       class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring focus:ring-blue-200 @error('name') border-red-500 @enderror">
                @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('study-programs.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
