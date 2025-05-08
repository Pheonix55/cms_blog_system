@extends('layouts.app')

@section('content')
    <h1>Edit Post: {{ $post->title }}</h1>

    <!-- Update Post Form -->
    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Same fields as create.blade.php -->
        <button type="submit">Update Post</button>
    </form>

    <!-- Add Content Blocks -->
    <h2>Add Content</h2>
    <form action="{{ route('posts.content.store', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Content Type</label>
            <select name="type" id="contentType">
                <option value="text">Text</option>
                <option value="image">Image</option>
            </select>
        </div>
        <div id="textContent" style="display: block;">
            <label>Paragraph</label>
            <textarea name="content"></textarea>
        </div>
        <div id="imageContent" style="display: none;">
            <label>Image</label>
            <input type="file" name="content">
            <label>Caption</label>
            <input type="text" name="image_caption">
            <label>Alt Text</label>
            <input type="text" name="image_alt">
        </div>
        <button type="submit">Add Content</button>
    </form>

    <!-- Display Existing Content Blocks -->
    <h2>Post Content</h2>
    @foreach ($post->contents as $content)
        <div style="margin-bottom: 20px; border: 1px solid #ccc; padding: 10px;">
            @if ($content->type === 'text')
                <p>{{ $content->content }}</p>
            @else
                <img src="{{ asset('storage/' . $content->content) }}" width="300">
                <p><strong>Caption:</strong> {{ $content->image_caption }}</p>
            @endif
            <form action="{{ route('posts.content.destroy', $content) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach

    <script>
        document.getElementById('contentType').addEventListener('change', function() {
            document.getElementById('textContent').style.display = this.value === 'text' ? 'block' : 'none';
            document.getElementById('imageContent').style.display = this.value === 'image' ? 'block' : 'none';
        });
    </script>
@endsection
