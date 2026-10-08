@extends('layouts.app')
@section('title', 'Edit Patient')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Patient</h4>
    </div>

    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <form action="{{ route('patients.update', $patient->id) }}"
        method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Student ID</label>
            <input type="text" name="student_id" value="{{ old('student_id', $patient->student_id) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Patient Name</label>
            <input type="text" name="name" value="{{ old('name', $patient->name) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Course</label>
            <input type="text" name="course" value="{{ old('course', $patient->course) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Year Level</label>
            <input type="number" name="year_level" value="{{ old('year_level', $patient->year_level) }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Patient</button>
        <a href="{{ route('patients.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
