<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();

        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|unique:patients,student_id',
            'name' => 'required',
            'course' => 'required',
            'year_level' => 'required|integer|min:1|max:10'
        ]);

        Patient::create([
            'student_id' => $request->student_id,
            'name' => $request->name,
            'course' => $request->course,
            'year_level' => $request->year_level
        ]);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'student_id' => 'required|unique:patients,student_id,' . $patient->id,
            'name' => 'required',
            'course' => 'required',
            'year_level' => 'required|integer|min:1|max:10'
        ]);

        $patient->update([
            'student_id' => $request->student_id,
            'name' => $request->name,
            'course' => $request->course,
            'year_level' => $request->year_level
        ]);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient deleted successfully.');
    }
}
