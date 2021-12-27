@extends('layouts.app')

@section('content')
    <div class="mb-10 container mx-auto px-12">
        <h1 class="font-bold my-5 text-3xl px-3 text-cyan-500"><a href="{{ route('news', $head->id) }}">{{ $head->title }}</a></h1>
        <div class="flex ">
            <div class="image px-5">
                <img src="{{ Storage::url($head->image) }}" alt="image" class="w-64 h-40">
            </div>
            <p class="w-1/2 font-semibold ">{{ $head->description }}
            <br>
        </div>
    </div>
    <h1 class="text-center mb-2 font-bold text-2xl">News</h1>
    <hr class="h-4">
    <br>
<div class="container mx-auto">
    <div class="grid grid-cols-3 gap-y-3">
        @foreach ($result as $news)
        <div class="flex flex-col mx-auto hover:text-cyan-500 border-2 p-6">
            <a href="{{ route('news', $news->id) }}">
                <img src="{{ Storage::url($news->image) }}" alt="image" class="w-64 h-40">
                <p class="font-bold">{{ $news->title }}</p>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection
