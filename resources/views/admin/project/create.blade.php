@extends('admin.layouts.app')

@section('title', 'Add Project')

@section('content')
<div class="header">
    <h1>Add New Project</h1>
</div>

<div class="content">
    <form method="POST" action="{{ route('admin.project.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group @error('title') error @enderror">
            <label for="title">Project Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            @error('title') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="form-group @error('short_description') error @enderror">
            <label for="short_description">Short Description</label>
            <textarea id="short_description" name="short_description" style="min-height: 80px;" required>{{ old('short_description') }}</textarea>
            @error('short_description') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="form-group @error('full_description') error @enderror">
            <label for="full_description">Full Description</label>
            <textarea id="full_description" name="full_description" required>{{ old('full_description') }}</textarea>
            @error('full_description') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group @error('project_type') error @enderror">
                <label for="project_type">Project Type</label>
                <input type="text" id="project_type" name="project_type" value="{{ old('project_type') }}" placeholder="e.g., Web App, Mobile App" required>
                @error('project_type') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group @error('status') error @enderror">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="">Select Status</option>
                    <option value="completed">Completed</option>
                    <option value="in progress">In Progress</option>
                    <option value="planned">Planned</option>
                </select>
                @error('status') <div class="error-message">{{ $message }}</div> @enderror
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group @error('start_date') error @enderror">
                <label for="start_date">Start Date</label>
                <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                @error('start_date') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group @error('end_date') error @enderror">
                <label for="end_date">End Date (Optional)</label>
                <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}">
                @error('end_date') <div class="error-message">{{ $message }}</div> @enderror
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group @error('live_url') error @enderror">
                <label for="live_url">Live URL (Optional)</label>
                <input type="url" id="live_url" name="live_url" value="{{ old('live_url') }}" placeholder="https://...">
                @error('live_url') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group @error('github_url') error @enderror">
                <label for="github_url">GitHub URL (Optional)</label>
                <input type="url" id="github_url" name="github_url" value="{{ old('github_url') }}" placeholder="https://github.com/...">
                @error('github_url') <div class="error-message">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group @error('image') error @enderror">
            <label for="image">Project Image</label>
            <input type="file" id="image" name="image" accept="image/*">
            @error('image') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Technologies Used (Tech Stack)</label>
            <div id="tech-stack-container">
                <div class="tech-input" style="display: flex; gap: 0.5rem; margin-bottom: 0.5rem;">
                    <input type="text" name="tech_stack[]" placeholder="e.g., PHP, Laravel" style="flex: 1; padding: 0.75rem; border: 1px solid #bdc3c7; border-radius: 5px;">
                    <button type="button" class="btn btn-danger" onclick="removeTechInput(this)" style="padding: 0.75rem 1rem;">Remove</button>
                </div>
            </div>
            <button type="button" class="add-tech-btn" onclick="addTechInput()">+ Add Technology</button>
        </div>

        <button type="submit" class="btn btn-success">Save Project</button>
        <a href="{{ route('admin.project.index') }}" class="btn" style="background: #95a5a6;">Cancel</a>
    </form>
</div>

<script>
function addTechInput() {
    const container = document.getElementById('tech-stack-container');
    const newInput = document.createElement('div');
    newInput.className = 'tech-input';
    newInput.style.display = 'flex';
    newInput.style.gap = '0.5rem';
    newInput.style.marginBottom = '0.5rem';
    newInput.innerHTML = `
        <input type="text" name="tech_stack[]" placeholder="e.g., PHP, Laravel" style="flex: 1; padding: 0.75rem; border: 1px solid #bdc3c7; border-radius: 5px;">
        <button type="button" class="btn btn-danger" onclick="removeTechInput(this)" style="padding: 0.75rem 1rem;">Remove</button>
    `;
    container.appendChild(newInput);
}

function removeTechInput(button) {
    button.parentElement.remove();
}
</script>
@endsection
