@foreach ($recipe->comments()->orderBy('created_at', 'desc')->get() as $comment)
<div id="parent-div">
    <ul>
        @if (!$comment->parent_comment_id)
        <li id="parentComment_{{$comment->id}}" class="bg-gray-50 border border-gray-200 rounded-lg p-4 dark:border-gray-600 dark:bg-gray-800">
            <div class="flex flex-row items-center justify-between">
                @if ($comment->user)
                <ul>
                    <h1 class="font-semibold">{{ $comment->user->name }}</h1>
                </ul>
                <ul>
                    <a data-toggle=".update-comment-btn">
                    <button onclick="editComment({{ $comment->id }})" class="text-blue-500 hover:text-blue-600 font-semibold">
                        Edit
                    </button>
                    </a>

                    <button onclick="deleteComment('parentComment_{{ $comment->id }}')" class="text-red-500 hover:text-red-600 font-semibold">
                        Delete
                    </button>
                </ul>
                @endif
            </div>
            <form id="updateForm_{{ $comment->id }}" action="{{ route('comments.update', ['id' => $comment->id]) }}" method="POST" class="">
                @csrf
                @method('PUT')

                <div class="flex gap-1 flex-row items-center bg-white border-0 border-b-2 border-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-700 focus:border-gray-200 peer">
                    <input readonly name="content" id="updateContent_{{ $comment->id }}" value="{{ $comment->content }}"
                    class="block bg-transparent py-2.5 px-0 w-full text-sm text-gray-500 focus:outline-none focus:ring-0 wrap">
                    <input type="hidden" name="users_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="recipes_id" value="{{ $recipe->id }}">
                    <a href="">
                        <button id="update-{{ $comment->id }}" type="submit"
                        class=" hidden text-blue-500 hover:text-blue-600 font-semibold">
                            Update
                        </button>
                    </a>

                </div>
            </form>
            <button type="submit" class="text-gray-600 hover:text-white font-semibold" onclick="toggleReplyForm({{ $comment->id }})">
                Reply
            </button>
            <div id="replyForm_{{ $comment->id }}" class="hidden mt-4">
                <form class="reply-form" action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <div>
                        {{-- <label for="replyContent_{{ $comment->id }}" class="block font-semibold">Reply:</label> --}}
                        <textarea name="content" id="replyContent_{{ $comment->id }}" rows="3" required class="w-full border border-gray-200 rounded-lg px-4 py-2 bg-gray-700"></textarea>
                    </div>
                    <input type="hidden" name="users_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="recipes_id" value="{{ $recipe->id }}">
                    <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 mt-2">Post Reply</button>
                </form>
            </div>









            <!-- Display child comments recursively -->
            <ul class="mt-2 space-y-1">
                @foreach ($comment->childComments as $childComment)
                <li id="childComment_{{ $childComment->id }}" class="bg-gray-50 border border-gray-200 rounded-lg p-2 dark:border-gray-600 dark:bg-gray-800 ml-8 mt-2">
                    <div class="flex items-center mb-2">
                        @if ($childComment->user)
                        <img src="{{ $childComment->user->avatar }}" alt="{{ $childComment->user->name }}" class="w-6 h-6 rounded-full mr-2">
                        <span class="font-semibold">{{ $childComment->user->name }}</span>
                        @else
                        <span class="font-semibold">Anonymous User</span>
                        @endif
                    </div>
                    <p class="text-gray-700 dark:text-gray-300">{{ $childComment->content }}</p>
                    <button onclick="deleteComment('childComment_{{ $childComment->id }}')">Delete</button>
                    <button class="text-blue-500 hover:text-blue-600 font-semibold mt-2" onclick="toggleReplyForm('{{ $childComment->id }}')">Reply</button>
                    <div id="replyForm_{{ $childComment->id }}" class="hidden mt-4">
                        <form class="reply-form" action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <div>
                                <label for="replyContent_{{ $childComment->id }}" class="block font-semibold">Reply:</label>
                                <textarea name="content" id="replyContent_{{ $childComment->id }}" rows="3" required
                                    class="w-full border border-gray-200 rounded-lg px-4 py-2 dark:bg-gray-700 dark:border-gray-600"></textarea>
                            </div>
                            <input type="hidden" name="users_id" value="{{ Auth::id() }}">
                            <input type="hidden" name="recipes_id" value="{{ $recipe->id }}">
                            <input type="hidden" name="parent_comment_id" value="{{ $childComment->id }}">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 mt-2">Post Reply</button>
                        </form>
                    </div>

                </li>
                @endforeach
            </ul>

        </li>
        @endif
    </ul>

</div>
@endforeach
<script>


    function updateComment(commentId) {
    // Retrieve the updated content from the input field
    var updatedContent = document.getElementById('updateContent_' + commentId).value;

    // Perform an AJAX request to update the comment
    // Replace the URL and method with the appropriate values for your application
    fetch('/comments/' + commentId, {
        method: 'PUT',
        headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        body: JSON.stringify({ content: updatedContent })
    })
    .then(function(response) {
        // Handle the response, e.g., show a success message or refresh the page
        console.log('Comment updated successfully!');
        location.reload(); // Refresh the page to reflect the updated comment
    })
    .catch(function(error) {
        // Handle any errors that occurred during the request
        console.error('An error occurred while updating the comment:', error);
    });
    }

    function editComment(commentId) {
        var updateForm = document.getElementById('update-' + commentId);
  updateForm.classList.toggle('hidden');

  // Toggle the readonly attribute of the content input field
  var contentInput = document.getElementById('updateContent_' + commentId);
  contentInput.readOnly = !contentInput.readOnly;
}


     $(document).ready(function () {
        // Submit comment form
        $('#commentForm').submit(function (event) {
            event.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    $('#commentForm')[0].reset();
                    fetchComments(); // Fetch comments after successful submission
                }
            });
        });

        // Submit reply form
        $(document).on('submit', '.reply-form', function (event) {
            event.preventDefault();

            var form = $(this);

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function (response) {
                    form[0].reset();
                    fetchComments(); // Fetch comments after successful submission
                }
            });
        });

        // Fetch comments
        $('#fetch-comments-button').click(function () {
            fetchComments();
        });

        function fetchComments() {
            $.ajax({
                url: '{{ route("fetch.comments", $recipe->id) }}',
                type: 'GET',
                success: function (response) {
                    var commentsContainer = $('#comments-container');
                    commentsContainer.empty();
                    commentsContainer.html(response);
                }
            });
        }
});
    function deleteComment(commentId) {
        if (confirm('Are you sure you want to delete this comment?')) {
            // Perform AJAX request to delete the comment
            $.ajax({
                url: '/comments/' + commentId.replace('parentComment_', '').replace('childComment_', ''),
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Remove the comment from the DOM
                    $('#' + commentId).remove();

                    // Remove child comments recursively
                    $('.childComment_' + commentId).remove();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
    }
    function toggleReplyForm(commentId) {
        const formId = `#replyForm_${commentId}`;
        const formElement = document.querySelector(formId);
        formElement.classList.toggle('hidden');
    }
</script>
