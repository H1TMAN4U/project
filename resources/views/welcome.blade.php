<x-admin-layout>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/dark-light-mode.js'])

        <div class="bg-white w-full dark:bg-gray-900">
            {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> --}}
                <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class=" text-gray-900 dark:text-gray-100">

                        <div class="p-6 break-all bg-white rounded flex flex-row dark:bg-gray-900" style="width: 100%;">
                            <div class="text-black flex flex-col items-start justify-center dark:text-white">
                                <h1 class="text-[24px] md:text-[56px] break-normal" style="font-family: 'Playfair Display', serif;">Lets start <br> cooking with popular recipes</h1>
                                <p class="mt-4 text-gray-600 break-normal font-bold">Want to learn how to cook but confused how to start?</p>
                                <p class="text-gray-600 break-normal font-bold">No need to worry again!</p>
                                <a href="/dashboard" type="button" class="text-white bg-red-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 my-4 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Get Started</a>
                            </div>
                            <div>
                                <img class="rounded" src="{{ asset('images/1837-diabetic-pecan-crusted-chicken-breast_JulAug20DF_clean-simple_061720.jpg') }}" alt="">
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
            {{-- </div> --}}
        </div>
</x-admin-layout>








