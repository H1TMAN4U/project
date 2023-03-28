<x-admin-layout>
@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/dark-light-mode.js'])

<div class="bg-gray-200 py-12 w-full dark:bg-gray-900">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-200 overflow-hidden sm:rounded-lg p-2 dark:bg-gray-900">

            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Profile') }}
                </h2>
            </x-slot>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                    <div class="p-4 sm:p-8 bg-gray-50 dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            <section>
                                <header>
                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        {{ __('Roles') }}
                                    </h2>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        {{ __("Update your account's profile information and email address.") }}
                                    </p>
                                </header>
                                <div>
                                    <form method="POST" action="{{ route('admin.users.roles', $user->id) }}">
                                        @csrf
                                        <div class="pt-6">
                                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role name</label>
                                        <select id="role" name="role" autocomplete="role-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-600 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-600">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                        @enderror
                                        <div class="py-4">
                                            <x-primary-button>{{ __('Assign') }}</x-primary-button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>

                    <div class="p-4 sm:p-8 bg-gray-50 dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            <section>
                                <header>
                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        {{ __('Role Permissions') }}
                                    </h2>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        {{ __("Update your account's profile information and email address.") }}
                                    </p>
                                </header>
                                <div>
                                    <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}">
                                        @csrf
                                        <div class="pt-6">
                                            <label for="permission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permission</label>
                                            <select name="permission" id="permission" autocomplete="permission-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-600 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-600">
                                                @foreach ($permissions as $permission)
                                                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('name')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                        @enderror
                                        <div class="py-4">
                                            <x-primary-button>{{ __('Assign') }}</x-primary-button>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-admin-layout>
