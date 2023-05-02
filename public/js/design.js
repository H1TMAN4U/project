$('a[data-toggle]').on('click', function() {
    var toggleSelector = $(this).data('toggle');
    $('.toggle-element').not(toggleSelector).hide();
    $(toggleSelector).toggle();
});
