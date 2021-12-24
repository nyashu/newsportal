@extends('layouts.dashboard')

@section('content')


<div class="container flex justify-center mx-auto">
    <div class="flex flex-col">
        <div class="w-full>
            <div class="border-b border-gray-200 shadow">
                <table class="divide-y divide-blue-600 ">
                    <thead class="bg-blue-300">
                        <tr>
                            
                            <th class="px-6 py-2 text-lg text-blue-800">
                                Name
                            </th>
                            <th class="px-6 py-2 text-lg text-blue-800">
                                Email
                            </th>
                            <th class="px-6 py-2 text-lg text-blue-800">
                                Message
                            </th>
                            <th class="px-6 py-2 text-lg text-blue-800">
                                Created_at
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-300">
                        @foreach ($contactus as $contact)
                        <tr class="whitespace-nowrap">
                          
                               
                          
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $contact->name }}
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500">
                                    {{ $contact->email }}
                                </div>
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $contact->message }}
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $contact->created_at }}

                            </td>
                          
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

   
@endsection