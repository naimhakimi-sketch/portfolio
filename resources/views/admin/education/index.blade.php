@extends('admin.layouts.app')

@section('title', 'Manage Education')

@section('content')
<div class="header">
    <h1>Education</h1>
    <div class="header-actions">
        <a href="{{ route('admin.education.create') }}" class="btn btn-success">+ Add Education</a>
    </div>
</div>

<div class="content">
    @if($educations->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Institution</th>
                    <th>Years</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($educations as $education)
                <tr>
                    <td>{{ $education->title }}</td>
                    <td>{{ $education->institution }}</td>
                    <td>{{ $education->year_start }} - {{ $education->year_end }}</td>
                    <td>
                        <a href="{{ route('admin.education.edit', $education) }}" class="btn" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Edit</a>
                        <form action="{{ route('admin.education.destroy', $education) }}" method="POST" style="display: inline;">
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
        <p>No education records. <a href="{{ route('admin.education.create') }}">Add one now</a></p>
    @endif
</div>
@endsection
