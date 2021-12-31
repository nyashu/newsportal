@extends('layouts.app')
@section('content')
<div class="grid grid-cols-2 md:grid-cols-2 gap-8">
    <div class="w-8/12 m-auto">
        <div class=" w-6/12 m-auto text-center">
           <h1 class="bg-emerald-400 mb-3 rounded-xl font-bold text-2xl">
              Interviews
            </h1>
       </div>
       @foreach($press as $pressnews)
        <div class="m-auto  bg-emerald-400 border mb-4 rounded-xl text-center">
            <h1 class="text-2xl font-bold my-5">{{ $pressnews->news_title }}</h1>
            <iframe class=" w-11/12 m-auto mb-4  h-80 " src="{{ $pressnews->source }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>  
        @endforeach  
       </div>
       <div>
         <div class=" w-4/12 m-auto text-center">
            <h1 class="bg-emerald-400 rounded-xl font-bold text-2xl mb-4">Photo Gallery</h1>
        </div>
        @foreach ($image as $news)
        <div class="flex flex-col mx-auto hover:text-cyan-500 border-2 p-6">
            {{-- <a href="{{ route('interview', $news->id) }}"> --}}
                <img src="{{ Storage::url($news->image) }}" alt="image" class="w-64 h-40">
                {{-- <p class="font-bold">{{ $news->title }}</p> --}}
            {{-- </a> --}}
        </div>
        @endforeach
       </div>
  </div>
@endsection