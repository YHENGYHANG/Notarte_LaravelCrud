<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

</head>
<body>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('doctors.index') }}">Doctors</a>
    <a href="{{ route('patients.index') }}">Patients</a>
    <a href="{{ route('appointments.index') }}">Appointments</a>

    <h2>List of Appointments</h2>

    <a href="{{ route('appointments.create') }}" class="btn btn-primary">Add Appointment</a>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div>
        @foreach ($appointments as $appointment)
            <p>Patient: {{ $appointment->patient->name }} |
                Doctor: {{ $appointment->doctor->name }} |
                Date: {{ $appointment->appointment_date }} |
                Status: {{ $appointment->status }}

                <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning">Edit</a>

                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                    onClick="return confirm('Are you sure you want to delete this appointment?')">Delete</button>
                </form>
            </p>
        @endforeach
    </div>
  
</body>
</html>
