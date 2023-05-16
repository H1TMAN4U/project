@extends('access.master')
@section('content')
<div class="bg-gray-100 flex flex-col rounded dark:bg-gray-800">
    <h1 class="border-b font-bold border-gray-600 mb-1 p-2">Roles</h1>
    <div class="m-2 p-4 bg-gray-200 rounded
        dark:bg-gray-700">
        <h1>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum, odio maxime. Sapiente distinctio
            pariatur rem odit illum tempora sequi repellat. Facilis nisi molestias ipsum laudantium incidunt cumque
            assumenda praesentium accusamus!</h1>
    </div>
</div>
<div class="bg-gray-100 my-2 p-2 rounded dark:bg-gray-800">
    <div class="bg-gray-300 rounded-t-lg px-4 flex items-center justify-between py-4 dark:bg-gray-800">
        <form class="flex items-center" type="get" action="{{ url('/search') }}">
            {{-- <x-search></x-search> --}}
        </form>
    </div>
    <table class="w-full rounded-b-lg text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400 dark:border-gray-700">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Position
                </th>
                <th scope="col" class="px-6 py-3">
                    Permissions
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="">
            @foreach ($users as $user )
            <tr class="bg-white rounded border dark:bg-gray-800 dark:border-gray-900 hover:bg-gray-50 dark:hover:bg-gray-700">
                <td scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="pl-3">
                        <div class="text-base font-semibold">{{ $user->name }}</div>
                        <div class="font-normal text-gray-500">{{ $user->email }}</div>
                    </div>
                </td>
                <td class="px-6 py-4 text-gray-500 dark:text-white" >
                    @if ($user->roles)
                        @foreach ($user->roles as $user_role)
                            <div class="">
                                {{ $user_role->name }}
                            </div>
                        @endforeach
                    @endif
                </td>
                <td class="px-6 py-4 text-gray-500 dark:text-white" >
                    @if ($user->permissions)
                        @foreach ($user->permissions as $user_permissions)
                            <div class="">
                                {{ $user_permissions->name }}
                            </div>
                        @endforeach
                    @endif                                    </div>
                </td>
                <td class="px-6 py-4">
                    <!-- Modal toggle -->

                    <a href="{{ route('admin.user.show', $user->id) }}" type="button" data-modal-target="editUserModal" data-modal-show="editUserModal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
                    <form class="" method="POST" action="{{ route('admin.user.destroy', $user->id) }}" onsubmit="return confirm('Are you sure?');">
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

@endsection
