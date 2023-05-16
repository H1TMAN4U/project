@extends('access.master')
@section('content')
<div class="flex flex-col items-center my-1 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-7xl dark:border-gray-700 dark:bg-gray-900">
    <img class="m-4 w-full rounded-lg h-full md:h-[500px] md:w-[500px] md:rounded-none md:rounded" src="{{ asset('images/' . $recipe->img) }}" alt="">
    <div class="flex flex-col p-4 leading-normal items-center">

        <h5 class="mb-2 text-center text-4xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $recipe->name }}</h5>
        <div class="flex flex-row items-center text-yellow-300 p-2">
            @php
                $averageRating = $rating->avg('rating');
            @endphp

            <div class="relative flex items-center justify-center">
                <i class="fa-solid fa-star fa-5x"></i>
                <h1 class="absolute text-white font-black text-xl mt-1.5">{{ $averageRating }}</h1>
            </div>
        </div>
        <p class="mb-3 text-center font-normal text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint ipsam provident corrupti quibusdam et praesentium, corporis optio pariatur nostrum. Iusto, nam provident nihil corporis adipisci architecto quisquam, dolor ratione fugit sunt animi excepturi a, blanditiis quasi consectetur aspernatur? Quidem, pariatur!</p>
        <div class="flex flex-row justify-center items-center">
            <div class="flex flex-col text-center m-4">
                <p class="text-2xl">Ingredients</p>
                <span class="text-4xl">{{count($ingredients)}}</span>
            </div>
            <div class="flex flex-col text-center m-4">
                <p class="text-2xl">Minutes</p>
                <span class="text-4xl">{{$recipe->duration}}</span>
            </div>
        </div>
        <button type="button" data-users-id="{{ Auth::user()->id }}" data-recipes-id="{{ $recipe->id }}"
            class="create-bookmark text-white w-1/2 bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 my-5 mr-2 mb-2
            dark:bg-indigo-600 dark:hover:bg-indigo-700 focus:outline-none dark:focus:ring-blue-700">
            Bookmark
        </button>
    </div>
</div>

<div class="block md:max-w-7xl my-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
    <div class="my-5">
        <h5 class="text-left mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Ingredients</h5>
        @if (count($ingredients) > 0)
            @foreach ($ingredients as $value)
                <p class="font-semibold my-2 pl-4 text-gray-700 dark:text-gray-400">{{ $value->ingredient_name }} - {{ $value->amount }} {{ $value->measure_name }}</p>
            @endforeach
        @else
            <h1 class="bg-gray-100 my-2 py-2 font-semibold rounded-lg text-center dark:bg-gray-800">No Data Found</h1>
        @endif
    </div>
</div>

<div class="block md:max-w-7xl my-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
    <div class="my-5">
        @if (count($instructions) > 0)
            <h5 class="text-left mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Instructions</h5>
            @foreach ($instructions as $value)
                <p class="break-all	font-semibold my-2 pl-4 text-gray-700 dark:text-gray-400">
                    <span class=" font-bold text-gray-700 dark:text-gray-400">{{$value->step_number}}. Step - </span>{{$value->instruction}}
                </p>
            @endforeach
        @else
            <h1 class="bg-gray-100 my-2 py-2 font-semibold rounded-lg text-center dark:bg-gray-900">No Data Found</h1>
        @endif
    </div>
</div>

