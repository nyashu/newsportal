<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-slate-100">
    <nav class="p-4 bg-slate-100 flex justify-between mb-1">
        <div class="flex items-center flex-shrink-0 text-blue-800 mr-auto">
            <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z" />
            </svg>
            <span class="font-bold text-xl tracking-tight">Blog Site</span>
        </div>
        <ul class="flex items-center font-bold text-lg">
            <li>
                <a href="/" class="m-3 hover:text-cyan-500">Home</a>
            </li>
            <li>
                <a href="" class="m-3 hover:text-cyan-500">News</a>
            </li>
            <li>
                <a href="" class="m-3 hover:text-cyan-500">About Us</a>
            </li>
            <li>
                <a href="{{ route('contact') }}" class="m-3 hover:text-cyan-500">Contact Us</a>
            </li>
        </ul>
    </nav>

    <!-- For Middle contents -->
    @yield('content')

    <!-- Footer Start-->
    <footer class="text-lg bg-slate-100 text-center inset-x-0 bottom-0 p-2">
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2021 Copyright:
            <a href=""> Blog Site</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer End-->

</body>
</html>