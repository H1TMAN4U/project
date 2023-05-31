@extends('access.master')
@section('content')
<div class="bg-gray-100 flex flex-col rounded dark:bg-gray-800">
    <h1 class="border-b font-bold border-gray-600 p-2">
        Users
    </h1>
    <h1 class="m-2 p-4 bg-gray-200 rounded dark:bg-gray-700">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum, odio maxime. Sapiente distinctio
        pariatur rem odit illum tempora sequi repellat. Facilis nisi molestias ipsum laudantium incidunt cumque
        assumenda praesentium accusamus!
    </h1>
</div>
<form class="flex flex-row w-full py-1 px-2 bg-gray-800 my-1 rounded gap-2" type="get" action="{{ route('search-user') }}">
    @csrf
    <div class="relative w-full">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <x-text-input
            name="search-user"
            type="text"
            id="search-recipes"
            class="w-full block mr-2 pl-10 text-sm"
            placeholder="Search user/s by their name or email"
        />
    </div>
    <x-buttons.secondary-button
        type="submit"
        class="rounded active:bg-blue-700 focus:ring-blue-500 dark:bg-blue-600 dark:hover:bg-gray-900 dark:focus:ring-indigo-600">
        {{__('Search')}}
    </x-buttons.secondary-button>
</form>
<div class="bg-gray-100 p-2 rounded dark:bg-gray-800">
    <div class="relative overflow-x-auto sm:rounded border border-gray-300 dark:border-gray-900">
        <table class="w-full text-sm text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400 dark:border-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-4 text-left">
                        Permission name
                    </th>
                    <th scope="col" class="px-6 py-4 text-center">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-4 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="bg-white rounded border-t dark:bg-gray-800 dark:border-gray-900 hover:bg-gray-50 dark:hover:bg-gray-700 duration-500 transition ease-in-out">
                    <td scope="row" class="p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </td>
                        <td class="p-4 whitespace-nowrap">
                            <div class="flex items-center justify-center">
                                {{ $user->email }}
                            </div>
                        </td>
                        <td class="p-4 w-1/5 text-center">
                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <div class="flex flex-row items-center justify-center gap-2">
                                    <a href="{{ route('admin.users.show', $user->id) }}">
                                        <button
                                            type="button"
                                            class="block px-2 py-1 rounded hover:bg-gray-100 text-black duration-500 transition ease-in-out dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">
                                            <i class="fa-solid fa-pen-to-square fa-md"></i>
                                        </button>
                                    </a>
                                    <button
                                        class="block px-2 py-1 rounded hover:bg-red-600 text-black hover:text-white duration-500 transition ease-in-out dark:text-gray-400 dark:hover:text-white"
                                        type="submit">
                                        <i class="fa-solid fa-trash fa-md"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

