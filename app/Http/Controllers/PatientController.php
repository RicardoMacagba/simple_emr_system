<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::latest()->paginate(10);
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get all doctors for the dropdown
        $doctors = User::where('role', 'doctor')->get();
        return view('patients.create', compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'date_of_birth' => 'required|date|before:today',
                'gender' => ['required', Rule::in(['male', 'female', 'other'])],
                'address' => 'required|string|max:500',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|unique:patients',
                'medical_history' => 'nullable|string',
                'allergies' => 'nullable|string',
                'blood_type' => ['nullable', Rule::in(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])],
                'emergency_contact_name' => 'required|string|max:255',
                'emergency_contact_phone' => 'required|string|max:20',
                'insurance_provider' => 'nullable|string|max:255',
                'insurance_number' => 'nullable|string|max:255',
                'occupation' => 'nullable|string|max:255',
                'marital_status' => ['nullable', Rule::in(['single', 'married', 'divorced', 'widowed'])],
                'height' => 'nullable|numeric|between:0,300',
                'weight' => 'nullable|numeric|between:0,500',
                'notes' => 'nullable|string',
                'assigned_doctor_id' => 'nullable|exists:users,id',
            ]);

            // Set the user_id to the currently authenticated user
            $validated['user_id'] = Auth::id();

            // Create the patient
            $patient = Patient::create($validated);

            DB::commit();

            return redirect()
                ->route('patients.show', $patient)
                ->with('success', 'Patient created successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Please correct the errors below.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'An error occurred while creating the patient. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        // Get all doctors for the dropdown
        $doctors = User::where('role', 'doctor')->get();
        return view('patients.edit', compact('patient', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'date_of_birth' => 'required|date|before:today',
                'gender' => ['required', Rule::in(['male', 'female', 'other'])],
                'address' => 'required|string|max:500',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|unique:patients,email,' . $patient->id,
                'medical_history' => 'nullable|string',
                'allergies' => 'nullable|string',
                'blood_type' => ['nullable', Rule::in(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])],
                'emergency_contact_name' => 'required|string|max:255',
                'emergency_contact_phone' => 'required|string|max:20',
                'insurance_provider' => 'nullable|string|max:255',
                'insurance_number' => 'nullable|string|max:255',
                'occupation' => 'nullable|string|max:255',
                'marital_status' => ['nullable', Rule::in(['single', 'married', 'divorced', 'widowed'])],
                'height' => 'nullable|numeric|between:0,300',
                'weight' => 'nullable|numeric|between:0,500',
                'notes' => 'nullable|string',
                'assigned_doctor_id' => 'nullable|exists:users,id',
            ]);

            $patient->update($validated);

            DB::commit();

            return redirect()
                ->route('patients.show', $patient)
                ->with('success', 'Patient updated successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Please correct the errors below.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'An error occurred while updating the patient. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        try {
            $patient->delete();
            return redirect()
                ->route('patients.index')
                ->with('success', 'Patient deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while deleting the patient. Please try again.');
        }
    }
}
