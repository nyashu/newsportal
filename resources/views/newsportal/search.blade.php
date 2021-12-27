@extends('layouts.app')
@section('content')
@if ($posts->isNotEmpty())
@foreach ($posts as $post)
    <div class="post-list">
        <div class="flex flex-col mx-auto hover:text-cyan-500 border-2 p-6">
            <p class="font-bold">{{ $post->title }}</p>
            <img src="{{ Storage::url($post->image) }}" alt="image" class="w-64 h-40">
            <p>{{ $post->description }}</p>
    </div>
    </div>
@endforeach
@else
<div>
    <h2>No posts found</h2>
</div>
@endif
@endsection