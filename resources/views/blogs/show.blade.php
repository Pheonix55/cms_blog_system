@extends('layouts.app')

@section('content')
    <article>
        <h1>{{ $post->title }}</h1>
        <img src="{{ asset('storage/' . $post->featured_image) }}" width="500">
        <p>{{ $post->excerpt }}</p>

        <div class="paragraph">{{ $post->description }}</div>

    </article>
@endsection
