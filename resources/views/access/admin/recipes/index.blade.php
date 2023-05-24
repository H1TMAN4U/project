@extends('access.master')
@section('content')

<div class="bg-gray-100 flex flex-col rounded dark:bg-gray-800">
    <div class="border-b border-gray-600 mb-1 flex flex-row justify-between items-center p-2">
        <b>My Recipes</b>
        <div class="text-gray-900 flex flex-row justify-end font-semibold items-center mb-1 cursor-pointer dark:text-gray-200">
            <button id="dropdownLeftEndButton" data-dropdown-toggle="dropdownLeftEnd" data-dropdown-placement="left-end"
            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600">                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdownLeftEnd" class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLeftEndButton">
                    <li>
                        <a href="{{ route('create-recipe') }}"
                            class="block px-4 py-2 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white dark:hover:font-bold">Create
                        </a>
                    </li>
                    <li>
                        <a data-toggle=".edit-button"
                            class="block px-4 py-2 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white dark:hover:font-bold">Edit
                        </a>
                    </li>
                    <li>
                        <a data-toggle=".delete-button"
                            class="block px-4 py-2 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white dark:hover:font-bold">Delete
                        </a>
                    </li>
                </ul>
            </div>





        </div>
    </div>
    <div class="m-2 p-4 bg-gray-200 rounded
        dark:bg-gray-700">
        <h1>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum, odio maxime. Sapiente distinctio
            pariatur rem odit illum tempora sequi repellat. Facilis nisi molestias ipsum laudantium incidunt cumque
            assumenda praesentium accusamus!</h1>
    </div>
</div>
@if (count($recipes) > 0)
<div class="bg-gray-100 rounded dark:bg-gray-800">
    <div class="grid gap-2 justify-center p-2 lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 xs-grid-row my-2 py-2 ">
        @foreach ($recipes as $value)
            <div id="recipe-{{ $value->id }}" class="relative  max-w-sm bg-white border border-gray-200 rounded-lg shadow
                dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="{{ asset('images/' . $value->img) }}" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 md:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $value->name }}
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Here are the biggest enterprise
                    </p>
                    <a href="{{ route("show-recipe", $value->id) }}">
                        <button
                        type="button"
                        class="inline-flex font-semibold items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 hover:font-bold">
                        Read more
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd">
                            </path>
                        </svg>
                        </button>
                    </a>
                    <a href="{{ route('edit-recipe', $value->id) }}">
                        <button
                        class="absolute right-0 top-0 edit-button toggle-element hidden inline-flex font-semibold items-center px-2 py-1 bg-green-600 border border-transparent rounded-bl-lg rounded-tr-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-700 focus:outline-none focus:ring-green-700 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 hover:font-bold"
                        data-users-id="{{ Auth::user()->id }}"
                        data-recipes-id="{{ $value->id }}">
                        edit
                        </button>
                    </a>
                    <button
                        class="absolute right-0 top-0 delete-button delete-bookmark toggle-element hidden inline-flex font-semibold items-center px-2 py-1 bg-red-600 border border-transparent rounded-bl-lg rounded-tr-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-700 focus:outline-none focus:ring-red-700 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 hover:font-bold"
                        data-users-id="{{ Auth::user()->id }}"
                        data-recipes-id="{{ $value->id }}">
                        delete
                    </button>
                </div>
            </div>
        @endforeach
        @else
            <h1 class="bg-gray-200 my-2 py-2 font-semibold rounded text-center dark:bg-gray-800">No Data Found</h1>
        @endif
    <div>{!! $recipes->links() !!}</div>
</div>
    <script src="{{ asset('js/recipes.js') }}"></script>
    <script src="{{ asset('js/design.js') }}"></script>
@endsection
