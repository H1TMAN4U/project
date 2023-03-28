<x-admin-layout>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/dark-light-mode.js'])
{{--
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 pb-8 h-auto break-all" style="width: 100%;">
        <div class="grid grid-cols-2 flex w-full rounded-t-lg dark:bg-gray-800" style="height:60vh">
            <div class="m-8">
                @foreach ($recipes as $value)
                    <img class="flex justify-center	w-full rounded-lg h-auto" src="{{ asset('images/' . $value->img) }}" alt="">
                @endforeach
            </div>
            <div class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 m-8 pr-4 w-full break-normal">
                <div>
                    @foreach ($recipes as $value)
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{$value->name}}</h3>
                    <p class="my-4 font-light">{{$value->descriptions}}</p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="flex flex-col p-8 text-left rounded-b-lg md:rounded-br-lg dark:bg-gray-800 " style="width: 100%; height: 40vh;">
            <div class="max-w-2xl text-gray-500 dark:text-gray-400">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Efficient Collaborating</h3>
                <p class="my-4 font-light">You have many examples that can be used to create a fast prototype for your team."</p>
            </div>
            <div class="flex space-x-3">
                @foreach($recipes as $value)
                    <img class="rounded-full w-9 h-9" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/joseph-mcfall.png" alt="profile picture">
                    <div class="space-y-0.5 font-medium dark:text-white text-left">
                @endforeach
                <div class="text-sm font-light text-gray-500 dark:text-gray-400">CTO at Google</div>
                </div>
            </div>
        </div>
    </main> --}}

    {{-- @foreach($recipes as $recipe)
        @foreach($recipe->ingredients as $value)
        <div>{{$value?|}}</div>
        @endforeach
    @endforeach --}}

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 pb-8 break-all" style="width: 100%; height:auto;">
        <div class="bg-gray-50 p-4 w-full overflow-x-auto relative shadow-md sm:rounded-lg break-all my-8 dark:bg-gray-800">
            <div class="p-4">

                @foreach ($recipes as $value)
                    <div class="py-8">
                        <h1 class="pb-2 font-semibold text-gray-900 dark:text-white dark:border-b-2 dark:border-indigo-700" style="font-size: 45px">{{$value->name}}</h1>
                        <p class="my-2 font-light break-all">{{$value->descriptions}}</p>

                    </div>

                    <div class="bg-gray-100 grid grid-cols-2 gap-2 p-6 rounded-lg dark:bg-gray-900">
                        <div class="rounded-lg">
                            <img class="flex justify-center rounded-lg" src="{{ asset('images/' . $value->img) }}" alt="" width="600" style="height: 900px" >
                        </div>
                        <div class=" ">
                            @foreach($recipes as $recipe)
                            <div class="pl-4 break-normal ">
                                <h1 class=" text-black pb-4 dark:text-gray-300" style="font-size: 28px;">Used ingredients</h1>
                                @foreach($recipe->ingredients as $value)
                                    <div class="bg-gray-200 hover:bg-gray-300 rounded-lg my-1 p-1.5 w-1/2 dark:bg-gray-900 dark:bg-indigo-800 dark:hover:bg-indigo-700">
                                        <h1 class="uppercase">{{$value}}</h1>
                                    </div>
                                @endforeach
                                <p class="my-4 text-gray-900 break-all dark:text-gray-300 ">{{$recipe->instructions}}</p>

                            </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </div>


</x-admin-layout>