<div class="block w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
    <div class="bg-gray-50 flex flex-col rounded-t-lg dark:bg-gray-800">
        <h5 class="border-b border-gray-600 p-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Review</h5>
        <h1 class="bg-gray-100 border border-gray-200 font-normal text-gray-700 m-2 p-4 rounded-lg dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum, odio maxime. Sapiente distinctio pariatur
            rem odit illum tempora sequi repellat. Facilis nisi molestias ipsum laudantium incidunt cumque assumenda
            praesentium accusamus!
        </h1>
    </div>
    <div class=" py-4 px-2 border-t border-gray-600 dark:bg-gray-800">
        <form id="rating-form" class="flex flex-col bg-gray-100 items-center py-8 rounded-lg dark:bg-gray-900" method="POST">
            @csrf
            <div class="flex-row text-center p-2 text-gray-300">
                <label>
                    <input name="rating" class="hidden" type="checkbox" value="1" onclick="checkPrevious(this)">
                    <i class="fa fa-star fa-2xl"></i>
                </label>
                <label>
                    <input name="rating" class="hidden" type="checkbox" value="2" onclick="checkPrevious(this)">
                    <i class="fa fa-star fa-2xl"></i>
                </label>
                <label>
                    <input name="rating" class="hidden" type="checkbox" value="3" onclick="checkPrevious(this)">
                    <i class="fa fa-star fa-2xl"></i>
                </label>
                <label>
                    <input name="rating" class="hidden" type="checkbox" value="4" onclick="checkPrevious(this)">
                    <i class="fa fa-star fa-2xl"></i>
                </label>
                <label>
                    <input name="rating" class="hidden" type="checkbox" value="5" onclick="checkPrevious(this)">
                    <i class="fa fa-star fa-2xl"></i>
                </label>
                <h1 for="message" class="block mt-2 p-4 text-sm font-medium text-gray-900 dark:text-white">Your message</h1>

            </div>
            <textarea id="message" rows="3" name="review" class="block p-2.5 w-1/2 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>                <input type="hidden" name="recipes_id" value="{{ $recipe->id }}">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold p-2 rounded-lg mt-2 w-1/2
            dark:bg-indigo-600 dark:hover:bg-indigo-700">
                Post
            </button>
        </form>
    </div>
</div>
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
            <form id="rating-form" method="POST">
                @csrf
                <div class="flex-row text-center p-2 text-gray-300">
                    <label>
                        <input name="rating" class="hidden" type="checkbox" value="1" onclick="checkPrevious(this)">
                        <i class="fa fa-star fa-2xl"></i>
                    </label>
                    <label>
                        <input name="rating" class="hidden" type="checkbox" value="2" onclick="checkPrevious(this)">
                        <i class="fa fa-star fa-2xl"></i>
                    </label>
                    <label>
                        <input name="rating" class="hidden" type="checkbox" value="3" onclick="checkPrevious(this)">
                        <i class="fa fa-star fa-2xl"></i>
                    </label>
                    <label>
                        <input name="rating" class="hidden" type="checkbox" value="4" onclick="checkPrevious(this)">
                        <i class="fa fa-star fa-2xl"></i>
                    </label>
                    <label>
                        <input name="rating" class="hidden" type="checkbox" value="5" onclick="checkPrevious(this)">
                        <i class="fa fa-star fa-2xl"></i>
                    </label>
                    <h1 for="message" class="block p-4 text-sm font-medium text-gray-900 dark:text-white">Your message</h1>

                </div>
                <textarea id="message" rows="2" name="review" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                <input type="hidden" name="recipes_id" value="{{ $recipe->id }}">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold p-2 rounded-lg mt-2 w-full">
                    Post
                </button>
            </form>

        </div>
    @foreach ($rating as $value)
        <div class="flex flex-row">
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $value->rating)
                    <i class="pasive fas fa-star text-yellow-300"></i>
                @else
                    <i class="pasive fas fa-star text-gray-300"></i>
                @endif
            @endfor
            <span>{{ $value->name }}</span>
        </div>
    @endforeach
    </div>
</section>
</div> --}}
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <style>
        input[type="checkbox"]:checked+i:before {
            color: #ffd117;
        }
    </style>
        <script src="{{ asset('js/design.js') }}"></script>
        <script src="{{ asset('js/rating.js') }}"></script>
        <script src="{{ asset('js/bookmarks.js') }}"></script>
    </body>

    </html>
@endsection
