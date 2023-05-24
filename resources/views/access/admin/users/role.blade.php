@extends('access.master')
@section('content')
<div class="bg-gray-100 flex flex-col border border-gray-200 rounded dark:bg-gray-800 dark:border-gray-700">
    <div class="flex flex-row items-center px-2 justify-between border-b border-gray-200 dark:border-gray-700">
        <a href="{{ route('admin.users.index') }}">
            <button class="bg-gray-200 border border-gray-100 hover:bg-gray-300 text-gray-600 px-4 py-1 rounded
            dark:bg-gray-700 dark:border-gray-600 dark:text-white hover:dark:bg-gray-600 ">
                <i class="fa-solid fa-arrow-left-long fa-xl"></i>
            </button>
        </a>
        <h1 class="font-bold mb-1 p-2">{{ $user->name }}</h1>
    </div>
    <h1 class="m-2 p-4 bg-gray-200 rounded dark:bg-gray-700">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum, odio maxime. Sapiente distinctio
        pariatur rem odit illum tempora sequi repellat. Facilis nisi molestias ipsum laudantium incidunt cumque
        assumenda praesentium accusamus!
    </h1>
</div>
<div class="flex flex-col items-center justify-center mt-1 gap-1 ">
    <div class="w-full p-4 sm:p-8 bg-gray-50 dark:bg-gray-800 shadow sm:rounded border border-gray-200 dark:border-gray-700">
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Roles') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __("Update your account's Roles.") }}
                </p>
            </header>
            <div class="flex space-x-2 py-2">
                @if ($user->roles)
                    @foreach ($user->roles as $user_role)
                        <form class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md" method="POST"
                            action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">{{ $user_role->name }}</button>
                        </form>
                    @endforeach
                @endif
            </div>
                <form method="POST" action="{{ route('admin.users.roles', $user->id) }}">
                    @csrf
                    <div class="sm:col-span-6">
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role Name</label>
                        <select id="role" name="role" autocomplete="role-name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-600">
                        @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('role')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                    <div class="sm:col-span-6 pt-5">
                        <x-primary-button>{{ __('Assign') }}</x-primary-button>
                    </div>
                </form>
    </div>

    <div class="w-full p-4 sm:p-8 bg-gray-50 dark:bg-gray-800 shadow sm:rounded border border-gray-200 dark:border-gray-700">
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Permissions') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __("Update your account's Permissions.") }}
                </p>
            </header>
            <div class="flex space-x-2 p-2">
                @if ($user->permissions)
                    @foreach ($user->permissions as $user_permission)
                        <form class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md" method="POST"
                            action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">{{ $user_permission->name }}</button>
                        </form>
                    @endforeach
                @endif
            </div>
                <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}">
                    @csrf
                    <div class="sm:col-span-6">
                        <label for="permission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permission Name</label>

                        <select
                            id="permission"
                            name="permission"
                            autocomplete="permission-name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-600">
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('name')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                    <div class="sm:col-span-6 pt-5">
                        <x-primary-button>{{ __('Assign') }}</x-primary-button>
                    </div>
                </form>
    </div>

</div>


@endsection
