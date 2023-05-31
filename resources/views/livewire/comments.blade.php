
<div>
    <!-- Comment Form -->
    <form wire:submit.prevent="addComment">
        <div class="py-2 px-4 my-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <label for="comment" class="sr-only">Your comment</label>
            <textarea
                wire:model="content"
                rows="6"
                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                placeholder="Write a comment..."
                required></textarea>
        </div>
        <button type="submit"
            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Post comment
        </button>
    </form>

@foreach ($comments as $comment)
@if (!$comment->parent_comment_id)

    <article id="comment-{{ $comment->id }}" class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">
        <footer class="flex justify-between items-center mb-2">
            <div class="flex items-center">
                <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                    <img class="mr-2 w-6 h-6 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Michael Gough">{{ $comment->user->name }}
                </p>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    @if ($comment->user_id == auth()->id())
                      You commented {{ $comment->created_at->diffForHumans() }}
                    @else
                      @if ($comment->created_at->isToday())
                        {{ $comment->created_at->diffInMinutes(now()) }} minutes ago
                      @else
                        <time pubdate datetime="{{ $comment->created_at->toDateString() }}" title="{{ $comment->created_at->format('F d, Y') }}">
                          {{ $comment->created_at->format('M. d, Y') }}
                        </time>
                      @endif
                    @endif
                  </p>
            </div>
            <div class="flex flex-row gap-1">
                <button wire:click.prevent="editComment({{ $comment->id }})"
                    class="block px-2 py-1 rounded hover:bg-gray-100 text-black duration-500 transition ease-in-out dark:hover:bg-gray-700 dark:text-gray-400 dark:hover:text-white">
                    <i class="fa-solid fa-pen-to-square fa-md"></i>
                </button>
                <button wire:click.prevent="deleteComment({{ $comment->id }})"
                    class="block px-2 py-1 rounded hover:bg-red-600 text-black hover:text-white duration-500 transition ease-in-out dark:text-gray-400 dark:hover:text-white">
                    <i class="fa-solid fa-trash fa-md"></i>
                </button>
            </div>
        </footer>
        @if ($editingCommentId !== $comment->id)
            <p class="text-gray-500 dark:text-gray-400">{{ $comment->content }}</p>
        @else
            <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <textarea wire:model="editingCommentContent" rows="6" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" required></textarea>
                <div class="flex items-center mt-4 space-x-4">
                    <button
                        type="button"
                        wire:click="updateComment"
                        class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-black bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800 dark:text-white">
                        Update
                    </button>
                    <button
                        type="button"
                        wire:click="cancelUpdate"
                        class="inline-flex items-center py-2.5 px-4 ml-2 text-xs font-medium text-center text-gray-700 hover:text-white bg-gray-200 hover:bg-red-600 rounded-lg dark:text-gray-400 dark:hover:text-white dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-red-600 duration-700 transition ease-in-out">
                        Cancel
                    </button>
                </div>
            </div>

        @endif
            <div class="flex items-center my-4 space-x-4">
                <button type="button" wire:click="showReplyForm({{ $comment->id }})"
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
        @if ($replyTo === $comment->id)
            <!-- Reply form -->
            <form wire:submit.prevent="addReply">
                <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <label for="reply" class="sr-only">Your reply</label>
                    <textarea
                        wire:model="replyContent"
                        rows="6"
                        class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                        placeholder="Write a reply..."
                        required></textarea>
                </div>
                <input type="hidden" wire:model="replyTo">
                <button type="submit"
                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-black bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800 dark:text-white">
                Post reply
                </button>
                <button type="button" wire:click="cancelReply"
                class="inline-flex items-center py-2.5 px-4 ml-2 text-xs font-medium text-center text-gray-700 hover:text-white bg-gray-200 hover:bg-red-600 rounded-lg dark:text-gray-400 dark:hover:text-white dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-red-600 duration-700 transition ease-in-out">
                Cancel
                </button>
            </form>
        @endif
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
                                @if ($comment->user_id == auth()->id())
                                You commented {{ $comment->created_at->diffForHumans() }}
                                @else
                                @if ($comment->created_at->isToday())
                                    {{ $comment->created_at->diffInMinutes(now()) }} minutes ago
                                @else
                                    <time pubdate datetime="{{ $comment->created_at->toDateString() }}" title="{{ $comment->created_at->format('F d, Y') }}">
                                    {{ $comment->created_at->format('M. d, Y') }}
                                    </time>
                                @endif
                                @endif
                            </p>

                </div>
                <div class="flex flex-row gap-1">
                    <button wire:click.prevent="editChildComment({{ $childComment->id }})"
                        class="block px-2 py-1 rounded hover:bg-gray-100 text-black duration-500 transition ease-in-out dark:hover:bg-gray-700 dark:text-gray-400 dark:hover:text-white">
                        <i class="fa-solid fa-pen-to-square fa-md"></i>
                    </button>
                    <button wire:click.prevent="deleteChildComment({{ $childComment->id }})"
                        class="block px-2 py-1 rounded hover:bg-red-600 text-black hover:text-white duration-500 transition ease-in-out dark:text-gray-400 dark:hover:text-white">
                        <i class="fa-solid fa-trash fa-md"></i>
                    </button>
                </div>



            </footer>
            @if ($editingChildCommentId !== $childComment->id)
            <!-- Display child comment content -->
                <p class="text-gray-500 dark:text-gray-400">{{ $childComment->content }}</p>
            @else
                <!-- Edit child comment form -->
                <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <!-- Edit child comment form fields -->

                    <textarea wire:model="editingChildCommentContent" rows="3"
                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800">
                    {{ $childComment->content }}</textarea>

                    <div class="flex items-center mt-4 space-x-4">
                        <!-- Update child comment button -->
                        <button type="button" wire:click="updateChildComment({{ $childComment->id }})"
                            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-black bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800 dark:text-white">
                            Update
                        </button>

                        <!-- Cancel edit child comment button -->
                        <button type="button" wire:click="cancelChildUpdate"
                        class="inline-flex items-center py-2.5 px-4 ml-2 text-xs font-medium text-center text-gray-700 hover:text-white bg-gray-200 hover:bg-red-600 rounded-lg dark:text-gray-400 dark:hover:text-white dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-red-600 duration-700 transition ease-in-out">
                        Cancel
                        </button>
                    </div>
                </div>

            @endif
        </article>
@endforeach
@endif
@endforeach


