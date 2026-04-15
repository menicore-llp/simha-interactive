<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Applicant::latest();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('position')) {
            $query->where('position', $request->input('position'));
        }

        $applicants = $query->paginate(10)->withQueryString();
        
        return view('admin.applicants', compact('applicants'));
    }

    public function create()
    {
        // Typically handled by the frontend, but we add it for completeness
        return view('contact-us');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'position' => 'required|string|max:255',
            'message' => 'nullable|string',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes', 'public');
            $validated['resume'] = $path;
        }

        $validated['status'] = 'new'; // default status

        Applicant::create($validated);

        return back()->with('success', 'Application submitted successfully.');
    }

    public function show(Applicant $applicant)
    {
        return response()->json($applicant);
    }

    public function edit(Applicant $applicant)
    {
        // Applicants usually aren't "edited" via a form, just status updates
        return back();
    }

    public function update(Request $request, Applicant $applicant)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,reviewed,contacted,rejected',
        ]);

        $applicant->update($validated);

        return redirect()->route('admin.applicants.index')->with('success', 'Applicant status updated successfully.');
    }

    public function destroy(Applicant $applicant)
    {
        $applicant->delete();
        return redirect()->route('admin.applicants.index')->with('success', 'Applicant deleted successfully.');
    }
}
