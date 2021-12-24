<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Dashboard</title>
</head>

<body>
    <nav class="p-4 bg-slate-100 flex justify-between mb-1">
        <div class="flex items-center flex-shrink-0 text-blue-800 mr-auto">
            <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z" />
            </svg>
            <span class="font-bold text-xl tracking-tight">Blog Site</span>
        </div>
        <div class="flex items-center">
            <span class="text-green-800 font-bold px-4">{{ Auth::user()->name }} </span>
            <button class="rounded-sm border-blue-500 text-gray-600 border-2 px-2 mx-3 ">
                <a href="/" target="_blank">View site</a>
            </button>
            {{-- <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="rounded-sm border-blue-500 text-gray-600 border-2 px-2 ">
                    Logout <i class="far fa-edit"></i></a>
                </button>
            </form> --}}
        </div>
    </nav>

    <!-- Dashboard section  -->
    <div class="container-fluid flex">
        <div class="bg-blue-500 w-72 p-10">
            <p class="text-center mb-1 font-bold text-3xl underline text-white p-6">Dashboard</p>
            <nav>
                <ul class="text-center text-blue-100">
                    <li class="p-3 mb-1 font-bold border-2 rounded-lg"><a href="{{ route('index') }}">Overview</a>
                    </li>
                    <li class="p-3 mb-1 font-bold border-2 rounded-lg"><a href="{{ route('addpost') }}">Add post</a>
                    </li>
                    <li class="p-3 mb-1 font-bold border-2 rounded-lg"><a href="{{ route('viewpost') }}">All posts</a>
                    </li>
                    <li class="p-3 mb-1 font-bold border-2 rounded-lg"><a href="">Stats</a></li>
                    <li class="p-3 mb-1 font-bold border-2 rounded-lg"><a href="{{ route('dash') }}">Contact us</a></li>
                    <li class="p-3 mb-1 font-bold border-2 rounded-lg"><a href="{{ route('about') }}">About us</a></li>
                    <li class="p-3 mb-1 font-bold border-2 rounded-lg"><a href="">Settings</a></li>


                </ul>
            </nav>
        </div>
        <div class="flex-1 p-10">
            @yield('content')
        </div>
    </div>

</body>

</html>
