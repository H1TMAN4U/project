@extends('access.master')
@section('content')

<div class="bg-white flex mb-12 py-8 px-4 flex-col lg:flex-row md:flex-col-reverse sm:flex-col-reverse items-center rounded-lg border
    dark:border-none dark:bg-gray-900">
    <div class="flex flex-col sm:mt-10 justify-between p-4 leading-normal">
        <h5 class="mb-2 text-5xl font-bold tracking-tight text-gray-900 dark:text-white">
            Lets start cooking with popular recipes
        </h5>
        <p class="mb-3 sm:my-5 text-lg font-normal text-gray-700 dark:text-gray-400">
            Want to learn how to cook but confused how to start? No need to worry again!
        </p>
        <x-primary-button
            href="/dashboard"
            type="button"
            class="justify-center self-center w-3/5">
            {{__('Get Started')}}
        </x-primary-button>
    </div>

    <img
    class="object-cover rounded min-w-[500px]"
    src="{{ asset('images/1837-diabetic-pecan-crusted-chicken-breast_JulAug20DF_clean-simple_061720.jpg') }}"
    alt="">
</div>



<div class="block text-center w-full p-6 bg-white border border-gray-200 rounded-t-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Highest Rated Recipes</h5>
    <p class="font-normal text-gray-700 dark:text-gray-400">We provide a variety of food and beverage recipes <br> with amazing taste from famous chefs</p>
</div>
<div class="block text-center w-full p-4 bg-white border border-gray-200 rounded-b-lg shadow
dark:bg-gray-800 dark:border-gray-700 ">
    @if (count($recipes) > 0)
        <div id="card" class="bg-gray-100 grid justify-center xl:grid-cols-6 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 xs:grid-cols-1 p-4 rounded-lg md:flex-row dark:bg-gray-900">
            @foreach ($recipes as $recipe)
                <div id="recipe-{{ $recipe->id }}" class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="w-full rounded-t-lg" src="{{ asset('images/' . $recipe->img) }}" alt="" />
                    </a>
                    <div class="p-5">
                        <div class="flex items-center justify-between">
                            <h5 class="mb-2 md:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $recipe->name }}
                            </h5>
                        </div>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise</p>
                        <a href="{{ route('show-recipe', $recipe->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-gray-300 flex justify-center md:grid-cols-4 my-2 py-2 rounded md:flex-row dark:bg-gray-800">
            <h1 class="text-center">No Data Found</h1>
        </div>
    @endif
</div>



@endsection






