function DeleteBookmark() {
    var x = document.getElementsByClassName("delete");
    for (let i = 0; i < x.length; i++) {

    if (x[i].style.display === "block") {
        x[i].style.display = "none";
    }
    else {
        x[i].style.display = "block";
    }
    }
}


$('.create-bookmark').click(function() {
    var userId = $(this).data('users-id');
    var recipeId = $(this).data('recipes-id');
    $.ajax({
        method: 'POST',
        url: '/bookmarks/store',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: { users_id: userId, recipes_id: recipeId },
        success: function(response) {
        alert('Recipe bookmarked!');
        },
        error: function(response) {
        alert('Failed to bookmark recipe.');
        }
    });
});

$('.delete-bookmark').click(function() {
    var userId = $(this).data('users-id');
    var recipeId = $(this).data('recipes-id');
    $.ajax({
        method: 'delete',
        url: '/bookmarks/delete',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: { users_id: userId, recipes_id: recipeId },
        success: function(response) {
        alert('Bookmark deleted!');
        userId.remove();
        recipeId.remove();
        },
        error: function(response) {
        alert('Failed to delete bookmark.');
        }
    });
});

