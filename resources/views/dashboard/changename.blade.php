@extends('layouts.dashboard')

@section('content')
    <div class="mb-5 center">
        <a href="{{ route('change_name',Auth::user()->id) }}" class="p-2.5 font-bold border-2 mb-4 rounded-md border-blue-500 hover:bg-blue-500 hover:text-white">Change Name</a>
        <a href="{{ route('change_password') }}" class="p-2.5 font-bold border-2 mb-1 rounded-md border-blue-500 hover:bg-blue-500 hover:text-white">Change Password</a>
        <a href="{{ route('change_profile',Auth::user()->id) }}" class="p-2.5 font-bold border-2 mb-1 rounded-md border-blue-500 hover:bg-blue-500 hover:text-white">Change Profile Pic</a>
    </div>
    
    <form method="post" action="{{ route('update_name',Auth::user()->id) }}">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Name</label>
            <input type="text" name="name" class="form-control block w-2/4 px-3 py-1.5 text-bas font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                id="whoweare" rows="3" value="{{ $name->name }}">
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