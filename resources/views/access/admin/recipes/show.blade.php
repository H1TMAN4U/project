@extends('access.master')
@section('content')
<section class="py-4 border-b-2">
    <div class="flex md:flex-row flex-col-reverse justify-center items-center ">
        <div class="">
            <div class="flex flex-col p-4">
                <h1 class="text-4xl text-center leading-relaxed font-semibold py-4">
                    {{ $recipe->name }}
                </h1>
                <div class="flex flex-row justify-center text-center px-4">
                    <div class="w-full p-4">
                        <span class="text-2xl block">5</span>
                        <p class="block text-2xl ">Ingredients</p>
                    </div>
                    <div class="w-full p-4">
                        <p class="block text-2xl">{{$recipe->duration}}</p>
                        <p class="block text-2xl">Minutes</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex grow-1 justify-center">
            <img class="rounded-lg w-[500px] h-auto md:h-[500px]" src="{{ asset('images/' . $recipe->img) }}" alt="" />
        </div>
    </div>
</section>
<section>
    <div class="">
        <div class="flex flex-row justify-between mb-4">
            <h1 class="text-2xl font-semibold">Ingredients</h1>
            <h5 class="uppercase text-xs">4 Servings</h5>
        </div>
        <div class="flex flex-col">
        <ul>
            @foreach ($recipeIngredients as $ingredient)
            <li>{{ $ingredient->name }} - {{ $ingredient->pivot->amount }}</li>
        @endforeach
        </ul>
        </div>
    </div>
</section>
{{-- <div class="mx-[70px]">
<section class="flex items-center justify-center top-2 py-8 pb-8 border-b-2">
    <div class="">
        <h1 class="text-[40px] leading-relaxed font-semibold mb-6">
            Homemade Pumpkin Purée
        </h1>
        <div class="flex flex-row justify-center">
            <div class="w-full text-center border-r-2">
                <span class="inline-block text-[40px] ">5</span>
                <span class="block">Ingredients</span>
            </div>
            <div class="w-full text-center">
                <span class="inline-block text-[40px] ">{{$recipe->duration}}</span>
                <span class="block">Minutes</span>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="flex flex-row justify-center p-4 text-white font-semibold">
                <span class="m-2 px-4">
                    <button class="w-full bg-indigo-500 rounded-full p-2">Read Instruction</button>
                </span>
                <span class="m-2 px-4">
                    <button class="w-full bg-red-500 rounded-full p-2">Add to Bookmarks</button>
                </span>
            </div>

        </div>

    </div>
    <div class="ml-[40px]">
        <img src="https://lh3.googleusercontent.com/fIxM5_imEFhunBAUSyhHfw8Ha5ZxmuejEkGGagv7d77t1k5qDi1mO_1q8Ag_rLqvMo6AVl7d9r6TD59mUqOQIeI=w640-h640-c-rw-v1-e365" alt=""
        class="max-w-7xl w-[500px] h-[500px] rounded-xl ">
    </div>
</section>
<section class="py-8 border-b-2">
    <div class="">
        <div class="flex flex-row justify-between mb-4">
            <h1 class="text-2xl font-semibold">Ingredients</h1>
            <h5 class="uppercase text-xs">4 Servings</h5>
        </div>
        <div class="flex flex-col">
        <ul>
            @foreach ($ingredients as $ingredient)
            <li class="font-md my-2">{{ $ingredient->name }}</li>
            @endforeach
        </ul>
        </div>
    </div>
</section>
<section class="py-8 border-b-2">
    <div class="flex flex-col">
        <h1 class="text-2xl mb-8">Instructions</h1>
        <ol>
            @foreach ($instructions as $value)
            <li class="mb-4">
                <div class="flex flex-row">
                    <p>{{$value->step_number}}</p>
                    <span>{{$value->instruction}}</span>
                </div>
            </li>
            @endforeach


        </ol>
    </div>
</section>
</div> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"
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
                    <input type="text" class="hidden" name="recipes_id" value="{{ $recipes->id }}">
                    <button type="submit" onclick="HideElemenet()"  class=" bg-blue-500 hover:bg-blue-600 text-white font-semibold p-2 rounded-lg mt-2 w-1/2">
                        Post
                    </button>
                </form>
            </div>

        </div>

    </div> --}}

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
