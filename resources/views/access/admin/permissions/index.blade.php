@extends('access.master')
@section('content')

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
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="pb-4 ">
            @foreach ($permissions as $value)
            <tr class="bg-gray-100 rounded dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                <td class="px-6 py-4">
                    <div class="flex items-center">
                            {{ $value->name }}
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                            {{ $value->name }}
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                            {{ $value->name }}
                    </div>
                </td>
                <td class="px-6 py-4">
                    <form class="" method="POST" action="{{ route('admin.permissions.destroy', $value->id) }}" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-medium text-red-600 dark:text-red-600 hover:underline">Delete</button>
                        <a href="{{ route('admin.permissions.edit', $value->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>


@endsection
