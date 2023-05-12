$('.delete-btn').click(function () {
    var ingredientId = $(this).data('ingredients-id');
    var checkboxId = $(this).data('checkbox-id'); // Add this line to get the checkbox ID

    $.ajax({
        method: 'delete',
        url: '/ingredient/delete/' + ingredientId,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            $('#container-for-' + ingredientId).remove();
            $('#list-id-' + ingredientId + ' input[type="checkbox"]').prop('checked', false); // Uncheck the corresponding checkbox
            $('#' + checkboxId).prop('checked', false); // Uncheck the checkbox
            alert('Ingredient deleted!');
        },
        error: function (response) {
            alert('Failed to delete ingredient.');
        }
    });
});
