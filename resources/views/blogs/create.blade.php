@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background: #f7f9fc;
            padding: 30px;
        }

        .form-wrapper {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea,
        select,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .text-danger {
            color: #e3342f;
            font-size: 0.9em;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        button {
            background-color: #1772ff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #0e5ed2;
        }
    </style>

    <div class="form-wrapper">
        <h2>Create New Post</h2>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="title">Title</label>
                <input id="title" type="text" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="excerpt">Excerpt</label>
                <textarea id="excerpt" name="excerpt">{{ old('excerpt') }}</textarea>
                @error('excerpt')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="category_id">Category</label>
                <select id="category_id" name="category_id">
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- <div>
                <label for="tags">Tags</label>
                <select id="tags" name="tags[]" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}"
                            {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                @error('tags')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div> --}}

            <div>
                <label for="tags">Tags</label>
                <input name="tags" id="tags-input" placeholder="Add tags..." value="{{ old('tags') }}">
                @error('tags')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="featured_image">Featured Image</label>
                <input id="featured_image" type="file" name="featured_image" accept="image/*">
                @error('featured_image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Create Post</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const input = document.querySelector('#tags-input');

            const whitelist = {!! json_encode($tags) !!};

            const tagify = new Tagify(input, {
                whitelist: whitelist,
                dropdown: {
                    enabled: 1,
                    fuzzySearch: true,
                    position: 'text',
                    caseSensitive: false,
                }
            });
        });
    </script>
@endsection
