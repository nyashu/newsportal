@extends('layouts.app')

@section('content')
    <div class="mx-8">
        <div class="mb-10">
            <h1 class="font-bold my-5 text-2xl ml-4"><a href="#">Tell us what you
                    think!</a></h1>
            <div class="flex">
                <div class="w-full md:w-96 md:max-w-full ml-4">
                    <div class="p-6 border border-blue-500 sm:rounded-md">
                        <form method="post" action="/contactus">
                            @csrf
                            <label class="block mb-6">
                                <span class="text-black-900">Your name</span>
                                <input type="text" name="name"
                                    class="
                          block
                          w-full
                          mt-1
                          border-blue-500
                          rounded-md
                          shadow-sm
                          focus:border-indigo-300
                          focus:ring
                          focus:ring-indigo-200
                          focus:ring-opacity-50
                        "
                                    placeholder="Ram Bahadur"/>
                            </label>
                            <label class="block mb-6">
                                <span class="text-black-900">Email address</span>
                                <input name="email" type="email"
                                    class="
                          block
                          w-full
                          mt-1
                          border-blue-800
                          rounded-md
                          shadow-sm
                          focus:border-indigo-300
                          focus:ring
                          focus:ring-indigo-200
                          focus:ring-opacity-50
                        "
                                    placeholder="ram@gmail.com" required />
                            </label>
                            <label class="block mb-6">
                                <span class="text-black-900">Message</span>
                                <textarea name="message"
                                    class="
                          block
                          w-full
                          mt-1
                          border-blue-500
                          rounded-md
                          shadow-sm
                          focus:border-indigo-300
                          focus:ring
                          focus:ring-indigo-200
                          focus:ring-opacity-50
                        "
                                    rows="5" placeholder="Tell us what you're thinking about..."></textarea>
                            </label>
                            <div class="mb-6">
                                <button type="submit"
                                    class="
                          h-10
                          px-5
                          text-indigo-100
                          bg-indigo-700
                          rounded-lg
                          transition-colors
                          duration-150
                          focus:shadow-outline
                          hover:bg-indigo-800
                        ">
                                    Contact Us
                                </button>
                            </div>
                            <div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="mx-20 w-8/12 border 
                rounded-md
                shadow-sm">
                    <div>
                        <h1 class="font-bold   text-3xl ml-3">About us</h1>
                        <div class="flex">
                            @foreach ($aboutus as $about)
                            <div class="w-1/3 mr-5 ">
                               
                                    
                                

                                <p class="font-bold text-xl ml-3  mt-3">Who we are.</p>
                                <div class="ml-3 py-3 text-blue-700" >
                                        {{ $about->whoweare}}
  
                               
                                   
                                </div>

                            </div>
                            <div class="w-1/3 ml-5">


                                <p class="font-bold  text-xl mt-3">Office Location</p>
                                <div class="py-3 text-blue-700">
                                    {{ $about->officelocation}}
                                </div>

                            </div>
                            <div class="w-1/3 ml-5">
                                <p class="font-bold text-xl mt-3">Contact Details</p>
                                <div class="py-3 text-blue-700">
                                    {{ $about->contactus}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>

@endsection
