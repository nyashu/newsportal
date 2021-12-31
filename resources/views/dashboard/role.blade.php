@extends('layouts.dashboard')

@section('content')
    <div class="container flex justify-center mx-auto">
        <div class="flex flex-col">
            <div class="w-full">
            <div class=" border-b border-gray-200 shadow">
                <div class="flex items-center justify-between">
                <h1 class="text-center text-green-500 font-bold text-2xl underline p-3 mb-4 order-first">Manage Roles</h1>
                <a href="{{ route('view_adduser') }}" class="border-2 border-green-500 p-2 mr-2 rounded-lg font-bold order-last text-green-500">Add User</a>
                </div>
                @if (session()->has('success'))
                <div class="bg-green-100 border-l-4 border-orange-500 text-green-700 p-4 mb-2" role="alert">
                    <p>{{ session()->get('success') }}</p>
                </div>
            @endif
                <table class="divide-y divide-blue-600 ">
                    <thead class="bg-blue-300">
                        <tr>
                            <th class="px-6 py-2 text-lg text-blue-800">
                                #
                            </th>
                            <th class="px-6 py-2 text-lg text-blue-800">
                                Name
                            </th>
                            <th class="px-6 py-2 text-lg text-blue-800">
                                Email
                            </th>
                            <th class="px-6 py-2 text-lg text-blue-800">
                                Role
                            </th>
                            <th class="px-6 py-2 text-lg text-blue-800">
                                Manage
                            </th>

                            <th class="px-6 py-2 text-lg text-blue-800">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-300">
                        @foreach ($roles as $role)
                            <tr class="whitespace-nowrap">

                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        {{ $loop->iteration }}
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        {{ $role->name }}
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500">
                                        {{ $role->email }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $role->role }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="flex items-center">
                                        @if ($role->role == 'moderator')

                                            <a href="{{ route('admin', $role->id) }}"
                                                class="text-green-500 p-2 border-2 border-gray-600 rounded-lg"
                                                onclick="return myFunction();">Make Admin</a>

                                        @elseif (($role->role == 'admin') && (Auth::id() == $role->id))

                                            <span
                                                class="text-green-500 p-2 border-2 font-bold border-gray-600 rounded-lg">Active
                                            </span>

                                        @else
                                            <a href="{{ route('moderator', $role->id) }}" class="text-green-500 p-2 border-2 border-gray-600 rounded-lg"
                                                onclick="return myFunction();">Make
                                                Moderator</a>
                                        @endif
                                    </div>

                                </td>

                                <td class="px-6 py-4 text-sm text-gray-500">


                                    @if (Auth::id() == $role->id)
                                        <span class="p-2 text-green-500 text-sm">You are active</span>

                                    @else
                                        <form method="post" action="{{ route('role_delete', $role->id) }}">
                                            @csrf
                                            {{-- <input name="_method" type="hidden" value="DELETE"> --}}
                                            <button type="submit" class="bg-red-500 p-2 rounded-sm text-sm text-white"
                                                onclick="return myFunction();">Delete</button>
                                        </form>
                                    @endif
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
