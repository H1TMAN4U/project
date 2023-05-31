<section class="bg-white dark:bg-gray-900 py-8 lg:py-16">
    <div class="max-w-2xl mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion (20)</h2>
    </div>
    <form id="comment-form" action="{{ route('comments.store') }}" method="POST" class="my-4">
        @csrf
        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <label for="comment" class="sr-only">Your comment</label>
            <textarea
                id="comment"
                rows="6"
                name="content"
                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                placeholder="Write a comment..."
                required>
            </textarea>
        </div>
        <button type="submit"
            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Post comment
        </button>
        <input type="hidden" name="users_id" value="{{ Auth::id() }}">
        <input type="hidden" name="recipes_id" value="{{ $recipe->id }}">
        <input type="hidden" name="parent_comment_id" value="{{ $parentCommentId ?? null }}">
    </form>
    @foreach ($recipe->comments()->orderBy('created_at', 'desc')->get() as $comment)
    @if (!$comment->parent_comment_id)

        <article id="parent-{{ $comment->id }}" class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">
            <footer class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <img class="mr-2 w-6 h-6 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                            alt="Michael Gough">{{ $comment->user->name }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        <time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time>
                    </p>
                </div>
                <button id="dropdown-{{ $comment->id }}-Button"
                    data-dropdown-toggle="dropdown-{{ $comment->id }}"
                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    type="button">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                        </path>
                    </svg>
                    <span class="sr-only">Comment settings</span>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown-{{ $comment->id }}"
                    class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownMenuIconHorizontalButton">
                        <li>
                            <a href="#"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 delete-comment-button hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                data-comment-id="{{ $comment->id }}">Remove</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                        </li>
                    </ul>
                </div>
            </footer>
            <p class="text-gray-500 dark:text-gray-400">
                {{ $comment->content }}
            </p>
            <div class="flex items-center mt-4 space-x-4">
                <button type="button"
                    class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                    <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                        </path>
                    </svg>
                    Reply
                </button>
            </div>
        </article>
        @foreach($comment->childComments as $childComment)
            <article class="p-6 mb-6 ml-6 lg:ml-12 text-base bg-white rounded-lg dark:bg-gray-900">
                <footer class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-2 w-6 h-6 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                alt="Jese Leos">
                            {{ $childComment->user->name }}
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            <time pubdate datetime="2022-02-12" title="February 12th, 2022">Feb. 12, 2022</time>
                        </p>
                    </div>
                    <button id="dropdownComment-{{ $childComment->id }}-Button"
                        data-dropdown-toggle="dropdownComment-{{ $childComment->id }}"
                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        type="button">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                            </path>
                        </svg>
                        <span class="sr-only">Comment settings</span>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownComment-{{ $childComment->id }}"
                        class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownMenuIconHorizontalButton">
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 delete-comment-button hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-comment-id="{{ $childComment->id }}">Remove</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                            </li>
                        </ul>
                    </div>
                </footer>
                <p class="text-gray-500 dark:text-gray-400">Much appreciated! Glad you liked it ☺️</p>
                <div class="flex items-center mt-4 space-x-4">
                    <button type="button"
                        class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                        <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                        Reply
                    </button>
                </div>
            </article>
        @endforeach
        @endif
    @endforeach

</section>
@foreach ($recipe->comments()->orderBy('created_at', 'desc')->get() as $comment)
    <div id="parent-div" class="my-4">
        <ul>
            @if (!$comment->parent_comment_id)
            <li id="parentComment_{{$comment->id}}" class="bg-gray-50 border border-gray-200 rounded-lg p-4 dark:border-gray-600 dark:bg-gray-800">
                <div class="flex flex-row items-center justify-between">
                    @if ($comment->user)
                        <ul>
                            <h1 class="font-semibold">{{ $comment->user->name }}</h1>
                        </ul>
                        <ul>
                            <button onclick="editComment({{ $comment->id }})" class="text-blue-500 hover:text-blue-600 font-semibold">
                                Edit
                            </button>

                            <button onclick="deleteComment('parentComment_{{ $comment->id }}')" class="text-red-500 hover:text-red-600 font-semibold">
                                Delete
                            </button>
                        </ul>
                    @endif
                </div>
                <form id="updateForm_{{ $comment->id }}" action="{{ route('comments.update', ['id' => $comment->id]) }}" method="POST" class="">
                    @csrf
                    @method('PUT')

                    <div class="flex gap-1 flex-row items-center bg-white dark:bg-gray-800 dark:text-gray-400 peer">
                        <p id="commentContent_{{ $comment->id }}">{{ $comment->content }}</p>
                        <input type="text" id="updateContent_{{ $comment->id }}" value="{{ $comment->content }}" class="hidden block bg-transparent py-2.5 px-0 w-full text-sm text-gray-500 focus:outline-none focus:ring-0 wrap">
                        <input type="hidden" name="users_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="recipes_id" value="{{ $recipe->id }}">
                        <a href="#">
                            <button id="edit-{{ $comment->id }}" class="text-blue-500 hover:text-blue-600 font-semibold">
                                Edit
                            </button>
                        </a>
                        <a href="#">
                            <button id="update-{{ $comment->id }}" type="submit" class="hidden text-blue-500 hover:text-blue-600 font-semibold">
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
                        <div class="flex flex-row items-center justify-between">
                            @if ($childComment->user)
                            <ul>
                                <h1 class="font-semibold">{{ $childComment->user->name }}</h1>
                            </ul>
                            <ul>
                                <button onclick="editComment({{ $childComment->id }})" class="text-blue-500 hover:text-blue-600 font-semibold">
                                    Edit
                                </button>
                                <button onclick="deleteComment('childComment_{{ $childComment->id }}')" class="text-red-500 hover:text-red-600 font-semibold">
                                    Delete
                                </button>
                            </ul>
                            @endif
                        </div>
                        <form id="updateForm_{{ $childComment->id }}" action="{{ route('comments.update', ['id' => $childComment->id]) }}" method="POST" class="">
                            @csrf
                            @method('PUT')

                            <div class="flex gap-1 flex-row items-center bg-white border-0 border-b-2 border-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-700 focus:border-gray-200 peer">
                                <input readonly name="content" id="updateContent_{{ $childComment->id }}" value="{{ $childComment->content }}"
                                class="block bg-transparent py-2.5 px-0 w-full text-sm text-gray-500 focus:outline-none focus:ring-0 wrap">
                                <input type="hidden" name="users_id" value="{{ Auth::id() }}">
                                <input type="hidden" name="recipes_id" value="{{ $recipe->id }}">
                                <button id="update-{{ $childComment->id }}" type="submit"
                                class=" hidden text-blue-500 hover:text-blue-600 font-semibold">
                                    Update
                                </button>
                            </div>
                        </form>
                    </li>
                    @endforeach
                </ul>

            </li>
            @endif
        </ul>

    </div>
@endforeach
<script>
    $(document).ready(function() {
        // Edit button click event
        $('button[id^="edit-"]').click(function() {
            var commentId = $(this).attr('id').split('-')[1];
            // Show the input field and hide the paragraph
            $('#commentContent_' + commentId).hide();
            $('#updateContent_' + commentId).removeClass('hidden');
            // Show the update button
            $('#update-' + commentId).removeClass('hidden');
        });
    });
</script>

<script>

function editComment(commentId) {
    var updateForm = document.getElementById('update-' + commentId);
    updateForm.classList.toggle('hidden');

    // Toggle the readonly attribute of the content input field
    var contentInput = document.getElementById('updateContent_' + commentId);
    contentInput.readOnly = !contentInput.readOnly;
}
</script>
