@extends('layouts.app')
@section('content')
    <p class="text-bold mb-4 text-3xl mx-20 w-8/12 border rounded-md  shadow-sm">
        {{ $data->title }}
    </p>
    <div class="mx-20 mb-4 flex w-52 items-center"><span class="p-1">By </span>
        {{ $data->user->name }}
    </div>
    <div class="m-auto mb-4 mx-20 w-8/12 border rounded-md shadow-sm">
        <img src="{{ Storage::url($data->image) }}" alt="image" title="" class="w-full">
    </div>
    <div class="m-auto text-xl text-black mx-20 w-8/12 border rounded-md shadow-sm">
        {{ $data->description }}
    </div>
@endsection
