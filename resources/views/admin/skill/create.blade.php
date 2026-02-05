@extends('admin.layouts.app')

@section('title', 'Add Skill')

@section('content')
<div class="header">
    <h1>Add New Skill</h1>
</div>

<div class="content">
    <form method="POST" action="{{ route('admin.skill.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group @error('name') error @enderror">
            <label for="name">Skill Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="e.g., PHP, JavaScript, Laravel" required>
            @error('name') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group @error('level') error @enderror">
                <label for="level">Proficiency Level</label>
                <select id="level" name="level" required>
                    <option value="">Select Level</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                    <option value="Expert">Expert</option>
                </select>
                @error('level') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group @error('category') error @enderror">
                <label for="category">Category</label>
                <input type="text" id="category" name="category" value="{{ old('category') }}" placeholder="e.g., Backend, Frontend, Database" required>
                @error('category') <div class="error-message">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group @error('image') error @enderror">
            <label for="image">Skill Icon/Logo</label>
            <input type="file" id="image" name="image" accept="image/*">
            @error('image') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Save Skill</button>
        <a href="{{ route('admin.skill.index') }}" class="btn" style="background: #95a5a6;">Cancel</a>
    </form>
</div>
@endsection
