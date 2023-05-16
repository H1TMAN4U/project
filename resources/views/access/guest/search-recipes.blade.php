@extends('access.master')
@section('content')


    <div class="bg-gray-100 flex flex-col rounded
        dark:bg-gray-800">
        <div class="border-b border-gray-600 mb-1">
            <div
                class="text-gray-700 flex flex-row justify-between items-center mb-1 p-2
                dark:text-gray-200">
                <h1><b>Recipes</b></h1>
                <button onclick="HideElemenet()"
                    class=" bg-red-600 text-white rounded px-4 hover:bg-red-700">Delete</button>
                </div>
        </div>
        <div class=" m-2 p-4 bg-gray-200 rounded
            dark:bg-gray-700">
            <h1>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum, odio maxime. Sapiente distinctio pariatur
                rem odit illum tempora sequi repellat. Facilis nisi molestias ipsum laudantium incidunt cumque assumenda
                praesentium accusamus!</h1>
        </div>
    </div>
    @if (count($recipes) > 0)
    <div class="bg-gray-100 rounded dark:bg-gray-800">
        <div id="card" class="grid gap-2 justify-center p-2 lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 xs-grid-row my-2 py-2 ">
            @foreach ($recipes as $value)
            <div id="recipe-{{ $value->id }}"
                class="relative  max-w-sm bg-white border border-gray-200 rounded-lg shadow
                dark:bg-gray-800 dark:border-gray-700">                    <a href="#">
                        <img class="w-full rounded-t-lg" src="{{ asset('images/' . $value->img) }}" alt="" />
                    </a>
                    <div class="p-5">

                        <div class="flex items-center justify-between">
                            <h5 class="mb-2 md:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $value->name }}
                            </h5>
                        </div>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise</p>
                        <a href="{{ route("show-recipe", $value->id) }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                    <button class="hide hidden bg-red-700 hover:bg-red-800 rounded w-full delete-bookmark"
                        data-users-id="{{ Auth::user()->id }}" data-recipes-id="{{ $value->id }}">Bookmark Recipe
                    </button>
                </div>
            @endforeach
        </div>
    @else
        <h1 class="bg-gray-200 my-2 py-2 font-semibold rounded text-center dark:bg-gray-800">No Data Found</h1>
    @endif
    <div>{!! $recipes->links() !!}</div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('js/bookmarks.js') }}"></script>
    <script src="{{ asset('js/design.js') }}"></script>

@endsection
