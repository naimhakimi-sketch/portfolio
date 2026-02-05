<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function index()
    {
        $certifications = Certification::all();
        return view('admin.certification.index', compact('certifications'));
    }

    public function create()
    {
        return view('admin.certification.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'issuing_organisation' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'issued' => 'required|string',
            'expires' => 'nullable|string',
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('certifications', 'public');
            $validated['logo'] = $path;
        }

        Certification::create($validated);

        return redirect()->route('admin.certification.index')->with('success', 'Certification added!');
    }

    public function edit(Certification $certification)
    {
        return view('admin.certification.edit', compact('certification'));
    }

    public function update(Request $request, Certification $certification)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'issuing_organisation' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'issued' => 'required|string',
            'expires' => 'nullable|string',
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('certifications', 'public');
            $validated['logo'] = $path;
        }

        $certification->update($validated);

        return redirect()->route('admin.certification.index')->with('success', 'Certification updated!');
    }

    public function destroy(Certification $certification)
    {
        $certification->delete();
        return redirect()->route('admin.certification.index')->with('success', 'Certification deleted!');
    }
}
