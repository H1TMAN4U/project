@extends('access.master')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    @if (count($recipes) > 0)
        <div class="w-full bg-gray-100 p-4
        dark:bg-gray-800 ">
            <div class="grid justify-center md:grid-cols-4 py-2 bg-gray-100 rounded md:flex-row
            dark:bg-gray-800">
                @foreach ($recipes as $value)
                    <div class="flex flex-col">
                        <img class="rounded-t-lg w-full" src="{{ asset('images/' . $value->img) }}" alt="" />
                        <button class="create-bookmark bg-blue-700 hover:bg-blue-800 w-full" data-users-id="{{ Auth::user()->id}}" data-recipes-id="{{ $value->id }}">Bookmark Recipe</button>
                    </div>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 md:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{$value->name}}</h5>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div
            class="bg-gray-300 flex justify-center md:grid-cols-4 my-2 py-2 rounded md:flex-row
                dark:bg-gray-800">
            <h1 class="text-center">No Data Found</h1>
        </div>
    @endif
    <script src="{{ asset('js/bookmarks.js') }}"></script>

@endsection
