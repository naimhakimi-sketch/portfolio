@extends('admin.layouts.app')

@section('title', 'Manage Work Experience')

@section('content')
<div class="header">
    <h1>Work Experience</h1>
    <div class="header-actions">
        <a href="{{ route('admin.work.create') }}" class="btn btn-success">+ Add Work</a>
    </div>
</div>

<div class="content">
    @if($works->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Position</th>
                    <th>Company</th>
                    <th>Years</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($works as $work)
                <tr>
                    <td>{{ $work->position }}</td>
                    <td>{{ $work->company }}</td>
                    <td>{{ $work->year_start }} - {{ $work->year_end }}</td>
                    <td>
                        <a href="{{ route('admin.work.edit', $work) }}" class="btn" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Edit</a>
                        <form action="{{ route('admin.work.destroy', $work) }}" method="POST" style="display: inline;">
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
        <p>No work experience records. <a href="{{ route('admin.work.create') }}">Add one now</a></p>
    @endif
</div>
@endsection
