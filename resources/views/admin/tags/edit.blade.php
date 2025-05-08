@extends('layouts.general')

@section('content')
    <div class="container">
        <h1>Edit Tag</h1>

        <form action="{{ route('tags.update', $tag) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Tag Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $tag->name) }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" class="form-control">
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $tag->category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('tags.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
