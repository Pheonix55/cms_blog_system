@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="mb-0">Blog Posts</h1>
                    @auth
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> New Post
                        </a>
                    @endauth
                </div>

                <!-- Search Form -->
                {{-- <form action="{{ route('posts.index') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search posts..."
                            value="{{ request('search') }}">
                        <button type="submit" class="btn btn-outline-secondary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form> --}}
                <form id="search-form" class="mb-4">
                    <div class="input-group">
                        <input type="text" name="search" id="search-input" class="form-control"
                            placeholder="Search posts...">
                        <button type="submit" class="btn btn-outline-secondary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

                <div id="search-results" class="mt-4"></div>



                @forelse ($posts as $post)
                    <div class="card mb-4">
                        @if ($post->featured_image)
                            <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img-top"
                                alt="{{ $post->title }}">
                        @endif
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h2 class="card-title h4 mb-0">
                                    <a href="{{ route('posts.show', $post) }}" class="text-decoration-none">
                                        {{ $post->title }}
                                    </a>
                                </h2>
                                @if ($post->user_id === auth()->id())
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('posts.edit', $post) }}">
                                                    <i class="fas fa-edit me-1"></i> Edit
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger"
                                                        onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash me-1"></i> Delete
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            <div class="d-flex align-items-center text-muted small mb-3">
                                <div class="me-3">
                                    <i class="fas fa-user me-1"></i>
                                    {{ @$post->user->name }}
                                </div>
                                <div class="me-3">
                                    <i class="fas fa-calendar-alt me-1"></i>
                                    @if ($post->published_at == null)
                                        ---
                                    @else
                                        {{ $post->published_at->format('M d, Y') }}
                                    @endif
                                </div>
                                <div>
                                    <i class="fas fa-clock me-1"></i>
                                    {{ $post->getReadingTime() }}
                                </div>
                            </div>

                            <p class="card-text">{{ Str::limit($post->excerpt, 200) }}</p>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-outline-primary">
                                    Read More <i class="fas fa-arrow-right ms-1"></i>
                                </a>

                                <div class="text-muted small">
                                    @if ($post->category)
                                        <span class="badge bg-secondary me-2">
                                            {{ @$post->category->name }}
                                        </span>
                                    @endif

                                    @foreach (collect(json_decode($post->tags))->take(3) as $tag)
                                        <span class="badge bg-light text-dark me-1">
                                            #{{ $tag }}
                                        </span>
                                    @endforeach
                                    {{ $tag_count = collect($post->tags)->count() }}
                                    @if ($tag_count > 3)
                                        <span class="badge bg-light text-dark">+{{ $tag_count - 3 }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">
                        No posts found.
                        @auth
                            <a href="{{ route('posts.create') }}">Create your first post!</a>
                        @endauth
                    </div>
                @endforelse

                <!-- Pagination -->
                {{ $posts->links() }}
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Categories</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            @foreach ($categories as $category)
                                <li class="mb-2">
                                    <a href="{{ route('categories.show', $category) }}" class="text-decoration-none">
                                        {{ $category->name }}
                                        <span class="badge bg-primary rounded-pill float-end">
                                            {{ $category->posts_count }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Popular Tags</h5>
                    </div>
                    <div class="card-body">
                        @if ($popularTags != null)
                            @foreach ($popularTags as $tag)
                                <a href="{{ route('tags.show', $tag) }}"
                                    class="btn btn-sm btn-outline-secondary mb-2 me-1">
                                    #{{ $tag->name }}
                                    <span class="badge bg-dark ms-1">{{ $tag->posts_count }}</span>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#search-form').on('submit', function(e) {
            e.preventDefault();

            let query = $('#search-input').val();

            $.ajax({
                url: "{{ route('search_blogs_title') }}",
                method: 'GET',
                data: {
                    search: query
                },
                success: function(data) {
                    let output = '';

                    if (data.length > 0) {
                        data.forEach(post => {
                            output += `<div class="card mb-2">
                                <div class="card-body">
                                    <h5>${post.title}</h5>
                                    <p>${post.excerpt ?? ''}</p>
                                </div>
                            </div>`;
                        });
                    } else {
                        output = '<p>No posts found.</p>';
                    }

                    $('#search-results').html(output);
                },
                error: function() {
                    $('#search-results').html('<p>Something went wrong.</p>');
                }
            });
        });
    </script>
@endsection
