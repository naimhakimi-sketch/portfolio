<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index()
    {
        $works = Work::all();
        return view('admin.work.index', compact('works'));
    }

    public function create()
    {
        return view('admin.work.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'description' => 'required|string',
            'year_start' => 'required|string',
            'year_end' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('works', 'public');
            $validated['logo'] = $path;
        }

        Work::create($validated);

        return redirect()->route('admin.work.index')->with('success', 'Work experience added!');
    }

    public function edit(Work $work)
    {
        return view('admin.work.edit', compact('work'));
    }

    public function update(Request $request, Work $work)
    {
        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'description' => 'required|string',
            'year_start' => 'required|string',
            'year_end' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('works', 'public');
            $validated['logo'] = $path;
        }

        $work->update($validated);

        return redirect()->route('admin.work.index')->with('success', 'Work experience updated!');
    }

    public function destroy(Work $work)
    {
        $work->delete();
        return redirect()->route('admin.work.index')->with('success', 'Work experience deleted!');
    }
}
