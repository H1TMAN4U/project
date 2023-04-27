@extends('access.master')
@section('content')

<form method="get" action="{{ route('search') }}" class="p-4">
    <div class="grid grid-cols-4">
        <input type="text" name="keyword" placeholder="Keyword..."  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

        <select name="category" class="mx-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option value="">All categories</option>
            @foreach ($recipe_category as $value)
                <option value="{{ $value->id }}">{{ $value->name }}</option>
            @endforeach
        </select>

        <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch" class="inline-flex items-center px-4 mx-1 py-2 text-sm font-medium text-center text-black border border-gray-300 bg-gray-50 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Dropdown search <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

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
        <button type="submit" class="bg-blue-600 p-2 rounded-lg hover:bg-blue-700 text-white font-semibold w-1/2 my-1">Search</button>
    </div>

  </form>
  <div class="p-6">

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
        <div id="card"
            class="bg-gray-100 grid justify-center md:grid-cols-3 my-2 py-4 px-4 rounded md:flex-row
        dark:bg-gray-800 ">

            @foreach ($recipes as $value)
                <div id="recipe-{{$value->id}}" class="max-w-sm mx-2 my-1 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
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
        <div
            class="bg-gray-300 flex justify-center md:grid-cols-4 my-2 py-2 rounded md:flex-row
            dark:bg-gray-800">
            <h1 class="text-center">No Data Found</h1>
        </div>
    @endif
</div>

@endsection
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
  <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

  <form action="{{ route('filter') }}" method="post">
    <select data-placeholder="Begin typing a name to filter..." multiple class="chosen-select" name="test">
      <option value=""></option>
      <option>American Black Bear</option>
      <option>Asiatic Black Bear</option>
      <option>Brown Bear</option>
      <option>Giant Panda</option>
      <option>Sloth Bear</option>
      <option>Sun Bear</option>
      <option>Polar Bear</option>
      <option>Spectacled Bear</option>
    </select>
    <input type="submit">
  </form>
<script>
      $(".chosen-select").chosen({
    no_results_text: "Oops, nothing found!"
  })
</script> --}}
