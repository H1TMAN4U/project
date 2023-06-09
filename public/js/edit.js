$(document).ready(function() {
    $("#input-group-search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#dropdownSearch li").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
$(document).ready(function() {
    $('#add-instruction-step').click(function() {
        var instructionStep = `
            <div class="instruction-step">
                <label for="instructions" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Step</label>
                <div class="relative my-2">
                    <input type="text" name="instructions[]" class="instruction-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pr-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Step">
                    <button type="button" class="remove-instruction-step absolute inset-y-0 right-0 flex items-center text-gray-500 border border-l-0 border-transparent rounded-r-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <svg class="bg-white w-5 h-5 mx-2 rounded-full text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        `;

        $('#instruction-steps').append(instructionStep);
    });
});
