@extends('access.master')
@section('content')
<div class="flex flex-col p-2 items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-7xl dark:border-gray-700 dark:bg-gray-900">
    <img class=" w-full rounded h-full md:h-[500px] md:w-[500px]" src="{{ asset('images/' . $recipe->img) }}" alt="">
    <div class="flex flex-col p-4 leading-normal items-center">

        <h5 class="mb-2 text-center text-4xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $recipe->name }}</h5>
        <div class="flex flex-row items-center text-yellow-300 p-2">
            @php
                $averageRating = $rating->avg('rating');
            @endphp

            <div class="relative flex items-center justify-center">
                <i class="fa-solid fa-star fa-5x"></i>
                <h1 class="absolute text-white font-black text-xl mt-1.5">{{ $averageRating }}</h1>
            </div>
        </div>
        <p class="mb-3 text-center font-normal text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint ipsam provident corrupti quibusdam et praesentium, corporis optio pariatur nostrum. Iusto, nam provident nihil corporis adipisci architecto quisquam, dolor ratione fugit sunt animi excepturi a, blanditiis quasi consectetur aspernatur? Quidem, pariatur!</p>
        <div class="flex flex-row justify-center items-center">
            <div class="flex flex-col text-center m-4">
                <p class="text-2xl">Ingredients</p>
                <span class="text-4xl">{{count($ingredients)}}</span>
            </div>
            <div class="flex flex-col text-center m-4">
                <p class="text-2xl">Minutes</p>
                <span class="text-4xl">{{$recipe->duration}}</span>
            </div>
        </div>
        <button type="button" data-users-id="{{ Auth::user()->id }}" data-recipes-id="{{ $recipe->id }}"
            class="create-bookmark text-white w-1/2 bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 my-5 mr-2 mb-2
            dark:bg-indigo-600 dark:hover:bg-indigo-700 focus:outline-none dark:focus:ring-blue-700">
            Bookmark
        </button>
    </div>
</div>

<div class="block md:max-w-7xl my-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
    <div class="my-5">
        <h5 class="text-left mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Ingredients</h5>
        @if (count($ingredients) > 0)
            @foreach ($ingredients as $value)
                <p class="font-semibold my-2 pl-4 text-gray-700 dark:text-gray-400">{{ $value->ingredient_name }} - {{ $value->amount }} {{ $value->measure_name }}</p>
            @endforeach
        @else
            <h1 class="bg-gray-100 my-2 py-2 font-semibold rounded-lg text-center dark:bg-gray-800">No Data Found</h1>
        @endif
    </div>
</div>

<div class="block md:max-w-7xl my-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
    <div class="my-5">
        @if (count($instructions) > 0)
            <h5 class="text-left mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Instructions</h5>
            @foreach ($instructions as $value)
                <p class="break-all	font-semibold my-2 pl-4 text-gray-700 dark:text-gray-400">
                    <span class=" font-bold text-gray-700 dark:text-gray-400">{{$value->step_number}}. Step - </span>{{$value->instruction}}
                </p>
            @endforeach
        @else
            <h1 class="bg-gray-100 my-2 py-2 font-semibold rounded-lg text-center dark:bg-gray-900">No Data Found</h1>
        @endif
    </div>
</div>

<div class="block w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
    <div class="bg-gray-50 flex flex-col rounded-t-lg dark:bg-gray-800">
        <h5 class="border-b border-gray-300 p-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white dark:border-gray-600">Review</h5>
        <h1 class="bg-gray-100 border border-gray-200 font-normal text-gray-700 m-2 p-4 rounded-lg dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum, odio maxime. Sapiente distinctio pariatur
            rem odit illum tempora sequi repellat. Facilis nisi molestias ipsum laudantium incidunt cumque assumenda
            praesentium accusamus!
        </h1>
    </div>
    <div class=" py-4 px-2 border-t border-gray-300 dark:bg-gray-800 dark:border-gray-600 ">
        <form id="rating-form" class="flex flex-col bg-gray-100 items-center py-8 rounded-lg dark:bg-gray-900" method="POST">
            @csrf
            <div class="flex-row text-center p-2 text-gray-300">
                <label>
                    <input name="rating" class="hidden" type="checkbox" value="1" onclick="checkPrevious(this)">
                    <i class="fa fa-star fa-2xl"></i>
                </label>
                <label>
                    <input name="rating" class="hidden" type="checkbox" value="2" onclick="checkPrevious(this)">
                    <i class="fa fa-star fa-2xl"></i>
                </label>
                <label>
                    <input name="rating" class="hidden" type="checkbox" value="3" onclick="checkPrevious(this)">
                    <i class="fa fa-star fa-2xl"></i>
                </label>
                <label>
                    <input name="rating" class="hidden" type="checkbox" value="4" onclick="checkPrevious(this)">
                    <i class="fa fa-star fa-2xl"></i>
                </label>
                <label>
                    <input name="rating" class="hidden" type="checkbox" value="5" onclick="checkPrevious(this)">
                    <i class="fa fa-star fa-2xl"></i>
                </label>
                <h1 for="message" class="block mt-2 p-4 text-sm font-medium text-gray-900 dark:text-white">Your message</h1>

            </div>
            <textarea id="message" rows="3" name="review" class="block p-2.5 w-1/2 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>                <input type="hidden" name="recipes_id" value="{{ $recipe->id }}">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold p-2 rounded-lg mt-2 w-1/2
            dark:bg-indigo-600 dark:hover:bg-indigo-700">
                Post
            </button>
        </form>
    </div>
</div>

<div class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-600">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
    <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>


