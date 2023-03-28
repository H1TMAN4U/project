<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/dark-light-mode.js'])

	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 pb-8 break-all " style="width: 100%;">
        {{-- @if(count($data) > 0) --}}
        @foreach ($data as $value)
            <div class="my-2">
                <a href="show-full/{{$value->id}}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-full hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ asset('images/' . $value->img) }}" alt="" style="height: 192px; width: 192px;">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$value->name}}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$value->descriptions}}</p>
                    </div>
                </a>
            </div>
        @endforeach
        {{-- @else
        <tr class="bg-white border-b">
            <td colspan="5" class="text-center">No Data Found</td>
        </tr>
        @endif
        <div class="m-auto">
            {!! $data->links() !!}
        </div> --}}
	</div>


</x-app-layout>
