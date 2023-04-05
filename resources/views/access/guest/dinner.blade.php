@extends('access.master')
@section('content')

    <div class=" w-full my-2">
        <div class="grid justify-center md:grid-cols-4 my-2 py-2 bg-gray-800 rounded md:flex-row ">
            @if (count($recipes) > 0)

            @foreach ($recipes as $value)
                <div class="max-w-sm mx-2 my-1 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg" src="{{ asset('images/' . $value->img) }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 md:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise</p>
                        <a  href="/show-all/{{$value->id}}"  class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </div>
            @endforeach
            @else
            <div
                class="bg-gray-300 flex justify-center md:grid-cols-4 my-2 py-2 rounded md:flex-row
                            dark:bg-gray-800">
                <h1 class="text-center">No Data Found</h1>
            </div>
        @endif
        </div>
    </div>

@endsection