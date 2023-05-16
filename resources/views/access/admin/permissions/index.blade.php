@extends('access.master')
@section('content')
<div class="bg-gray-100 flex flex-col rounded dark:bg-gray-800">
    <h1 class="border-b font-bold border-gray-600 mb-1 p-2">Permmisions</h1>
    <div class="m-2 p-4 bg-gray-200 rounded
        dark:bg-gray-700">
        <h1>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum, odio maxime. Sapiente distinctio
            pariatur rem odit illum tempora sequi repellat. Facilis nisi molestias ipsum laudantium incidunt cumque
            assumenda praesentium accusamus!</h1>
    </div>
</div>
<div class="bg-gray-100 my-2 p-2 rounded dark:bg-gray-800">
    {{-- <a href="{{ route('admin.permissions.create') }}" class="bg-gray-300 inline-flex items-center text-gray-700 uppercase  focus:outline-none hover:bg-gray-200 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Create</a> --}}
    <div class="relative overflow-x-auto sm:rounded">
       <table class="w-full text-sm text-gray-500 dark:text-gray-400">
           <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400 dark:border-gray-700">
               <tr>
                   <th scope="col" class="p-4 text-left ">
                       Permission name
                   </th>
                   <th scope="col" class="p-4 text-right ">
                       Action
                   </th>
               </tr>
           </thead>
           <tbody>
                @foreach ($permissions as $value)
                <tr class="bg-white rounded border dark:bg-gray-800 dark:border-gray-900 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td scope="row" class="p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $value->name }}
                        </td>
                    <td class="p-4 float-right">
                        <form class="" method="POST" action="{{ route('admin.permissions.destroy', $value->id) }}" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <div class="flex flex-col items-center">
                                <button class="font-semibold text-red-600 dark:text-red-600 hover:underline hover:font-bold" type="submit">Delete</button>
                                <a href="{{ route('admin.permissions.edit', $value->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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
