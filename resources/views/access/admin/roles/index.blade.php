@extends('access.master')
@section('content')
    {{-- <div class="bg-gray-100 py-12 w-full dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg"> --}}

                <div class="bg-gray-300 rounded-t-lg px-4 flex items-center justify-between py-4 dark:bg-gray-800">
                    <div>
                        <div>
                            <a href="{{ route('admin.roles.create') }}" class="bg-gray-300 inline-flex items-center text-gray-700 uppercase  focus:outline-none hover:bg-gray-200 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Create</a>
                        </div>
                    </div>
                </div>
                <table class="w-full rounded-b-lg text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="bg-gray-200 rounded text-xs text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 float-right">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="pb-4">
                        @foreach ($roles as $role)
                        <tr class="bg-gray-100 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="items-center">
                                    <div class="flex items-center">
                                        {{ $role->name }}
                                    </div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                <form class="float-right" method="POST" action="{{ route('admin.roles.destroy', $role->id) }}" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="font-medium text-red-600 dark:text-red-600 hover:underline" type="submit">Delete</button>
                                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>

                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            {{-- </div>

        </div>
    </div> --}}
@endsection

