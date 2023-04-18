@extends('access.master')
@section('content')

<div class="bg-gray-100 py-12 w-full dark:bg-gray-900">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            <div class="bg-gray-300 rounded-t-lg px-4 flex items-center justify-between py-4 dark:bg-gray-800">
                <div>
                    <div>
                        <a href="{{ route('admin.permissions.create') }}" class="bg-gray-300 inline-flex items-center text-gray-700 uppercase  focus:outline-none hover:bg-gray-200 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Create</a>
                    </div>
                </div>
            </div>
            <table class="w-full rounded-b-lg text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="bg-gray-200 rounded text-xs text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="pb-4">
                    @foreach ($permissions as $value)
                    <tr class="bg-gray-100 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-900">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image">
                            <div class="pl-3">
                                <div class="flex items-center">
                                    {{ $value->name }}
                                </div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.permissions.edit', $value->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form class="" method="POST" action="{{ route('admin.permissions.destroy', $value->id) }}" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button class="font-medium text-red-600 dark:text-red-600 hover:underline" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
