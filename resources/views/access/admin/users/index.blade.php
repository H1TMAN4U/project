@extends('access.master')
@section('content')

{{-- <div class="py-12 w-full">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Email</th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    {{ $user->name }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    {{ $user->email }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex justify-end">
                                                    <div class="flex space-x-2">
                                                        <a href="{{ route('admin.users.show', $user->id) }}"
                                                            class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Roles</a>
                                                        <form
                                                            class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md"
                                                            method="POST"
                                                            action="{{ route('admin.users.destroy', $user->id) }}"
                                                            onsubmit="return confirm('Are you sure?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> --}}
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

                   <th scope="col" class="px-6 py-4 text-left ">
                       Permission name
                   </th>
                   <th scope="col" class="px-6 py-4 text-left ">
                        Email
                    </th>
                   <th scope="col" class="px-6 py-4 text-right ">
                       Action
                   </th>
               </tr>
           </thead>
           <tbody>
                @foreach ($users as $user)
                    <tr class="bg-white rounded border-t dark:bg-gray-800 dark:border-gray-900 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                {{ $user->email }}
                            </div>
                        </td>
                        <td class="px-6 py-4 float-right">
                            {{-- <a href="{{ route('admin.users.show', $user->id) }}"
                                class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Roles</a> --}}
                            <form
                                method="POST"
                                action="{{ route('admin.users.destroy', $user->id) }}"
                                onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <div>
                                    <button type="submit" class="font-semibold hover:font-bold px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md">
                                        Delete
                                    </button>
                                    <a href="{{ route('admin.users.show', $user->id) }}">
                                        <button type="button" class="font-semibold hover:font-bold px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md" type="submit">
                                            Edit
                                        </button>
                                    </a>
                                </div>


                                {{-- <a href="{{ route('admin.users.show', $user->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    Edit
                                </a> --}}
                            </form>
                            {{-- <form
                                class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md"
                                method="POST"
                                action="{{ route('admin.permissions.destroy', $value->id) }}"
                                onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <div class="flex flex-col items-center">
                                    <button class="font-semibold text-red-600 dark:text-red-600 hover:underline hover:font-bold" type="submit">Delete</button>
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        Delete
                                    </a>
                            </form> --}}
                            </div>
                        </td>
                    </tr>
                @endforeach
           </tbody>
       </table>
   </div>
</div>
@endsection
