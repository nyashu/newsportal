@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-2 md:grid-cols-2 gap-8">
        <div class="w-8/12 m-auto">
            <div class="text-center">
                <h1 class="bg-emerald-400 mb-3 rounded-xl font-bold text-2xl p-2">
                    Interviews
                </h1>
            </div>
            @foreach ($press as $pressnews)
                <div class="bg-gray-200 border mb-4 rounded-xl text-center">
                    <h1 class="text-2xl font-bold my-5">{{ $pressnews->news_title }}</h1>
                    <iframe class=" w-11/12 m-auto mb-4  h-80 " src="{{ $pressnews->source }}" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            @endforeach
        </div>
        <div>
            <div class="text-center">
                <h1 class="bg-emerald-400 rounded-xl font-bold text-2xl mb-4 p-2">Photo Gallery</h1>
            </div>

            <div class="grid grid-cols-3 hover:text-cyan-500 p-2 gap-2">
                @foreach ($image as $news)
                    {{-- <a href="{{ route('interview', $news->id) }}"> --}}
                    <div>
                        <img src="{{ Storage::url($news->image) }}" alt="image" class="w-64 h-40">
                    </div>
                    {{-- <p class="font-bold">{{ $news->title }}</p> --}}
                    {{-- </a> --}}
                @endforeach
            </div>

        </div>
    </div>
@endsection
