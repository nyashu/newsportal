@extends('layouts.dashboard')

@section('content')
    <div class="container w-1/2 m-auto mb-4 bg-blue-100 p-5">
        <p class="strong font-bold text-black-500 text-center mb-2">Hello, <span class="text-orange-800">
                {{ Auth::user()->name }}</span></p>
                
        <p class="text-green-500 p-1 text-xl font-bold text-center underline">You've {{ auth()->user()->role }} access !!
        </p>
    </div>

      <div class="flex justify-between ">
          <div class="text-center bg-blue-700  font-bold text-2xl text-white p-12 rounded-2xl">
              <h3>Total Posts</h3>
              <div>
                {{ $count }}
            </div>
          </div>
          
    
      
        <div class="text-center  bg-blue-700 p-12  font-bold text-2xl rounded-3xl text-white">
            <h3 >Total Links</h3>
            <div>
                {{ $press }}
            </div>
        </div>

        <div class="text-center  bg-blue-700 p-12  font-bold text-2xl rounded-3xl text-white">
            <h3 >Total Users</h3>
            <div>
                {{ $user }}
            </div>
        </div>
       
       
   

      
       
    </div>
@endsection
