@extends('layouts.general')

@section('content')
    <div class="container">
        <h1>Tags</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('tags.create') }}" class="btn btn-primary mb-3">Create Tag</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>User ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ @$tag->category->name }}</td>
                        <td>{{ @$tag->user->name }}</td>
                        <td>
                            <a href="{{ route('tags.show', $tag) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('tags.edit', $tag) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tags.destroy', $tag) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')"
                                    class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
