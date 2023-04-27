<form type="get" action="{{ route('filtered-search') }}">
    @csrf
    {{-- <div class="flex flex-row w-full">
<div class="w-full">
<label for="recipe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select category</label>
<select id="recipe" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
<option selected disabled>Choose a user</option>
@foreach ($user as $value)
<option>{{$value->name}}</option>
@endforeach
</select>
</div>

<div class="w-full mx-1">
<label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select category</label>
<select id="category" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
<option selected disabled>Choose a category</option>
@foreach ($ingredients as $value)
<option>{{$value->name}}</option>
@endforeach
</select>
</div>

<div class="w-full">
<label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select category</label>
<select id="category" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
<option selected disabled>Choose a category</option>
@foreach ($category as $value)
<option>{{$value->name}}</option>
@endforeach
</select>
</div>
</div> --}}
    <div>
        <input name="search-recipes" type="text" id="search-recipes"
            class="w-full block mr-2 p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-gray-400 focus:border-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-600"
            placeholder="Search...">
    </div>
    <input type="submit" class="bg-blue-700 text-white p-2 rounded-lg mt-2 hover:bg-blue-800">
</form>
