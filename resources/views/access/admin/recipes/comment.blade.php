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
function editComment(commentId) {
    var updateForm = document.getElementById('update-' + commentId);
    updateForm.classList.toggle('hidden');

    // Toggle the readonly attribute of the content input field
    var contentInput = document.getElementById('updateContent_' + commentId);
    contentInput.readOnly = !contentInput.readOnly;
}
</script>
