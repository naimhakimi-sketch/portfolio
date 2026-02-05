@extends('admin.layouts.app')

@section('title', 'Edit Skill')

@section('content')
<div class="header">
    <h1>Edit Skill</h1>
</div>

<div class="content">
    <form method="POST" action="{{ route('admin.skill.update', $skill) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group @error('name') error @enderror">
            <label for="name">Skill Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $skill->name) }}" placeholder="e.g., PHP, JavaScript, Laravel" required>
            @error('name') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group @error('level') error @enderror">
                <label for="level">Proficiency Level</label>
                <select id="level" name="level" required>
                    <option value="">Select Level</option>
                    <option value="Beginner" @selected(old('level', $skill->level) == 'Beginner')>Beginner</option>
                    <option value="Intermediate" @selected(old('level', $skill->level) == 'Intermediate')>Intermediate</option>
                    <option value="Advanced" @selected(old('level', $skill->level) == 'Advanced')>Advanced</option>
                    <option value="Expert" @selected(old('level', $skill->level) == 'Expert')>Expert</option>
                </select>
                @error('level') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group @error('category') error @enderror">
                <label for="category">Category</label>
                <input type="text" id="category" name="category" value="{{ old('category', $skill->category) }}" placeholder="e.g., Backend, Frontend, Database" required>
                @error('category') <div class="error-message">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group @error('image') error @enderror">
            <label for="image">Skill Icon/Logo</label>
            <input type="file" id="image" name="image" accept="image/*">
            @if($skill->image)
                <p style="margin-top: 0.5rem; color: #666;">
                    Current: <img src="{{ Storage::url($skill->image) }}" alt="Icon" style="max-width: 80px; max-height: 80px;">
                </p>
            @endif
            @error('image') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Update Skill</button>
        <a href="{{ route('admin.skill.index') }}" class="btn" style="background: #95a5a6;">Cancel</a>
    </form>
</div>
@endsection
