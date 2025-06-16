@extends('layouts.app')

@section('title', 'Laravel CRUD Lab - Kode Class 5')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow p-6 text-center">
        <h1 class="text-4xl font-extrabold text-blue-700 mb-4">Laravel CRUD Lab</h1>
        <p class="text-lg text-gray-700 mb-2"> <strong>Code Lab: LAB-LARAVEL-CRUD-05</strong></p>
        <p class="text-gray-600 mb-6">Belajar Eloquent & Query Builder dengan studi kasus manajemen data mahasiswa.</p>

        <div class="flex flex-col sm:flex-row justify-center items-center gap-4 mt-8">
            <a href="{{ route('students.index') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold shadow transition">
                Manage Students
            </a>
            <a href="{{ route('study-programs.index') }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-lg font-semibold shadow transition">
                Study Programs
            </a>
        </div>
    </div>
</div>
@endsection
