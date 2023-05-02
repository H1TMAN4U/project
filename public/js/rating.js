function submit_rating() {
    const rating = $('input[name="rate"]:checked').val();
}
$(document).ready(function () {
    $('#rating-form').submit(function (event) {
        // Prevent the form from submitting normally
        event.preventDefault();

        // Get the form data
        var formData = $(this).serialize();
        // Send the AJAX request to the server
        $.ajax({
            url: '/rating',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

            type: 'POST',
            data: formData,


            success: function ({ rating }) {

                let stars = $(".pasive");
                for (let i = 0; i < stars.length; i++) {
                    let s = stars[i];
                    s.classList.remove("text-gray-300");
                    s.classList.remove("text-yellow-300");
                    if (i < rating) {
                        s.classList.add("text-yellow-300");
                    } else {
                        s.classList.add("text-gray-300");
                    }
                }

                alert('Thank you for your review!');
            },
            error: function (xhr, status, error) {
                alert('You failed');
            }

        });
    });
});
