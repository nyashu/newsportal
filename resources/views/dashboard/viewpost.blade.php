@extends('layouts.dashboard')


@section('content')
    <h1 class="font-bold text-center text-3xl underline mb-6"> All posts </h1>

    <div class="flex border-gray-200 rounded order-last h-10 justify-end mb-2">
        <form action="{{ route('admin_search') }}" method="GET" class="">
            <input type="text" name="search" class="border-2 p-1 border-gray-500 rounded-lg" placeholder="Search..."
                required />
            <button type="submit" class="bg-green-500 p-2 rounded-xl">Search</button>
        </form>
    </div>

    @if (session()->has('success'))
        <div class="bg-green-100 border-l-4 border-orange-500 text-green-700 p-4 mb-2" role="alert">
            <p>{{ session()->get('success') }}</p>
        </div>
    @endif

    <div class="container flex justify-center mx-auto">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b border-gray-200 shadow">
                    <table class="text-center">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    SN
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Admin ID
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Post
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Created_at
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Updated_at
                                </th>
                                @can('isAdmin')
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Status
                                </th>
                                @endcan
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Edit
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Delete
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">

                            @foreach ($data as $data_list)
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $loop->iteration + $data->firstItem() - 1 }}
                                        @if ($data_list->status == 0)
                                            <span class="text-red-500 font-bold text-sm">F</span>
                                        @else
                                            <span class="text-green-500 font-bold text-sm">T</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{ $data_list->user->name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500">{{ $data_list->title }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $data_list->created_at->diffForHumans() }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $data_list->updated_at->diffForHumans() }}
                                    </td>
                                    @can('isAdmin')
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        @if ($data_list->status == 0)
                                            <a href="{{ route('status', [
                                                'id' => $data_list->id,
                                                'stat' => $data_list->status,
                                            ]) }}"
                                                onclick="return myFunction();"
                                                class="px-1 py-1 text-sm text-white bg-green-400 rounded">Publish</a>
                                        @elseif ($data_list->status == 1)
                                            <a href="{{ route('status', [
                                                'id' => $data_list->id,
                                                'stat' => $data_list->status,
                                            ]) }}"
                                                onclick="return myFunction();"
                                                class="px-1 py-1 text-sm text-white bg-red-400 rounded">Unpublish</a>
                                        @endif
                                    </td>
                                    @endcan
                                    <td class="px-6 py-4">
                                        <a href="{{ route('edit', $data_list->id) }}"
                                            class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                    </td>
                                    {{-- <td class="px-6 py-4">
                                        <a href="{{ route('delete', $data_list->id) }}"
                                            class="px-4 py-1 text-sm text-white bg-red-400 rounded">Delete</a>
                                    </td> --}}
                                    <td>
                                        <form method="get" action="{{ route('delete', $data_list->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="bg-red-500 p-1 rounded-sm text-sm"
                                                onclick="return myFunction();">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
            {{ $data->links() }}
        </div>

    </div>
@endsection