<form id="commentForm" action="{{ route('comments.store') }}" method="POST" class="my-4">
    @csrf
    <div class="mb-4">
    <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
    <textarea name="content" id="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
    </div>
    <input type="hidden" name="users_id" value="{{ Auth::id() }}">
    <input type="hidden" name="recipes_id" value="{{ $recipe->id }}">
    <input type="hidden" name="parent_comment_id" value="{{ $parentCommentId ?? null }}">
    <button type="submit" class="btn btn-primary">Submit Comment</button>
</form>

<div id="comments-container" class="my-4">
    @include('access.admin.recipes.comment', ['recipe' => $recipe])
</div>
{{-- <div id="comments-container" class="my-4">
    <div id="comments" class="my-4">
        <h3 class="text-lg font-semibold">Comments:</h3>
        <ul id="ul-comments" class="mt-2 space-y-1">
            @foreach ($recipe->comments as $comment)
                <div id="parent-div" class="my-4">
                    @if (!$comment->parent_comment_id)
                    <li id="parentComment_{{$comment->id}}" class="bg-gray-50 border border-gray-200 rounded-lg p-4 dark:border-gray-600 dark:bg-gray-800">
                        <div class="flex items-center mb-2">
                            @if ($comment->user)
                            <img src="{{ $comment->user->avatar }}" alt="{{ $comment->user->name }}" class="w-8 h-8 rounded-full mr-2">
                            <span class="font-semibold">{{ $comment->user->name }}</span>
                            @else
                            <span class="font-semibold">Anonymous User</span>
                            @endif
                        </div>
                        <p class="text-gray-700 dark:text-gray-300">{{ $comment->content }}</p>
                        <button onclick="deleteComment('parentComment_{{ $comment->id }}')">Delete</button>
                        <button class="text-blue-500 hover:text-blue-600 font-semibold mt-2" onclick="toggleReplyForm({{ $comment->id }})">Reply</button>
                        <div id="replyForm_{{ $comment->id }}" class="hidden mt-4">
                                <form action="{{ route('comments.store') }}" method="POST">
                                    @csrf
                                    <div>
                                        <label for="replyContent" class="block font-semibold">Reply:</label>
                                        <textarea name="content" id="replyContent" rows="3" required class="w-full border border-gray-200 rounded-lg px-4 py-2 bg-gray-700"></textarea>
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
                                    <form action="{{ route('comments.store') }}" method="POST">
                                        @csrf
                                        <div>
                                            <label for="replyContent" class="block font-semibold">Reply:</label>
                                            <textarea name="content" id="replyContent" rows="3" required
                                                class="w-full border border-gray-200 rounded-lg px-4 py-2 dark:bg-gray-700 dark:border-gray-600"></textarea>
                                        </div>
                                        <input type="hidden" name="users_id" value="{{ Auth::id() }}">
                                        <input type="hidden" name="recipes_id" value="{{ $recipe->id }}">
                                        <input type="hidden" name="parent_comment_id" value="{{ $childComment->id }}">
                                        <button type="submit"
                                            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 mt-2">Post
                                            Reply</button>
                                    </form>
                                </div>
                            </li>
                            @endforeach
                        </ul>

                    </li>
                    @endif
                </div>
            @endforeach
        </ul>
    </div>
</div> --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
//  $(document).ready(function () {
//         // Submit comment form
//         $('#commentForm').submit(function (event) {
//             event.preventDefault();

//             $.ajax({
//                 url: $(this).attr('action'),
//                 type: 'POST',
//                 data: $(this).serialize(),
//                 success: function (response) {
//                     $('#commentForm')[0].reset();
//                     fetchComments(); // Fetch comments after successful submission
//                 }
//             });
//         });

//         // Submit reply form
//         $(document).on('submit', '.reply-form', function (event) {
//             event.preventDefault();

//             var form = $(this);

//             $.ajax({
//                 url: form.attr('action'),
//                 type: 'POST',
//                 data: form.serialize(),
//                 success: function (response) {
//                     form[0].reset();
//                     fetchComments(); // Fetch comments after successful submission
//                 }
//             });
//         });

//         // Fetch comments
//         $('#fetch-comments-button').click(function () {
//             fetchComments();
//         });

//         function fetchComments() {
//             $.ajax({
//                 url: '{{ route("fetch.comments", $recipe->id) }}',
//                 type: 'GET',
//                 success: function (response) {
//                     var commentsContainer = $('#comments-container');
//                     commentsContainer.empty();
//                     commentsContainer.html(response);
//                 }
//             });
//         }
// });
//     function deleteComment(commentId) {
//         if (confirm('Are you sure you want to delete this comment?')) {
//             // Perform AJAX request to delete the comment
//             $.ajax({
//                 url: '/comments/' + commentId.replace('parentComment_', '').replace('childComment_', ''),
//                 type: 'DELETE',
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 },
//                 success: function(response) {
//                     // Remove the comment from the DOM
//                     $('#' + commentId).remove();

//                     // Remove child comments recursively
//                     $('.childComment_' + commentId).remove();
//                 },
//                 error: function(xhr) {
//                     console.log(xhr.responseText);
//                 }
//             });
//         }
//     }
//     function toggleReplyForm(commentId) {
//         const formId = `#replyForm_${commentId}`;
//         const formElement = document.querySelector(formId);
//         formElement.classList.toggle('hidden');
//     }
    function checkPrevious(current) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].value <= current.value) {
                checkboxes[i].checked = true;
            } else {
                checkboxes[i].checked = false;
            }
        }
    }
</script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <style>
        input[type="checkbox"]:checked+i:before {
            color: #ffd117;
        }
    </style>
        <script src="{{ asset('js/design.js') }}"></script>
        <script src="{{ asset('js/rating.js') }}"></script>
        <script src="{{ asset('js/bookmarks.js') }}"></script>
    </body>

    </html>
@endsection
