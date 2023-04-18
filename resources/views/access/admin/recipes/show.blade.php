@extends('access.master')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <style>
        input[type="checkbox"]:checked+i:before {
            color: #ffd117;
        }
    </style>

    <div class=" ">
        <div>
            <div class="flex flex-col p-4 w-1/2">
                <div class="flex flex-row">


                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $rating)
                            <i class="fas fa-star"></i>
                        @else
                            <i class="far fa-star"></i>
                        @endif
                    @endfor
                </div>

                <h5 class="mb-2 md:text-2xl font-bold tracking-tight text-center uppercase text-gray-900 dark:text-white">
                    {{ $recipes->name }}
                    <button type="button" onclick="myFunction()" class="fas fa-star fa-xl pr-1">
                        {{ $recipes->rating }}
                    </button>
                </h5>

                <img class="rounded-t-lg w-full" src="{{ asset('images/' . $recipes->img) }}" alt="" />
                <button class="rounded-b mt-1 create-bookmark text-white font-semibold bg-blue-500 hover:bg-blue-800 w-full"
                    data-users-id="{{ Auth::user()->id }}" data-recipes-id="{{ $recipes->id }}">Bookmark Recipe</button>
            </div>

            <div>
                <div id="rate"  class="hidden flex w-1/2 flex-col text-center bg-gray-200 dark:bg-gray-800 p-4 rounded">
                    {{-- <form action="{{ route('rating.store') }}" method="POST">
                        @csrf --}}
                        <div class="flex-row p-2 text-gray-300">
                            <label class="">
                                <input name="rating" class="hidden" type="checkbox" value="1"
                                    onclick="checkPrevious(this)">
                                <i class="fa fa-star fa-2xl"></i>
                            </label>
                            <label>
                                <input name="rating" class="hidden" type="checkbox" value="2"
                                    onclick="checkPrevious(this)">
                                <i class="fa fa-star fa-2xl"></i>
                            </label>
                            <label>
                                <input name="rating" class="hidden" type="checkbox" value="3"
                                    onclick="checkPrevious(this)">
                                <i class="fa fa-star fa-2xl"></i>
                            </label>
                            <label>
                                <input name="rating" class="hidden" type="checkbox" value="4"
                                    onclick="checkPrevious(this)">
                                <i class="fa fa-star fa-2xl"></i>
                            </label>
                            <label>
                                <input name="rating" class="hidden" type="checkbox" value="5"
                                    onclick="checkPrevious(this)">
                                <i class="fa fa-star fa-2xl"></i>
                            </label>
                        </div>
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter your Review</label>
                        <textarea id="message" rows="6" name="review"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Write your thoughts here...">
                        </textarea>

                        <button type="submit" data-users-id="{{ Auth::user()->id }}" data-recipes-id="{{ $recipes->id }}"
                            class="bg-blue-500 hover:bg-blue-600 create-rating text-white font-semibold p-2 rounded-lg mt-2 w-1/2">Post</button>
                </div>
                {{-- </form> --}}

            </div>

        </div>
    </div>

    <script src="{{ asset('js/bookmarks.js') }}"></script>

    <script>
        function checkPrevious(current) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].value <= current.value) {
                    checkboxes[i].checked = true;
                } else {
                    checkboxes[i].checked = false;
                }
            }
        }

        function myFunction() {
            var x = document.getElementById("rate");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    </body>

    </html>
@endsection
