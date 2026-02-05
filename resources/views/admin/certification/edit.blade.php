@extends('admin.layouts.app')

@section('title', 'Edit Certification')

@section('content')
<div class="header">
    <h1>Edit Certification</h1>
</div>

<div class="content">
    <form method="POST" action="{{ route('admin.certification.update', $certification) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group @error('title') error @enderror">
            <label for="title">Certification Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $certification->title) }}" required>
            @error('title') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="form-group @error('issuing_organisation') error @enderror">
            <label for="issuing_organisation">Issuing Organization</label>
            <input type="text" id="issuing_organisation" name="issuing_organisation" value="{{ old('issuing_organisation', $certification->issuing_organisation) }}" required>
            @error('issuing_organisation') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="form-group @error('category') error @enderror">
            <label for="category">Category</label>
            <input type="text" id="category" name="category" value="{{ old('category', $certification->category) }}" placeholder="e.g., Programming, Design" required>
            @error('category') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group @error('issued') error @enderror">
                <label for="issued">Issued Date</label>
                <input type="text" id="issued" name="issued" value="{{ old('issued', $certification->issued) }}" placeholder="e.g., Jul 2024" required>
                @error('issued') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group @error('expires') error @enderror">
                <label for="expires">Expires (Optional)</label>
                <input type="text" id="expires" name="expires" value="{{ old('expires', $certification->expires) }}" placeholder="e.g., Sep 2027">
                @error('expires') <div class="error-message">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group @error('description') error @enderror">
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ old('description', $certification->description) }}</textarea>
            @error('description') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="form-group @error('logo') error @enderror">
            <label for="logo">Logo/Badge</label>
            <input type="file" id="logo" name="logo" accept="image/*">
            @if($certification->logo)
                <p style="margin-top: 0.5rem; color: #666;">
                    Current: <img src="{{ Storage::url($certification->logo) }}" alt="Logo" style="max-width: 100px; max-height: 100px;">
                </p>
            @endif
            @error('logo') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Update Certification</button>
        <a href="{{ route('admin.certification.index') }}" class="btn" style="background: #95a5a6;">Cancel</a>
    </form>
</div>
@endsection
