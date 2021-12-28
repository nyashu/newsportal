@extends('layouts.dashboard')

@section('content')
    <div class="mb-5 center">
        <a href="{{ route('change_name',Auth::user()->id) }}" class="p-2.5 font-bold border-2 mb-4 rounded-md border-blue-500 hover:bg-blue-500 hover:text-white">Change Name</a>
        <a href="{{ route('change_password') }}" class="p-2.5 font-bold border-2 mb-1 rounded-md border-blue-500 hover:bg-blue-500 hover:text-white">Change Password</a>
        <a href="{{ route('change_profile',Auth::user()->id) }}" class="p-2.5 font-bold border-2 mb-1 rounded-md border-blue-500 hover:bg-blue-500 hover:text-white">Change Profile Pic</a>
    </div>

    @if ($errors->any())
        <div class="bg-green-100 border-l-4 border-orange-500 text-green-700 p-4 mt-5" >
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="bg-green-100 border-l-4 border-orange-500 text-green-700 p-4 mt-5" role="alert">
            <p>{{ session()->get('success') }}</p>
        </div>
    @endif

    <form method="post" action="{{ route('update_password',Auth::user()->id) }}">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="oldpassword">
                Old Password
            </label>
            <input type="password" name="old_password"
            class="
    form-control
    block
    w-2/4
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
    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" rows="3">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="newpassword">
                New Password
            </label>
            <input type="password" name="new_password"
            class="
    form-control
    block
    w-2/4
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
    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" rows="3">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="confirmpassword">
                Confirm Password
            </label>
            <input type="password" name="confirm_password"
            class="
    form-control
    block
    w-2/4
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
    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" rows="3">
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