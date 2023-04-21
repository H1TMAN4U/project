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
                            <i class="pasive fas fa-star text-yellow-300"></i>
                        @else
                            <i class="pasive fas fa-star text-gray-300"></i>
                        @endif
                    @endfor
                </div>

                <h5 class="mb-2 md:text-2xl font-bold tracking-tight text-center uppercase text-gray-900 dark:text-white">
                    <button type="button" onclick="HideElemenet()" class="bg-blue-600 rounded-lg p-1 pr-1">
                        Rate
                    </button>
                </h5>

                <img class="rounded-t-lg w-full" src="{{ asset('images/' . $recipes->img) }}" alt="" />
                <button class="rounded-b mt-1 create-bookmark text-white font-semibold bg-blue-500 hover:bg-blue-800 w-full"
                    data-users-id="{{ Auth::user()->id }}" data-recipes-id="{{ $recipes->id }}">Bookmark Recipe</button>
            </div>

            <div id="rating-element" class="hide hidden flex justify-center w-1/2 flex-col text-center bg-gray-200 dark:bg-gray-800 p-4 rounded">
                <form id="rating-form">
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
                        placeholder="Write your thoughts here..."></textarea>
                    <input type="text" class="hidden" name="users_id" value="{{ Auth::id() }}">
                    <input type="text" class="hidden" name="recipes_id" value="{{ $recipes->id }}">
                    <button type="submit" onclick="HideElemenet()"  class=" bg-blue-500 hover:bg-blue-600 text-white font-semibold p-2 rounded-lg mt-2 w-1/2">
                        Post
                    </button>
                </form>
            </div>

        </div>

    </div>

    <script src="{{ asset('js/rating.js') }}"></script>

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
    </script>
        <script src="{{ asset('js/design.js') }}"></script>
        <script src="{{ asset('js/rating.js') }}"></script>
        <script src="{{ asset('js/bookmarks.js') }}"></script>

    </body>

    </html>
@endsection
