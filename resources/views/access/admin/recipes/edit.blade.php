@extends('access.master')
@section('content')
    <style>
        .disable
        {
            pointer-events: auto;
            color: rgb(106, 0, 255);
        }
    </style>
    <div class="bg-gray-100 flex flex-col rounded
    dark:bg-gray-800">
        <div class="border-b border-gray-600 mb-1 py-1">
            <div class="text-gray-700 flex flex-row justify-between items-center mb-1 p-2
            dark:text-gray-200">
                <h1><b>Edit Recipes</b></h1>
            </div>
        </div>
        <div class="m-2 p-4 bg-gray-200 rounded
        dark:bg-gray-700">
            <h1>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum, odio maxime. Sapiente distinctio pariatur
                rem odit illum tempora sequi repellat. Facilis nisi molestias ipsum laudantium incidunt cumque assumenda
                praesentium accusamus!</h1>
        </div>
    </div>

    <div class="mt-4 p-2 h-full bg-gray-100 flex flex-col rounded dark:bg-gray-800">

        <form method="post" action="{{ route('update-recipe', $recipes->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                    <li class="mr-2">
                        <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true" class="inline-block p-4 text-blue-600 rounded-tl-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Step 1</button>
                    </li>
                    <li class="mr-2">
                        <button id="services-tab" data-tabs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Step 2</button>
                    </li>
                    <li class="mr-2">
                        <button id="statistics-tab" data-tabs-target="#statistics" type="button" role="tab" aria-controls="statistics" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Step 3</button>
                    </li>
                    <li class="mr-2">
                        <button id="image-tab" data-tabs-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Step 4</button>
                    </li>
                </ul>

                <div id="defaultTabContent">

                    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">
                        <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Powering innovation & trust at 200,000+ companies worldwide</h2>
                        <p class="mb-3 text-gray-500 dark:text-gray-400">Empower Developers, IT Ops, and business teams to collaborate at high velocity. Respond to changes and deliver great customer and employee service experiences fast.</p>
                        <div class="grid gap-6 mb-6 md:grid-cols-3">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recipes name</label>
                                <input type="text" id="name" name="name" value="{{$recipes->name}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter recipes name" >
                            </div>
                            <div>
                                <label for="duration" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Preparation Time</label>
                                <input value="{{ $recipes->duration }}" type="text" id="duration" name="duration" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="time" >
                                @error('duration')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an category</label>
                                <select id="category" name="category_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="{{ $recipes->category->id }}" selected>{{ $recipes->category->name }}</option>
                                    @foreach ($category as $value)
                                        <option value="{{ $value->id }}" required>{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="descriptions" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recipes description</label>
                            <textarea id="descriptions" name="descriptions" id="descriptions" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your discription here...">{{$recipes->descriptions}}</textarea>
                        </div>




                    </div>
                    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services" role="tabpanel" aria-labelledby="services-tab">
                        <h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">Instruction</h2>
                        <!-- List -->
                        <div class="">
                            <div id="instruction-steps" class="grid grid-col-1 gap-4">
                                @foreach($recipes->instructions as $instruction)

                                    <div id="instruction-{{ $instruction->id }}" class="instruction-step">
                                        <label for="instruction-{{ $instruction->id }}-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Step {{ $instruction->step_number }}:</label>
                                        <div class="relative my-2">
                                            <input type="text" id="instruction-{{ $instruction->id }}-input" name="instructions[{{ $instruction->step_number }}]" value="{{ $instruction->instruction }}" placeholder="Step"
                                            class="instruction-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pr-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <button data-instruction-id="{{ $instruction->id }}"
                                                class="delete-instruction-btn absolute inset-y-0 right-0 flex items-center {{ $instruction->step_number == 1 ? 'step-1' : '' }}"
                                                {{ $instruction->step_number == 1 ? 'disabled' : '' }}>
                                                <svg class=" rounded-full w-5 h-5 mx-2 {{ $instruction->step_number == 1 ? 'text-gray-400' : 'text-red-500' }} flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <button id="add-instruction-step" type="button">Add step</button>
                        </div>
                    </div>
                    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="statistics" role="tabpanel" aria-labelledby="statistics-tab">
                            <div class="mb-2">
                                <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                                    class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    type="button">Choose recipes ingredients</button>
                                <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow dark:bg-gray-700">
                                    <div class="p-3">
                                        <label for="input-group-search" class="sr-only">Search</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                                <div class="relative w-full">
                                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                            fill="currentColor" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </div>
                                                    <input id="input-group-search" type="text"
                                                        class="w-full block mr-2 p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-gray-400 focus:border-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-600"
                                                        placeholder="Search your ingredient/s">
                                                </div>

                                        </div>
                                    </div>
                                    <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownSearchButton">
                                        @foreach ($ingredients as $value)
                                        <li id="list-id-{{ $value->id }}">

                                            <div class="flex items-center p-1 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                {{-- @if (in_array($value->id,$selectedIngredients)==true) --}}
                                                <input id="checkbox-item-{{ $value->id }}" type="checkbox" name="ingredients[]" value="{{ $value->id }}"
                                                    class="input-checkbox ingredient-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                                    @if (in_array($value->id, $selectedIngredients)) checked @endif>

                                                <label for="checkbox-item-{{ $value->id }}" class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $value->name }}</label>
                                                {{-- @endif --}}
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        <div class="grid md:grid-cols-1 gap-2 text-white font-semibold" id='values'>

                        @foreach ($recipe_ingredients as $ingredient)

                            <div id="container-for-{{ $ingredient->id }}" class="flex flex-row">
                                <div class="flex items-center justify-center w-full p-2 bg-indigo-600 rounded-l-lg">
                                    <h1>{{ $ingredient->name }}</h1>
                                </div>
                                <div class="relative flex flex-row">
                                    <input type="text" name="amount[]" value="{{ $ingredient->amount }}" class="instruction-input bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Amount">
                                    <select id="measure" name="measure[]" class="bg-gray-50 border text-gray-800 border-gray-300 text-xs rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="{{ $ingredient->measures_id }}" selected>{{ $ingredient->measure_name }}</option>
                                        @foreach ($measures as $measure)
                                            <option value="{{ $measure->id }}">{{ $measure->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-sm btn-danger delete-ingredient" data-ingredient-id="{{ $ingredient->id }}">
                                        <svg class="w-5 h-5 ml-2 mr-1.5 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>

                                </div>
                            </div>
                        @endforeach



                        </div>
                    </div>
                    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="image" role="tabpanel" aria-labelledby="image-tab">
                        <div class="mb-6">
                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file"
                                    class="bg-gray-50 flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" name="img" type="file" class="hidden" />
                                </label>
                            </div>
                        </div>

                        <div>
                            <input type="hidden" name="hidden_id" value="{{ $recipes->id }}" />
                            <button type="submit"
                                class="bg-gray-900 border border-gray-300 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-blue-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">submit
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800">
                    <button id="prevButton" type="button" class="px-4 py-2 text-sm font-medium text-gray-500 bg-gray-200 rounded-lg hover:bg-gray-300 dark:text-gray-400 dark:bg-gray-700 dark:hover:bg-gray-600">Previous</button>
                    <button id="nextButton" type="button" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">Next</button>
                </div>
            </div>
            </form>

    </div>
    <script src="{{ asset('js/edit.js') }}"></script>

<script>
//     $(document).ready(function() {
//     $(document).on('click', '.delete-ingredient', function(event) {
//         event.preventDefault(); // Prevent form submission

//         let ingredientId = $(this).data('ingredient-id');
//         let recipeId = {{ $recipes->id }};
//         let ingredientItem = $(this).closest('.ingredient-item'); // Get the ingredient item element

//         $.ajax({
//             type: 'DELETE',
//             url: '/recipes/' + recipeId + '/ingredients/' + ingredientId,
//             headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
//             success: function(response) {
//                 alert(response.message);
//                 // Remove the deleted ingredient from the DOM
//                 ingredientItem.remove();
//             },
//             error: function(response) {
//                 alert('An error occurred while deleting the ingredient');
//             }
//         });
//     });
// });
// $(document).on('click', '.delete-ingredient', function() {
//     event.preventDefault();

//     let ingredientId = $(this).data('ingredient-id');
//     let recipeId = {{ $recipes->id }};

//     $.ajax({
//         type: 'DELETE',
//         url: '/recipes/' + recipeId + '/ingredients/' + ingredientId,
//         headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

//         success: function(response) {
//             alert(response.message);
//             // Reload the page to show the updated ingredient list
//             location.reload();
//         },
//         error: function(response) {
//             alert('An error occurred while deleting the ingredient');
//         }
//     });
// });
// $(document).on('click', '.delete-ingredient', function(event) {
//     event.preventDefault();

//     let ingredientId = $(this).data('ingredient-id');
//     let recipeId = {{ $recipes->id }};

//     // Get the ingredient item element
//     let ingredientItem = $('#container-for-' + ingredientId);

//     // Send an AJAX request to remove the ingredient from the database
//     $.ajax({
//         type: 'DELETE',
//         url: '/recipes/' + recipeId + '/ingredients/' + ingredientId,
//         headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
//         success: function(response) {
//             alert(response.message);
//             // Remove the ingredient item from the DOM
//             ingredientItem.remove();
//             // Uncheck the corresponding checkbox
//             $('#checkbox-item-' + ingredientId).prop('checked', false);
//         },
//         error: function(response) {
//             alert('An error occurred while deleting the ingredient');
//         }
//     });
// });




$(document).on('click', '.remove-instruction-step', function() {
  $(this).closest('.instruction-step').remove();
});
// $(".input-checkbox").change(function() {
//     var id = $(this).attr("id");
//     var isChecked = $(this).prop("checked");
//     var name = $(`label[for="${id}"]`).text(); // Get the name value
//     if (isChecked) {
//         $('#values').append(`
//             <div id="container-for-${id}" class="flex flex-row">
//                 <div class="flex items-center justify-center w-full p-2 bg-indigo-600 rounded-l-lg">
//                     <h1>${name}</h1>
//                 </div>
//                 <div class="relative flex flex-row">
//                     <input type="text" name="amount[]" class="instruction-input bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Amount">
//                     <select id="measure" name="measure[]" class="bg-gray-50 border text-gray-800 border-gray-300 text-xs rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
//                         <option>Enter meatric</option>
//                         @foreach ($measures as $measure)
//                             <option value="{{ $measure->id }}" required>{{ $measure->name }}</option>
//                         @endforeach
//                     </select>

//                     <button type="button" data-checkbox-id="${id}" class="uncheck-btn absolute inset-y-0 right-0 flex items-center px-1 text-red-500 border border-l-0 border-transparent">
//                         <svg class="w-4 h-4 ml-2 mr-1.5 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
//                     </button>
//                 </div>
//             </div>
//         `);
//     }
//     else {
//     $(`#values [data-checkbox-id="${id}"]`).parent().remove();
//     $(`#container-for-${id}`).remove(); // Remove the corresponding container div
//     }
// });

// // Event delegation for dynamically added elements
// $('#values').on('click', '.uncheck-btn', function() {
//     var checkboxId = $(this).data("checkbox-id");
//     $(`#${checkboxId}`).prop("checked", false);
//     $(this).parent().remove();
//     $(`#container-for-${checkboxId}`).remove(); // Remove the corresponding container div
//     // Perform any additional actions if needed
// });
$(document).on('click', 'li[id^="list-id-"]', function() {
    var ingredientId = $(this).attr('id').replace('list-id-', '');
    var checkbox = $('#checkbox-item-' + ingredientId);
    var container = $('#container-for-' + ingredientId);

    if (checkbox.is(':checked')) {
        if (container.length === 0) {
            // Append the ingredient item container to the values container
            var containerHTML = `
                <div id="container-for-${ingredientId}" class="flex flex-row">
                    <div class="flex items-center justify-center w-full p-2 bg-indigo-600 rounded-l-lg">
                        <h1>${checkbox.next('label').text()}</h1>
                    </div>
                    <div class="relative flex flex-row">
                        <input type="text" name="amount[]" class="instruction-input bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Amount">
                        <select id="measure" name="measure[]" class="bg-gray-50 border text-gray-800 border-gray-300 text-xs rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option>Enter metric</option>
                            @foreach ($measures as $measure)
                                <option value="{{ $measure->id }}" required>{{ $measure->name }}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn btn-sm btn-danger delete-ingredient" data-ingredient-id="{{ $ingredient->id }}">
                            <svg class="w-5 h-5 ml-2 mr-1.5 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            `;

            $('#values').append(containerHTML);
        }
    } else {
        // Remove the ingredient item container from the values container
        container.remove(); // Remove the corresponding container div
    }
});



// // Event delegation for dynamically added elements
// $('#values').on('click', '.uncheck-btn', function() {
//     var checkboxId = $(this).data("checkbox-id");
//     var checkbox = $(`#checkbox-item-${checkboxId}`);
//     checkbox.prop("checked", false);

// $(this).parent().remove();
// $(#container-for-${checkboxId}).remove();
// });


</script>
    <script src="{{ asset('js/recipes.js') }}"></script>
    <script src="{{ asset('js/ingredients-search.js') }}"></script>
@endsection('content')
