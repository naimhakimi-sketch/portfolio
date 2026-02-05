@extends('admin.layouts.app')

@section('title', 'View Message')

@section('content')
<div class="header">
    <h1>Message from {{ $contact->name }}</h1>
    <div class="header-actions">
        <a href="{{ route('admin.contact.index') }}" class="btn">← Back to Messages</a>
    </div>
</div>

<div class="content" style="max-width: 800px;">
    <div style="background: #f8f9fa; padding: 2rem; border-radius: 8px;">
        <p style="margin-bottom: 1rem;">
            <strong>Name:</strong> {{ $contact->name }}
        </p>
        <p style="margin-bottom: 1rem;">
            <strong>Email:</strong> <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
        </p>
        <p style="margin-bottom: 1rem;">
            <strong>Phone:</strong> <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
        </p>
        <p style="margin-bottom: 1rem;">
            <strong>Sent:</strong> {{ $contact->created_at->format('M d, Y \a\t h:i A') }}
        </p>
        <hr style="margin: 2rem 0;">
        <h3 style="margin-bottom: 1rem;">Message:</h3>
        <p style="white-space: pre-wrap; line-height: 1.8;">{{ $contact->message }}</p>
    </div>

    <div style="margin-top: 2rem; display: flex; gap: 1rem;">
        <a href="mailto:{{ $contact->email }}?subject=Re: Your Portfolio Message" class="btn btn-success">Reply via Email</a>
        <form action="{{ route('admin.contact.destroy', $contact) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete Message</button>
        </form>
    </div>
</div>
@endsection
