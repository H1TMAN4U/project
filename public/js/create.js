$(document).ready(function() {
    $('#duration').on('input', function() {
        var value = $(this).val();
        var durationError = $('#duration-error');
        if (value !== '' && isNaN(value)) {
            durationError.text('Please enter a valid number');
        } else {
            durationError.text('');
        }
    });
});
$(document).ready(function() {
    $("#input-group-search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#dropdownSearch li").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
$('#add-instruction-step').click(function() {
  $('#instruction-steps').append(`
    <div class="instruction-step">
      <label for="instructions" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Step</label>
      <div class="relative my-2">
        <input type="text" name="instructions[]" class="instruction-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pr-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="..." requered>
        <button type="button" class="remove-instruction-step absolute inset-y-0 right-0 flex items-center px-1 text-gray-500 border border-l-0 border-transparent rounded-r-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <svg class="w-4 h-4 ml-2 mr-1.5 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
        </button>
      </div>
    </div>
  `);
});
$(document).on('click', '.remove-instruction-step', function() {
  $(this).closest('.instruction-step').remove();
});
// $(document).ready(function() {
//     $(".input-checkbox").change(function() {
//         var id = $(this).attr("id");
//         var isChecked = $(this).prop("checked");
//         var name = $(`label[for="${id}"]`).text(); // Get the name value

//         if (isChecked) {
//             $('#values').append(`
//             <div id="container-for-${id}" class="flex flex-row">
//                 <div class="flex items-center justify-center w-full p-2 bg-indigo-600 rounded-l-lg">
//                     <h1>${name}</h1>
//                 </div>
//                 <div class="relative flex flex-row">
//                     <input type="text" name="amount[]" class="instruction-input bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
//                     dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Amount" requered>
//                     <select id="measure" name="measure[]" class="bg-gray-50 border text-gray-800 border-gray-300 text-xs rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
//                     <option class="" selected>Select a Measure</option>
//                     @foreach ($measure as $measure)
//                         <option value="{{ $measure->id }}" required>{{ $measure->name }}</option>
//                     @endforeach
//                 </select>
//                     <button type="button" data-checkbox-id="${id}"
//                     class="uncheck-btn absolute inset-y-0 right-0 flex items-center px-1 text-red-500 border border-l-0 border-transparent">
//                         <svg class="w-4 h-4 ml-2 mr-1.5 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
//                     </button>
//                 </div>
//             </div>
//             `);
//         }
//         else {
//             $(`#values [data-checkbox-id="${id}"]`).parent().remove();
//             $(`#container-for-${id}`).remove(); // Remove the corresponding container div
//         }
//     });

//     // Event delegation for dynamically added elements
//     $('#values').on('click', '.uncheck-btn', function() {
//         var checkboxId = $(this).data("checkbox-id");
//         $(`#${checkboxId}`).prop("checked", false);
//         $(this).parent().remove();
//         $(`#container-for-${checkboxId}`).remove(); // Remove the corresponding container div
//         // Perform any additional actions if needed
//     });
// });
