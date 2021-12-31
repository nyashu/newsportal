@extends('layouts.dashboard')
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
@section('content')
    <h1 class="text-center font-bold text-3xl underline mb-2">Edit Interviews</h1>
    <form method="post" action="{{ route('updateinterview', $data->id) }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
        enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
               Interview Title
            </label>
            <input name="title"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="title" type="text" placeholder="title" value="{{ $data->news_title }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="source">
                Source
            </label>
            <textarea name="source"
                class="
        form-control
        block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding
        border border-solid border-gray-300
        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
      "
                id="source" rows="3" placeholder="News body">{{ $data->source }}</textarea>
        </div>
        <div class="flex items-center justify-between">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
               Update
            </button>
        </div>
    </form>
@endsection