
<x-admin-layout>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/dark-light-mode.js'])
    <div class="bg-gray-200 py-12 w-full dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 overflow-hidden sm:rounded-lg p-2 dark:bg-gray-900">

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
                                        <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="pt-6">
                                                <div class="mb-6">
                                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Role name </label>
                                                    <input type="text" id="name" name="name" value="{{ $role->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-600">
                                                </div>
                                                @error('name')
                                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div>
                                                <x-primary-button>{{ __('Update') }}</x-primary-button>
                                            </div>
                                        </form>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>

                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                                <div class="p-4 sm:p-8 bg-gray-50 dark:bg-gray-800 shadow sm:rounded-lg">
                                    <div class="max-w-xl">
                                        <section>
                                            @if ($role->permissions)
                                            @foreach ($role->permissions as $role_permission)
                                                <form class="px-4 py-2 mb-6 bg-indigo-700 hover:bg-indigo-600 text-white rounded-md" method="POST"
                                                    action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}"
                                                    onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">{{ $role_permission->name }}</button>
                                                </form>
                                            @endforeach
                                        @endif
                                        </section>

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
                                                <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                                                    @csrf
                                                    <div class="pt-6">
                                                        <div class="mb-6">
                                                            <label for="permission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permission</label>
                                                            <select name="permission" id="permission" autocomplete="permission-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-600 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-600">
                                                                @foreach ($permissions as $permission)
                                                                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('name')
                                                                <span class="text-red-400 text-sm">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div>
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
        </div>
    </div>
    </x-admin-layout>
