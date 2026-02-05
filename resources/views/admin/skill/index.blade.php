@extends('admin.layouts.app')

@section('title', 'Manage Skills')

@section('content')
<div class="header">
    <h1>Skills</h1>
    <div class="header-actions">
        <a href="{{ route('admin.skill.create') }}" class="btn btn-success">+ Add Skill</a>
    </div>
</div>

<div class="content">
    @if($skills->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Skill Name</th>
                    <th>Level</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($skills as $skill)
                <tr>
                    <td>{{ $skill->name }}</td>
                    <td>{{ $skill->level }}</td>
                    <td>{{ $skill->category }}</td>
                    <td>
                        <a href="{{ route('admin.skill.edit', $skill) }}" class="btn" style="padding: 0.5rem 1rem; font-size: 0.9rem;">Edit</a>
                        <form action="{{ route('admin.skill.destroy', $skill) }}" method="POST" style="display: inline;">
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
        <p>No skills. <a href="{{ route('admin.skill.create') }}">Add one now</a></p>
    @endif
</div>
@endsection
