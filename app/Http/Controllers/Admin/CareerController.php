<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Career::latest();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('department', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('job_type')) {
            $query->where('job_type', $request->input('job_type'));
        }

        $careers = $query->paginate(10)->withQueryString();
        
        return view('admin.careers', compact('careers'));
    }

    public function create()
    {
        return view('admin.add-career');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:active,closed,draft',
            'job_type' => 'required|in:full-time,part-time,contract,internship',
            'experience' => 'nullable|string|max:255',
        ]);

        Career::create($validated);

        return redirect()->route('admin.careers.index')->with('success', 'Career created successfully.');
    }

    public function show(Career $career)
    {
        return view('admin.add-career', compact('career'));
    }

    public function edit(Career $career)
    {
        return view('admin.add-career', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:active,closed,draft',
            'job_type' => 'required|in:full-time,part-time,contract,internship',
            'experience' => 'nullable|string|max:255',
        ]);

        $career->update($validated);

        return redirect()->route('admin.careers.index')->with('success', 'Career updated successfully.');
    }

    public function destroy(Career $career)
    {
        $career->delete();
        return redirect()->route('admin.careers.index')->with('success', 'Career deleted successfully.');
    }
}
