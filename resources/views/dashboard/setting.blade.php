@extends('layouts.dashboard')

@section('content')
    <a href="{{ route('change_name',Auth::user()->id) }}" class="p-2.5 font-bold border-2 mb-4 rounded-md border-blue-500 hover:bg-blue-500 hover:text-white">Change Name</a>
    <a href="{{ route('change_password') }}" class="p-2.5 font-bold border-2 mb-1 rounded-md border-blue-500 hover:bg-blue-500 hover:text-white">Change Password</a>
    <a href="{{ route('change_profile',Auth::user()->id) }}" class="p-2.5 font-bold border-2 mb-1 rounded-md border-blue-500 hover:bg-blue-500 hover:text-white">Change Profile Pic</a>

    @if (session()->has('success'))
        <div class="bg-green-100 border-l-4 border-orange-500 text-green-700 p-4 mt-5" role="alert">
            <p>{{ session()->get('success') }}</p>
        </div>
    @endif
@endsection