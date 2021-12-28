@extends('layouts.dashboard')

@section('content')
    <div class="mb-5 center">
        <a href="{{ route('change_name',Auth::user()->id) }}" class="p-2.5 font-bold border-2 mb-4 rounded-md border-blue-500 hover:bg-blue-500 hover:text-white">Change Name</a>
        <a href="{{ route('change_password') }}" class="p-2.5 font-bold border-2 mb-1 rounded-md border-blue-500 hover:bg-blue-500 hover:text-white">Change Password</a>
        <a href="{{ route('change_profile',Auth::user()->id) }}" class="p-2.5 font-bold border-2 mb-1 rounded-md border-blue-500 hover:bg-blue-500 hover:text-white">Change Profile Pic</a>
    </div>

    @if ($errors->any())
        <div class="bg-green-100 border-l-4 border-orange-500 text-green-700 p-4 my-5" >
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="post" action="{{ route('update_profile',Auth::user()->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                Upload image
            </label>
            <div class="flex">
                <input name="profile"
                    class="shadow appearance-none border rounded py-2 px-3  text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="image" type="file">
                <img src="{{ Storage::url($pic->profile_pic) }}" alt="image" title="" class="w-64 h-32">
            </div>
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