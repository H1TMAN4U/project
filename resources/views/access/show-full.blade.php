@extends('access.master')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    @if (count($recipes) > 0)
        <div class="w-full ">
            <div
                class="grid bg-gray-200 justify-center md:grid-cols-4 py-2 rounded md:flex-row
            dark:bg-gray-800 ">
                @foreach ($recipes as $value)
                    <div class="flex flex-col p-4">
                        <img class="rounded-t-lg w-full" src="{{ asset('images/' . $value->img) }}" alt="" />
                        <button class="rounded-b mt-1 create-bookmark bg-blue-700 hover:bg-blue-800 w-full"
                            data-users-id="{{ Auth::user()->id }}" data-recipes-id="{{ $value->id }}">
                            Bookmark Recipe
                        </button>
                    </div>
                    <div class="p-5">
                        <button type="button" onclick="myFunction()" class="fas fa-star fa-xl">
                            {{ $value->rating }}
                        </button>
                        <a href="#">
                            <h5 class="mb-2 md:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $value->name }}
                            </h5>
                        </a>

                    </div>
            </div>



            <form action="{{ route('rating.store') }}" method="POST">
                @csrf
                <div class="flex items-center star-widge">
                    <input class="hidden" type="radio" name="rating" value="1" id="rate-1">
                    <label onclick="myFunction(this)" id="rate-1" class=" fas fa-star"></label>
                    <input type="radio" name="rating" value="1" id="rate-2">
                    <label onclick="myFunction(this)" id="rate-2" class=" fas fa-star"></label>
                    <input type="radio" name="rating" value="1" id="rate-3">
                    <label onclick="myFunction(this)" id="rate-3" class=" fas fa-star"></label>
                    <input type="radio" name="rating" value="1" id="rate-4">
                    <label onclick="myFunction(this)" id="rate-4" class=" fas fa-star"></label>
                    <input type="radio" name="rating" value="1" id="rate-5">
                    <label onclick="myFunction(this)" id="rate-5" class=" fas fa-star"></label>
                </div>
            </form>
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
    <script src="{{ asset('js/design.js') }}"></script>

    <script>
        // function myFunction() {
        //     var x = document.getElementById("rate");
        //     if (x.style.display === "none") {
        //         x.style.display = "block";
        //     } else {
        //         x.style.display = "none";
        //     }
        // }


    </script>
    </body>

    </html>
@endsection
