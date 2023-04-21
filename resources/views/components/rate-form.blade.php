<div class="hide hidden flex w-1/2 flex-col text-center bg-gray-200 dark:bg-gray-800 p-4 rounded">
    <form id="rating-form">
            <div class="flex-row p-2 text-gray-300">
            <label class="">
                <input name="rating" class="hidden" type="checkbox" value="1"
                    onclick="checkPrevious(this)">
                <i class="fa fa-star fa-2xl"></i>
            </label>
            <label>
                <input name="rating" class="hidden" type="checkbox" value="2"
                    onclick="checkPrevious(this)">
                <i class="fa fa-star fa-2xl"></i>
            </label>
            <label>
                <input name="rating" class="hidden" type="checkbox" value="3"
                    onclick="checkPrevious(this)">
                <i class="fa fa-star fa-2xl"></i>
            </label>
            <label>
                <input name="rating" class="hidden" type="checkbox" value="4"
                    onclick="checkPrevious(this)">
                <i class="fa fa-star fa-2xl"></i>
            </label>
            <label>
                <input name="rating" class="hidden" type="checkbox" value="5"
                    onclick="checkPrevious(this)">
                <i class="fa fa-star fa-2xl"></i>
            </label>
        </div>
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter your Review</label>
        <textarea id="message" rows="6" name="review"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Write your thoughts here..."></textarea>
        <input type="text" class="hidden" name="users_id" value="{{ Auth::user()->id }}">
        <input type="text" class="hidden" name="recipes_id" value="{{ $recipes->id }}">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 create-rating text-white font-semibold p-2 rounded-lg mt-2 w-1/2">
            Post
        </button>
</form>
</div>
