$(document).ready(function () {
    $('#create-recipe').submit(function (event) {
        // Prevent the form from submitting normally
        event.preventDefault();
        // Get the form data and add the file
        var formData = new FormData($(this)[0]);
        formData.append('img', $('input[type=file]')[0].files[0]);
        // Send the AJAX request to the server
        $.ajax({
            url: '/recipes/store-recipe',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function () {
                alert('Thank you! Your recipe has been added');
            },
            error: function (xhr, status, error) {
                alert('You failed');
            }

        });
    });
});
$('.delete-bookmark').click(function() {
    var userId = $(this).data('users-id');
    var recipeId = $(this).data('recipes-id');
    var url = '/recipes/delete-recipe/' + recipeId;

    $.ajax({
        method: 'delete',
        url: url,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: { users_id: userId, recipes_id: recipeId },
        success: function(response) {
            $('#recipe-'+recipeId).remove();
            alert('recipe is deleted!');
        },
        error: function(response) {
            alert('Failed to delete bookmark.');
        }
    });
});


