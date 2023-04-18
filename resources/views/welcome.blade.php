@extends('access.master')
@section('content')

        <div class="bg-white w-full dark:bg-gray-900">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" text-gray-900 dark:text-gray-100">

                    <div class="w-full p-2 break-all bg-white rounded flex lg:flex-row md:flex-row sm:flex-col-reverse dark:bg-gray-900" style="">
                        <div class="px-2 text-black flex flex-col lg:items-start md:items-start sm:mt-[30px] lg:justify-center md:justify-start sm:justify-center dark:text-white">
                            <h1 class="lg:text-[54px] md:text-[36px] sm:text-[32px] break-normal" style="font-family: 'Playfair Display', serif;">Lets start cooking with popular recipes</h1>
                            <p class="mt-4 text-gray-600 break-normal font-bold lg:text-[22px] md:text-[16px] sm:text-[18px]">Want to learn how to cook but confused how to start? <br> No need to worry again!</p>
                            <a href="/dashboard" type="button" class="text-white bg-red-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 my-4 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Get Started</a>
                        </div>
                        <div>
                            <img class="invert-0 dark:invert rounded" src="{{ asset('images/1837-diabetic-pecan-crusted-chicken-breast_JulAug20DF_clean-simple_061720.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="bg-gray-100 w-full dark:bg-gray-700" style="padding-top: 42px;">
                        <h1 class="text-center text-black dark:text-white" style="font-size: 42px; font-family: 'Playfair Display', serif;  margin-bottom: 18px;">Poular food</h1>
                        <p class="text-center text-gray-600 font-bold dark:text-white">We provide a variety of food and beverage recipes <br> with amazing taste from famous chefs</p>
                        <div class=" flex flex-row mt-16 p-4 justify-evenly	" style="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection







