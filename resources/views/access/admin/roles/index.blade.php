@extends('access.master')
@section('content')
<div class="bg-gray-100 flex flex-col rounded dark:bg-gray-800">
    <div class="border-b border-gray-600 flex flex-row justify-between items-center  p-2">
        <h1 class="font-bold border-gray-600 uppercase p-2">Roles</h1>
        <a href="{{ route('admin.roles.create') }}" class="bg-gray-300 inline-flex text-gray-700 uppercase font-semibold rounded-lg text-sm p-2 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:font-bold">Create</a>
    </div>

    <div class="m-2 p-4 bg-gray-200 rounded
        dark:bg-gray-700">
        <h1>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum, odio maxime. Sapiente distinctio
            pariatur rem odit illum tempora sequi repellat. Facilis nisi molestias ipsum laudantium incidunt cumque
            assumenda praesentium accusamus!</h1>
    </div>
</div>
<div class="bg-gray-100 my-2 p-2 rounded dark:bg-gray-800">
    <div class="relative overflow-x-auto sm:rounded">
        <table class="w-full text-sm text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400 dark:border-gray-700">
                <tr>
                    <th scope="col" class="p-4 text-left ">
                        Role name
                    </th>
                    <th scope="col" class="p-4 text-center ">
                        Permission name
                    </th>
                    <th scope="col" class="p-4 text-right ">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr class="bg-white rounded border-t font-medium text-gray-900 whitespace-nowrap dark:text-white dark:bg-gray-800 dark:border-gray-900 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td scope="row" class="p-4 text-left">
                        {{ $role->name }}
                    </td>
                    <td scope="row" class="p-4">
                        <div class="grid gap-2 justify-center grid-cols-5">
                            @foreach($permissions as $permission)
                                @if ($role->hasPermissionTo($permission->name))
                                    <h1 class="bg-blue-600 py-2 px-4 uppercase text-center text-white font-semibold rounded-lg dark:bg-indigo-600">{{ $permission->name }}</h1>
                                @endif
                            @endforeach
                        </div>
                    </td>
                    <td class="p-4 float-right">
                        <form class="" method="POST" action="{{ route('admin.roles.destroy', $role->id) }}" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <div class="flex flex-col items-center">
                                <button class="font-semibold text-red-600 dark:text-red-600 hover:underline hover:font-bold" type="submit">Delete</button>
                                <a href="{{ route('admin.roles.edit', $role->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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

