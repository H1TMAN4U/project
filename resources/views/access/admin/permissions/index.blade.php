@extends('access.master')
@section('content')
<div class="bg-gray-100 flex flex-col rounded dark:bg-gray-800">
    <h1 class="font-bold border-b border-gray-600 flex flex-row justify-between items-center p-2">
        Permissions
    </h1>
    <div class="m-2 p-4 bg-gray-200 rounded
        dark:bg-gray-700">
        <h1>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum, odio maxime. Sapiente distinctio
            pariatur rem odit illum tempora sequi repellat. Facilis nisi molestias ipsum laudantium incidunt cumque
            assumenda praesentium accusamus!
        </h1>
    </div>
</div>
<div class="bg-gray-100 my-2 p-2 rounded dark:bg-gray-800">
    {{-- <a href="{{ route('admin.permissions.create') }}" class="bg-gray-300 inline-flex items-center text-gray-700 uppercase  focus:outline-none hover:bg-gray-200 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Create</a> --}}
    <div class="relative overflow-x-auto sm:rounded border border-gray-300 dark:border-gray-900">
        <table class="w-full text-sm text-gray-500 dark:text-gray-400">
           <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400 dark:border-gray-700">
               <tr>
                   <th scope="col" class="p-4 text-left ">
                       Permission name
                   </th>
                   <th scope="col" class="p-4 w-1/5 text-center ">
                       Action
                   </th>
               </tr>
           </thead>
           <tbody>
                @foreach ($permissions as $value)
                    <tr class="bg-white rounded border-t dark:bg-gray-800 dark:border-gray-900 hover:bg-gray-50 dark:hover:bg-gray-700 duration-500 transition ease-in-out">
                        <td scope="row" class="p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $value->name }}
                        </td>
                        <td class="p-4 w-1/5">
                            <form class="" method="POST" action="{{ route('admin.permissions.destroy', $value->id) }}" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <div class="flex flex-row items-center justify-center gap-2">
                                    <a href="{{ route('admin.permissions.edit', $value->id) }}">
                                        <button
                                        type="button"
                                        class="block px-2 py-1 rounded hover:bg-gray-100 text-black duration-500 transition ease-in-out dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">
                                        <i class="fa-solid fa-pen-to-square fa-md"></i>
                                    </button>
                                    </a>
                                    <button
                                        class="block px-2 py-1 rounded hover:bg-red-600 text-black hover:text-white duration-500 transition ease-in-out dark:text-gray-400 dark:hover:text-white"
                                        type="submit">
                                        <i class="fa-solid fa-trash fa-md"></i>
                                    </button>
                            </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
           </tbody>
       </table>
   </div>
</div>



@endsection
