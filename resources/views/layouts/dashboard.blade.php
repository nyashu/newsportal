

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
    <nav class="p-4 bg-blue-100 flex justify-between items-center">
        <div class="flex items-center flex-shrink-0 text-blue-800 mr-auto">
            <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z" />
            </svg>
            <span class="font-bold text-xl tracking-tight">Project X</span>
        </div>
        <div class="flex items-center">
            <img src="{{ Storage::url(auth()->user()->profile_pic) }}" alt="" class="w-10 h-8 rounded-full">
            <span class="text-blue-800 text-xl font-bold px-6">{{ Auth::user()->name }} </span>
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <a href="/" target="_blank">View Site</a>
            </button>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                   Logout
                </button>
            </form>
        </div>
    </nav>
    <!-- Dashboard section  -->
    <div class="container-fluid flex">
        <div class="bg-blue-800 w-50 p-10">
            <p class="text-center mb-1 font-bold text-3xl text-white p-6">Dashboard</p>
            <nav>
                <ul class="text-center text-blue-100">
                    <li class="p-3 mb-2 font-bold border-2 rounded-2xl"><a href="{{ route('index') }}">Overview</a>
                    </li>
                    
                    <li class="p-3 mb-2 font-bold border-2 rounded-2xl"><a href="{{ route('viewpost') }}">All posts</a>
                    </li>
                    @can('isAdmin')
                    <li class="p-3 mb-2 font-bold border-2 rounded-lg"><a href="{{ route('role') }}">Manage Roles</a></li>
                    <li class="p-3 mb-2 font-bold border-2 rounded-lg"><a href="{{ route('dash') }}">Enquires</a>
                    </li>
                    <li class="p-3 mb-2 font-bold border-2 rounded-lg"><a href="{{ route('about') }}">About us</a>
                    </li>
                    <li class="p-3 mb-2 font-bold border-2 rounded-lg"><a href="{{ route('gallery') }}">Gallery</a>
                    </li>
                    <li class="p-3 mb-2 font-bold border-2 rounded-2xl"><a href="{{ route('interview') }}">All Press links</a></li>
                  
                    @endcan
                 
                    <li class="p-3 mb-2 font-bold border-2 rounded-2xl"><a href="{{ route('setting') }}">Settings</a></li>
            
                </ul>
            </nav>
        </div>
        <div class="flex-1 p-10">
            @yield('content')
        </div>
    </div>
    <script>
        function myFunction() {
            if(!confirm("Are you sure ?"))
            event.preventDefault();
        }
       </script>
</body>
</html>