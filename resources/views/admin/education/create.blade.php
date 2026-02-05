@extends('admin.layouts.app')

@section('title', 'Add Education')

@section('content')
<div class="header">
    <h1>Add New Education</h1>
</div>

<div class="content">
    <form method="POST" action="{{ route('admin.education.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group @error('title') error @enderror">
            <label for="title">Degree Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="e.g., Bachelor of Science in Computer Science" required>
            @error('title') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="form-group @error('institution') error @enderror">
            <label for="institution">Institution</label>
            <input type="text" id="institution" name="institution" value="{{ old('institution') }}" placeholder="University or College Name" required>
            @error('institution') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group @error('year_start') error @enderror">
                <label for="year_start">Start Year</label>
                <input type="text" id="year_start" name="year_start" value="{{ old('year_start') }}" placeholder="2020" required>
                @error('year_start') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group @error('year_end') error @enderror">
                <label for="year_end">End Year</label>
                <input type="text" id="year_end" name="year_end" value="{{ old('year_end') }}" placeholder="2024" required>
                @error('year_end') <div class="error-message">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group @error('grade') error @enderror">
            <label for="grade">Grade/GPA (Optional)</label>
            <input type="text" id="grade" name="grade" value="{{ old('grade') }}" placeholder="e.g., 3.8 GPA, A+">
            @error('grade') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="form-group @error('description') error @enderror">
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ old('description') }}</textarea>
            @error('description') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="form-group @error('logo') error @enderror">
            <label for="logo">Logo/Image</label>
            <input type="file" id="logo" name="logo" accept="image/*">
            @error('logo') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Save Education</button>
        <a href="{{ route('admin.education.index') }}" class="btn" style="background: #95a5a6;">Cancel</a>
    </form>
</div>
@endsection
