@extends('access.master')
@section('content')
<div class="bg-gray-100 flex flex-col rounded dark:bg-gray-800">
    <h1 class="font-bold border-b border-gray-600 flex flex-row justify-between items-center p-2">
        Fillter Recipes
    </h1>
    <h1 class="m-2 p-4 bg-gray-200 rounded dark:bg-gray-700">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum, odio maxime. Sapiente distinctio
        pariatur rem odit illum tempora sequi repellat. Facilis nisi molestias ipsum laudantium incidunt cumque
        assumenda praesentium accusamus!
    </h1>
</div>
        <form method="get" action="{{ route('search') }}" class="my-2">
            <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1 gap-2 my-2">
                <select name="category" class="mx-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">All categories</option>
                    @foreach ($recipe_category as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>

                <button type="button" id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                    class="mx-0 inline-flex items-center px-4 py-2 text-sm font-medium text-center text-black border border-gray-300 bg-gray-50 rounded-lg hover:bg-gray-100 dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-700 dark:border-gray-600" >Dropdown search
                    <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                    <div class="p-3">
                        <label for="input-group-search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input type="text" id="input-group-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search user">
                        </div>
                    </div>
                    <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownSearchButton">
                        @foreach ($recipe_ingredients as $value)
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input type="checkbox" name="ingredient_ids[]" id="ingredient-{{ $value->id }}" value="{{ $value->id }}"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="ingredient-{{ $value->id }}"  class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $value->name }}</label>
                                </div>
                            </li>
                         @endforeach
                    </ul>
                </div>

                <select name="sort" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Sort by:</option>
                    <option value="name_asc">Name (A-Z)</option>
                    <option value="name_desc">Name (Z-A)</option>
                    <option value="created_at_asc">Date (oldest first)</option>
                    <option value="created_at_desc">Date (newest first)</option>
                  </select>
            </div>
            <div class="flex gap-2">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <x-text-input
                        name="keyword"
                        type="text"
                        id="search-recipes"
                        class="w-full block mr-2 pl-10 text-sm rounded-lg"
                        placeholder="Keyword..."
                    />
                </div>
                <button type="submit" class="bg-blue-600 px-4 rounded-lg hover:bg-blue-700 text-white font-semibol dark:bg-indigo-600">
                    <i class="fa-solid fa-filter"></i>
                </button>
            </div>

        </form>
    </div>
    {{-- @if (count($recipes) > 0) --}}
    <div class="bg-gray-100 rounded dark:bg-gray-800">
        <div class="grid gap-2 justify-center p-2 lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 py-2">
            @foreach ($recipes as $value)
                <div id="recipe-{{ $value->id }}"
                    class="relative max-w-sm border border-gray-200 bg-white border-0.5 border-gray-200 rounded shadow-lg
                    dark:bg-gray-900 dark:border-gray-700">
                    <div class="h-48 overflow-hidden rounded-t">
                        <img class="object-cover w-full h-full " src="{{ asset('images/' . $value->img) }}" alt="" />
                    </div>
                    <div class="p-5">
                        <h5 class="mb-2 md:text-xl font-bold tracking-tight text-gray-900 break-all dark:text-white">
                            {{ $value->name }}
                        </h5>
                        <p class="mb-3 font-normal text-xs text-gray-700 break-all dark:text-gray-400 overflow-hidden overflow-ellipsis">
                            {{ $value->descriptions }}
                        </p>
                        <a href="{{ route("show-recipe", $value->id) }}">
                            <x-buttons.primary-button class="px-3 py-2">
                                {{ __("Read more") }}
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd">
                                    </path>
                                </svg>
                            </x-buttons.primary-button>
                        </a>
                        <a href="{{ route('edit-recipe', $value->id) }}">
                            <button
                            class="absolute right-0 top-0 edit-button toggle-element hidden inline-flex font-semibold items-center px-2 py-1 bg-green-600 border border-transparent rounded-bl rounded-tr font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-700 focus:outline-none focus:ring-green-700 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 hover:font-bold"
                            data-users-id="{{ Auth::user()->id }}"
                            data-recipes-id="{{ $value->id }}">
                            edit
                            </button>
                        </a>
                        <x-buttons.danger-button class="absolute right-0 top-0 delete-button delete-bookmark toggle-element hidden">
                            {{ __("Delete") }}
                        </x-buttons.danger-button>
                        <button
                            class="absolute right-0 top-0 delete-button delete-bookmark toggle-element hidden inline-flex font-semibold items-center px-2 py-1 bg-red-600 border border-transparent rounded-bl rounded-tr font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-700 focus:outline-none focus:ring-red-700 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 hover:font-bold"
                            data-users-id="{{ Auth::user()->id }}"
                            data-recipes-id="{{ $value->id }}">
                            delete
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- {!! $recipes->links() !!} --}}
    </div>
{{-- @else --}}
<h1 class="bg-gray-200 my-2 py-2 font-semibold rounded text-center dark:bg-gray-800">No Data Found</h1>
{{-- @endif --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#input-group-search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#dropdownSearch li").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@endsection
