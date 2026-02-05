@extends('admin.layouts.app')

@section('title', 'Add Work Experience')

@section('content')
<div class="header">
    <h1>Add New Work Experience</h1>
</div>

<div class="content">
    <form method="POST" action="{{ route('admin.work.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group @error('position') error @enderror">
            <label for="position">Job Position</label>
            <input type="text" id="position" name="position" value="{{ old('position') }}" placeholder="e.g., Senior Web Developer" required>
            @error('position') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="form-group @error('company') error @enderror">
            <label for="company">Company</label>
            <input type="text" id="company" name="company" value="{{ old('company') }}" placeholder="Company Name" required>
            @error('company') <div class="error-message">{{ $message }}</div> @enderror
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

        <div class="form-group @error('description') error @enderror">
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ old('description') }}</textarea>
            @error('description') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="form-group @error('logo') error @enderror">
            <label for="logo">Company Logo/Image</label>
            <input type="file" id="logo" name="logo" accept="image/*">
            @error('logo') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Save Work Experience</button>
        <a href="{{ route('admin.work.index') }}" class="btn" style="background: #95a5a6;">Cancel</a>
    </form>
</div>
@endsection
