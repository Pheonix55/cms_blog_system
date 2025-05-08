@extends('layouts.general')

@section('content')
    <div class="container">
        <h1>Tag Details</h1>

        <div class="mb-3">
            <strong>ID:</strong> {{ $tag->id }}
        </div>
        <div class="mb-3">
            <strong>Name:</strong> {{ $tag->name }}
        </div>
        <div class="mb-3">
            <strong>User ID:</strong> {{ $tag->user_id }}
        </div>

        <a href="{{ route('tags.edit', $tag) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('tags.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
