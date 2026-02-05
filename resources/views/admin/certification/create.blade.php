@extends('admin.layouts.app')

@section('title', 'Add Certification')

@section('content')
<div class="header">
    <h1>Add New Certification</h1>
</div>

<div class="content">
    <form method="POST" action="{{ route('admin.certification.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group @error('title') error @enderror">
            <label for="title">Certification Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            @error('title') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="form-group @error('issuing_organisation') error @enderror">
            <label for="issuing_organisation">Issuing Organization</label>
            <input type="text" id="issuing_organisation" name="issuing_organisation" value="{{ old('issuing_organisation') }}" required>
            @error('issuing_organisation') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="form-group @error('category') error @enderror">
            <label for="category">Category</label>
            <input type="text" id="category" name="category" value="{{ old('category') }}" placeholder="e.g., Programming, Design" required>
            @error('category') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group @error('issued') error @enderror">
                <label for="issued">Issued Date</label>
                <input type="text" id="issued" name="issued" value="{{ old('issued') }}" placeholder="e.g., Jul 2024" required>
                @error('issued') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group @error('expires') error @enderror">
                <label for="expires">Expires (Optional)</label>
                <input type="text" id="expires" name="expires" value="{{ old('expires') }}" placeholder="e.g., Sep 2027">
                @error('expires') <div class="error-message">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group @error('description') error @enderror">
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ old('description') }}</textarea>
            @error('description') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <div class="form-group @error('logo') error @enderror">
            <label for="logo">Logo/Badge</label>
            <input type="file" id="logo" name="logo" accept="image/*">
            @error('logo') <div class="error-message">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Save Certification</button>
        <a href="{{ route('admin.certification.index') }}" class="btn" style="background: #95a5a6;">Cancel</a>
    </form>
</div>
@endsection
