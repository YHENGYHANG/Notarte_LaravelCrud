@extends('layouts.app')
@section('content')
<h2>List of Patients</h2>

    <a href="{{ route('patients.create') }}" class="btn btn-primary">Add Patient</a>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div>
        @foreach ($patients as $patient )
            <p>Patient Name: {{ $patient->name }}
                <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>

                <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                    onClick="return confirm('Are you sure you want to delete this patient?')">Delete</button>
                </form>
            </p>
        @endforeach
        
    </div>

@endsection
