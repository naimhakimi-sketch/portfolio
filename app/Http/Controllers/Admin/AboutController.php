<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::first() ?? new About();
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'resume' => 'nullable|file|mimes:pdf',
        ]);

        $about = About::first() ?? new About();

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profile', 'public');
            $validated['profile_image'] = $path;
        }

        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes', 'public');
            $validated['resume'] = $path;
        }

        $about->fill($validated)->save();

        return redirect()->route('admin.about.edit')->with('success', 'About section updated!');
    }
}
