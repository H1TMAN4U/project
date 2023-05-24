
@extends('access.master')
@section('content')

<div class="p-4 sm:p-8 bg-gray-50 dark:bg-gray-800 shadow sm:rounded-lg">
    <section>

        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Permissions') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </header>

        <form method="POST" action="{{ route('admin.permissions.store') }}">
            @csrf
            <div>
                <div class="pt-6">
                    <div class="mb-6">
                        @error('name')
                            <span class="text-red-400 text-sm">{{ $message }}</span>
                        @enderror
                        <x-input-label for="name" :value=" __('Permissions Name')"/>
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" placeholder="{{ __('Create New Permissions') }}"/>
                    </div>
                    <x-primary-button class="flex w-full justify-center">{{ __('Create') }}</x-primary-button>
                </div>
            </div>
        </form>
    </section>
</div>
@endsection


