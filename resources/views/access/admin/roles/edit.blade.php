
@extends('access.master')
@section('content')
<div class="bg-gray-100 flex flex-col border border-gray-200 rounded dark:bg-gray-800 dark:border-gray-700">
    <div class="flex flex-row items-center px-2 justify-between border-b border-gray-200 dark:border-gray-700">
        <a href="{{ route('admin.roles.index') }}">
            <button class="bg-gray-200 border border-gray-100 hover:bg-gray-300 text-gray-600 px-4 py-1 rounded
            dark:bg-gray-700 dark:border-gray-600 dark:text-white hover:dark:bg-gray-600 ">
                <i class="fa-solid fa-arrow-left-long fa-xl"></i>
            </button>
        </a>
        <h1 class="font-bold mb-1 p-2">{{ $role->name }}</h1>
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
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </header>
        <div class="flex space-x-2 py-2">
            @if ($role->permissions)
                @foreach ($role->permissions as $role_permission)
                <form class="px-4 py-2 bg-blue-600 hover:bg-red-600 text-white font-semibold rounded transition duration-500 ease-out-in
                    dark:bg-indigo-600 dark:hover:bg-red-600"
                    method="POST"
                    action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}"
                    onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button class="" type="submit">{{ $role_permission->name }}</button>
                </form>
                @endforeach
            @endif
        </div>
        <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
            @csrf
            @method('PUT')
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Role name </label>
            <input type="text" id="name" name="name" value="{{ $role->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-600">
            @error('name')
                <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
            <div class="sm:col-span-6 pt-5">
                <x-buttons.primary-button class="py-2">{{ __('Update') }}</x-buttons.primary-button>
            </div>
        </form>
    </div>
    <div class="w-full p-4 sm:p-8 bg-gray-50 dark:bg-gray-800 shadow sm:rounded border border-gray-200 dark:border-gray-700">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Role Permissions') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </header>
        <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
            @csrf
            <label for="permission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permission</label>
            <select name="permission" id="permission" autocomplete="permission-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-indigo-500 focus:border-indigo-600 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-600">
                @foreach ($permissions as $permission)
                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                @endforeach
            </select>
            @error('name')
                <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
            <div class="sm:col-span-6 pt-5">
                <x-buttons.primary-button class="py-2">{{ __('Assign') }}</x-buttons.primary-button>
            </div>
        </form>
    </div>
</div>



@endsection
