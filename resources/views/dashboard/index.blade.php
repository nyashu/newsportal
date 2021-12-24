@extends('layouts.dashboard')

@section('content')
    <div class="container mx-auto bg-green-100 p-5">
        <p class="strong font-bold text-black-500 text-center mb-4">Hello, <span class="text-orange-800">
                {{ Auth::user()->name }}</span></p>

                <p class="p-3 text-purple-700 font-semibold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit quia blanditiis nihil, aut laudantium quibusdam ipsum iste corrupti dolore dolorum? Architecto similique facere corporis sed blanditiis nisi, non animi iste.
                    <br>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi praesentium, quod quo doloremque maiores velit voluptas temporibus ab voluptatem eaque earum a, aperiam quas sit aspernatur totam! Consectetur, molestiae dicta.
                </p>
    </div>
@endsection
