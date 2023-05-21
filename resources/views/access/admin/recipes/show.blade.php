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

<script src="{{ asset('js/design.js') }}"></script>
<script src="{{ asset('js/rating.js') }}"></script>
<script src="{{ asset('js/bookmarks.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
    // Update comment form
    $(document).on('submit', 'form[id^="updateForm_"]', function (event) {
        event.preventDefault();

        var formId = $(this).attr('id');
        var commentId = formId.split('_')[1];
        var updateContentId = '#updateContent_' + commentId;

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                $(updateContentId).attr('readonly', true);
                $('#update-' + commentId).addClass('hidden');
                fetchComments(); // Fetch comments after successful update
            }
        });
    });
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

    <style>
    input[type="checkbox"]:checked+i:before
    {
        color: #ffd117;
    }
    </style>
@endsection
