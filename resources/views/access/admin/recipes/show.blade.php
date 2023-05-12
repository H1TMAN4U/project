@extends('access.master')
@section('content')
{{-- <section class="py-4 border-b-2">
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
</section> --}}
<div class="mx-[70px]">
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
                    <button data-users-id="{{ Auth::user()->id }}" data-recipes-id="{{ $recipe->id }}"
                        class="create-bookmark w-full bg-red-500 rounded-full p-2">Add to Bookmarks</button>
                </span>
            </div>

        </div>

    </div>
    <div class="ml-[40px]">
        <img  src="{{ asset('images/' . $recipe->img) }}" alt=""
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
            @foreach ($recipeIngredients as $ingredient)
            <li>{{ $ingredient->name }} - {{ $ingredient->pivot->amount }}</li>
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
<section class="py-8">
    <div class="bg-gray-100 flex flex-col rounded dark:bg-gray-800">
        <div class="border-b border-gray-600 mb-1">
            <div class="text-gray-700 flex flex-row justify-between items-center mb-1 p-2 dark:text-gray-200">
                <h1><b>Comments</b></h1>
            </div>
        </div>
        <div class="m-2 p-4 bg-gray-200 rounded dark:bg-gray-700">
            <h1>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum, odio maxime. Sapiente distinctio pariatur
                rem odit illum tempora sequi repellat. Facilis nisi molestias ipsum laudantium incidunt cumque assumenda
                praesentium accusamus!
            </h1>
        </div>
        <div class="py-8 px-2 border-t border-gray-600">
            <form id="rating-form" method="POST" action="/rating">
            @csrf
            <div class="flex-row text-center p-2 text-gray-300">
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
                <h1 for="message" class="block p-4 text-sm font-medium text-gray-900 dark:text-white">Your message</h1>

            </div>
            <textarea iid="message" rows="2" name="review" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
            <input type="text" class="hidden" name="recipes_id" value="{{ $recipe->id }}">
            <button type="submit"  class="bg-blue-500 hover:bg-blue-600 text-white font-semibold p-2 rounded-lg mt-2 w-full">
                Post
            </button>
            </form>
        </div>

    </div>
</section>
</div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <style>
        input[type="checkbox"]:checked+i:before {
            color: #ffd117;
        }
    </style>


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
