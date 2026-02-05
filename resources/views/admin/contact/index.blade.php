@extends('admin.layouts.app')

@section('title', 'Contact Messages')

@section('content')
<div class="header">
    <h1>Contact Messages</h1>
</div>

<div class="content">
    @if($contacts->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->created_at->format('M d, Y') }}</td>
                    <td>
                        <a href="{{ route('admin.contact.show', $contact) }}" class="btn" style="padding: 0.5rem 1rem; font-size: 0.9rem;">View</a>
                        <form action="{{ route('admin.contact.destroy', $contact) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="padding: 0.5rem 1rem; font-size: 0.9rem;" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div style="margin-top: 2rem;">
            {{ $contacts->links() }}
        </div>
    @else
        <p>No contact messages yet.</p>
    @endif
</div>
@endsection
