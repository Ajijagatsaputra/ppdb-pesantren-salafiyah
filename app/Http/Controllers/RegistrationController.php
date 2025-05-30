<?php

namespace App\Http\Controllers;

use App\Models\Registrations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegistrationController extends Controller
{
    public function showForm()
    {
        return view('registration.form');
    }

    public function submitForm(Request $request)
{
    $validated = $request->validate([
        'full_name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'school_origin' => 'required|string|max:255',
        'birth_date' => 'required|date',
        'nisn' => 'nullable|string|max:50',
        'gender' => 'required|in:male,female',
        'document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('document')) {
        $path = $request->file('document')->store('documents', 'public');
        $validated['document_path'] = $path;
    }

    $validated['status_payment'] = 'pending'; // default status pembayaran

    Registrations::create($validated);

    return redirect()->back()->with('success', 'Pendaftaran berhasil, silakan lanjutkan pembayaran.');
}

}
