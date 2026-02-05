@extends('admin.layouts.app')

@section('title', 'Manage Certifications')

@section('content')
<div class="header">
    <h1>Certifications & Achievements</h1>
    <div class="header-actions">
        <a href="{{ route('admin.certification.create') }}" class="btn btn-success">+ Add Certification</a>
    </div>
</div>

<div class="content">
    @if($certifications->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Organization</th>
                    <th>Issued</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($certifications as $cert)
                <tr>
                    <td>{{ $cert->title }}</td>
                    <td>{{ $cert->issuing_organisation }}</td>
                    <td>{{ $cert->issued }}</td>
                    <td>
                        <a href="{{ route('admin.certification.edit', $cert) }}" class="btn" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Edit</a>
                        <form action="{{ route('admin.certification.destroy', $cert) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="padding: 0.5rem 1rem; font-size: 0.9rem;" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No certifications. <a href="{{ route('admin.certification.create') }}">Add one now</a></p>
    @endif
</div>
@endsection
