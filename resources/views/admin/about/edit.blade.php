@extends('admin.layouts.app')

@section('title', 'Edit About Section')

@section('content')
<div class="header">
    <h1>Edit About Section</h1>
</div>

<div class="content">
    <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group @error('profile_image') error @enderror">
            <label for="profile_image">Profile Image</label>
            <input type="file" id="profile_image" name="profile_image" accept="image/*">
            @if($about && $about->profile_image)
                <p style="margin-top: 0.5rem; color: #666;">
                    Current: <img src="{{ Storage::url($about->profile_image) }}" alt="Profile" style="max-width: 150px; max-height: 150px; border-radius: 50%;">
                </p>
            @endif
            @error('profile_image') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="form-group @error('name') error @enderror">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $about->name ?? '') }}" required>
            @error('name') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="form-group @error('email') error @enderror">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $about->email ?? '') }}" required>
            @error('email') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="form-group @error('phone') error @enderror">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" value="{{ old('phone', $about->phone ?? '') }}" required>
            @error('phone') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="form-group @error('content') error @enderror">
            <label for="content">Bio/Content</label>
            <textarea id="content" name="content" required>{{ old('content', $about->content ?? '') }}</textarea>
            @error('content') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="form-group @error('linkedin') error @enderror">
            <label for="linkedin">LinkedIn URL</label>
            <input type="url" id="linkedin" name="linkedin" value="{{ old('linkedin', $about->linkedin ?? '') }}" placeholder="https://linkedin.com/in/...">
            @error('linkedin') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="form-group @error('github') error @enderror">
            <label for="github">GitHub URL</label>
            <input type="url" id="github" name="github" value="{{ old('github', $about->github ?? '') }}" placeholder="https://github.com/...">
            @error('github') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="form-group @error('resume') error @enderror">
            <label for="resume">Resume (PDF)</label>
            <input type="file" id="resume" name="resume" accept=".pdf">
            @if($about && $about->resume)
                <p style="margin-top: 0.5rem; color: #666;">
                    Current: <a href="{{ Storage::url($about->resume) }}" target="_blank">View Resume</a>
                </p>
            @endif
            @error('resume') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Save Changes</button>
    </form>
</div>
@endsection
