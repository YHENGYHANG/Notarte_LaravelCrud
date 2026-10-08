@extends('layouts.app')

@section('title', 'Add Patient')

@section('content')

<h4>Add Patient</h4>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif

<form action="{{ route('patients.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="student_id" class="form-label">Student ID</label>
        <input type="text" class="form-control" name="student_id" value="{{ old('student_id') }}">
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
    </div>

    <div class="mb-3">
        <label for="course" class="form-label">Course</label>
        <input type="text" class="form-control" name="course" value="{{ old('course') }}">
    </div>

    <div class="mb-3">
        <label for="year_level" class="form-label">Year Level</label>
        <input type="number" class="form-control" name="year_level" value="{{ old('year_level') }}">
    </div>

    <button type="submit" class="btn btn-primary">Save Patient</button>
    <a href="{{ route('patients.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
