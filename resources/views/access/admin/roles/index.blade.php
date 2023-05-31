@extends('access.master')
@section('content')
<div class="bg-gray-100 flex flex-col rounded dark:bg-gray-800">
    <div class="border-b border-gray-600 flex flex-row justify-between items-center p-2">
        <b>Roles</b>
        <div class="flex flex-row items-center gap-2">
            <a href="{{ route('admin.roles.create') }}">
                <x-buttons.default-button>
                    {{ __("Create") }}
                </x-buttons.default-button>
            </a>
        </div>
    </div>
    <h1 class="m-2 p-4 bg-gray-200 rounded dark:bg-gray-700">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum, odio maxime. Sapiente distinctio
        pariatur rem odit illum tempora sequi repellat. Facilis nisi molestias ipsum laudantium incidunt cumque
        assumenda praesentium accusamus!
    </h1>
</div>
<div class="bg-gray-100 my-2 p-2 rounded dark:bg-gray-800">
    <div class="relative overflow-x-auto sm:rounded border border-gray-300 dark:border-gray-900">
        <table class="w-full text-sm text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400 dark:border-gray-700">
                <tr>
                    <th scope="col" class="p-4 text-left ">
                        Role name
                    </th>
                    <th scope="col" class="p-4 text-center ">
                        Permission name
                    </th>
                    <th scope="col" class="p-4 w-1/5 text-center ">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr class="bg-white rounded border-t dark:bg-gray-800 dark:border-gray-900 hover:bg-gray-50 dark:hover:bg-gray-700 duration-500 transition ease-in-out">
                    <td scope="row" class="p-4 text-left">
                        {{ $role->name }}
                    </td>
                    <td scope="row" class="p-4">
                        <div class="flex flex-row gap-2 justify-center">
                            @foreach($permissions as $permission)
                                @if ($role->hasPermissionTo($permission->name))
                                    <h1 class="uppercase text-center text-black font-bold rounded-lg dark:text-white">{{ $permission->name }}</h1>
                                @endif
                            @endforeach
                        </div>
                    </td>
                    <td class="p-4 w-1/5">
                        <form class="" method="POST" action="{{ route('admin.roles.destroy', $role->id) }}" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <div class="flex flex-row items-center justify-center gap-2">
                                <a href="{{ route('admin.roles.edit', $role->id) }}">
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

