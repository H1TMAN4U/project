@extends('access.master')
@section('content')

<div class="bg-gray-100 flex flex-col rounded dark:bg-gray-800">
    <div class="border-b border-gray-600 mb-1 flex flex-row justify-between items-center p-2">
        <b>My Recipes</b>
        <div class="text-gray-900 flex flex-row justify-end font-semibold items-center mb-1 cursor-pointer dark:text-gray-200">
            @if(auth()->user()->hasRole('Root') || auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Moderator') )
                <a href="{{ route('create-recipe') }}"
                    class="block rounded px-2 py-1 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white dark:hover:font-bold">Create</a>

                <a data-toggle=".view-changes-button"
                    class="block rounded px-2 py-1 hover:bg-gray-200  hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white dark:hover:font-bold">Changes
                </a>
                <a data-toggle=".edit-button"
                    class="block rounded px-2 py-1 hover:bg-gray-200  hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white dark:hover:font-bold">Edit
                </a>

                <a data-toggle=".delete-button"
                    class="block rounded px-2 py-1 hover:bg-gray-200  hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white dark:hover:font-bold">Delete
                </a>
            @endif
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
                    <a href="{{ route('show-recipe', $value->id) }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>

                    <a href="{{ route('edit-recipe', $value->id) }}">
                        <button
                        class="edit-button toggle-element hidden absolute right-0 top-0 rounded-bl-lg rounded-tr-lg px-2 font-semibold bg-green-600 text-white hover:bg-green-700 hover:font-bold ">
                        Edit
                        </button>
                    </a>
                    @if(!is_null($IsDirty) && DB::table('recipes_changes')->where('recipes_id', $IsDirty->id)->exists())
                        <a href="{{ route('recipes-changes', $IsDirty->id) }}">
                            <button class="view-changes-button toggle-element hidden absolute right-0 top-0 rounded-bl-lg rounded-tr-lg px-2 font-semibold bg-green-600 text-white hover:bg-green-700 hover:font-bold">
                                View Changes
                            </button>
                        </a>
                    @endif
                    <button
                        class="delete-button toggle-element delete-bookmark hidden absolute right-0 top-0 rounded-bl-lg rounded-tr-lg px-2 font-semibold bg-red-600  text-white hover:bg-red-700 hover:font-bold "
                        data-users-id="{{ Auth::user()->id }}" data-recipes-id="{{ $value->id }}">
                        Delete
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