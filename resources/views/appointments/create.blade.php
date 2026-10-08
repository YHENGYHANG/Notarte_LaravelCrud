@extends('layouts.app')

@section('title', 'Add Appointment')

@section('content')

<h4>Add Appointment</h4>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif

<form action="{{ route('appointments.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="patient_id" class="form-label">Patient</label>
        <select class="form-control" name="patient_id">
            <option value="">-- Select Patient --</option>
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>{{ $patient->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="doctor_id" class="form-label">Doctor</label>
        <select class="form-control" name="doctor_id">
            <option value="">-- Select Doctor --</option>
            @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="appointment_date" class="form-label">Appointment Date</label>
        <input type="date" class="form-control" name="appointment_date" value="{{ old('appointment_date') }}">
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-control" name="status">
            @foreach(['Pending', 'Confirmed', 'Completed', 'Cancelled'] as $status)
                <option value="{{ $status }}" {{ old('status', 'Pending') == $status ? 'selected' : '' }}>{{ $status }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Save Appointment</button>
    <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
