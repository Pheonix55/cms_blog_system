@extends('layouts.general')

@section('content')
    <div class="container">
        <h1>Category Details</h1>

        <div class="mb-3">
            <strong>ID:</strong> {{ $category->id }}
        </div>
        <div class="mb-3">
            <strong>Name:</strong> {{ $category->name }}
        </div>

        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
