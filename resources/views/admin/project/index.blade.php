@extends('admin.layouts.app')

@section('title', 'Manage Projects')

@section('content')
<div class="header">
    <h1>Projects</h1>
    <div class="header-actions">
        <a href="{{ route('admin.project.create') }}" class="btn btn-success">+ Add Project</a>
    </div>
</div>

<div class="content">
    @if($projects->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Dates</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->project_type }}</td>
                    <td>{{ ucfirst($project->status) }}</td>
                    <td>{{ $project->start_date }} to {{ $project->end_date ?? 'Present' }}</td>
                    <td>
                        <a href="{{ route('admin.project.edit', $project) }}" class="btn" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Edit</a>
                        <form action="{{ route('admin.project.destroy', $project) }}" method="POST" style="display: inline;">
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
        <p>No projects. <a href="{{ route('admin.project.create') }}">Add one now</a></p>
    @endif
</div>
@endsection
