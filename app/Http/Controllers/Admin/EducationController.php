<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::all();
        return view('admin.education.index', compact('educations'));
    }

    public function create()
    {
        return view('admin.education.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'year_start' => 'required|string',
            'year_end' => 'required|string',
            'grade' => 'nullable|string|max:255',
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('educations', 'public');
            $validated['logo'] = $path;
        }

        Education::create($validated);

        return redirect()->route('admin.education.index')->with('success', 'Education added!');
    }

    public function edit(Education $education)
    {
        return view('admin.education.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'year_start' => 'required|string',
            'year_end' => 'required|string',
            'grade' => 'nullable|string|max:255',
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('educations', 'public');
            $validated['logo'] = $path;
        }

        $education->update($validated);

        return redirect()->route('admin.education.index')->with('success', 'Education updated!');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('admin.education.index')->with('success', 'Education deleted!');
    }
}
