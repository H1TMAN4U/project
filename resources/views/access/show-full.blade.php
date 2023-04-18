@extends('access.master')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    @if (count($recipes) > 0)
        <div class="w-full ">
            <div
                class="grid bg-gray-200 justify-center md:grid-cols-4 py-2 rounded md:flex-row
            dark:bg-gray-800 ">
                @foreach ($recipes as $value)
                    <div class="flex flex-col p-4">
                        <img class="rounded-t-lg w-full" src="{{ asset('images/' . $value->img) }}" alt="" />
                        <button class="rounded-b mt-1 create-bookmark bg-blue-700 hover:bg-blue-800 w-full"
                            data-users-id="{{ Auth::user()->id }}" data-recipes-id="{{ $value->id }}">Bookmark
                            Recipe</button>
                    </div>
                    <div class="p-5">
                        <button type="button" onclick="myFunction()"
                            class="fas fa-star fa-xl">{{ $value->rating }}</button>
                        <a href="#">
                            <h5 class="mb-2 md:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $value->name }}</h5>
                        </a>

                    </div>
            </div>



            <form action="{{ route('rating.store') }}" method="POST">
                @csrf
                <div id="rate" class="container">
                    <div class="post">
                        <div class="text">Thanks for rating us!</div>
                        <div class="edit">EDIT</div>
                    </div>
                    <div class="star-widget">
                        <input type="radio" name="rating" value="5" id="rate-5">
                        <label for="rate-5" class="fas fa-star"></label>
                        <input type="radio" name="rating" value="4" id="rate-4">
                        <label for="rate-4" class="fas fa-star"></label>
                        <input type="radio" name="rating" value="3" id="rate-3">
                        <label for="rate-3" class="fas fa-star"></label>
                        <input type="radio" name="rating" value="2" id="rate-2">
                        <label for="rate-2" class="fas fa-star"></label>
                        <input type="radio" name="rating" value="1" id="rate-1">
                        <label for="rate-1" class="fas fa-star"></label>
                        <header></header>
                        <div class="textarea">
                            <textarea cols="30" name="review" placeholder="Describe your experience.."></textarea>
                        </div>
                        <div class="btn">
                            <input type="hidden" name="recipes_id" value="{{ $value->id }}" />
                            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}" />
                            <button onclick="submit_rating()" type="submit">Post</button>
                        </div>
                    </div>
                </div>
                <div class="flex items-center star-widge">
                    <input class="hidden" type="radio" name="rating" value="1" id="rate-1">
                    <label onclick="myFunction(this)" id="rate-1" class=" fas fa-star"></label>
                    <input type="radio" name="rating" value="1" id="rate-2">
                    <label onclick="myFunction(this)" id="rate-2" class=" fas fa-star"></label>
                    <input type="radio" name="rating" value="1" id="rate-3">
                    <label onclick="myFunction(this)" id="rate-3" class=" fas fa-star"></label>
                    <input type="radio" name="rating" value="1" id="rate-4">
                    <label onclick="myFunction(this)" id="rate-4" class=" fas fa-star"></label>
                    <input type="radio" name="rating" value="1" id="rate-5">
                    <label onclick="myFunction(this)" id="rate-5" class=" fas fa-star"></label>
                </div>
            </form>
    @endforeach
    </div>

    </div>
@else
    <div
        class="bg-gray-300 flex justify-center md:grid-cols-4 my-2 py-2 rounded md:flex-row
                dark:bg-gray-800">
        <h1 class="text-center">No Data Found</h1>
    </div>
    @endif
    <script src="{{ asset('js/bookmarks.js') }}"></script>

    <script>
        function myFunction() {
            var x = document.getElementById("rate");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }


    </script>


    <script>
        const btn = document.querySelector("button");
        const post = document.querySelector(".post");
        const widget = document.querySelector(".star-widget");
        const editBtn = document.querySelector(".edit");
        btn.onclick = () => {
            widget.style.display = "none";
            post.style.display = "block";
            editBtn.onclick = () => {
                widget.style.display = "block";
                post.style.display = "none";
            }
            return false;
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        html,
        body {
            display: grid;
            height: 100%;
            place-items: center;
            text-align: center;
            background: #000;
        }

        .container {
            position: relative;
            width: 400px;
            background: #111;
            padding: 20px 30px;
            border: 1px solid #444;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .container .post {
            display: none;
        }

        .container .text {
            font-size: 25px;
            color: #666;
            font-weight: 500;
        }

        .container .edit {
            position: absolute;
            right: 10px;
            top: 5px;
            font-size: 16px;
            color: #666;
            font-weight: 500;
            cursor: pointer;
        }

        .container .edit:hover {
            text-decoration: underline;
        }

        .container .star-widget input {
            display: none;
        }

        .star-widget label {
            font-size: 40px;
            color: #444;
            padding: 10px;
            float: right;
            transition: all 0.2s ease;
        }

        input:not(:checked)~label:hover,
        input:not(:checked)~label:hover~label {
            color: #fd4;
        }

        input:checked~label {
            color: #fd4;
        }

        input#rate-5:checked~label {
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }

        #rate-1:checked~form header:before {
            content: "I just hate it ";
        }

        #rate-2:checked~form header:before {
            content: "I don't like it ";
        }

        #rate-3:checked~form header:before {
            content: "It is awesome ";
        }

        #rate-4:checked~form header:before {
            content: "I just like it ";
        }

        #rate-5:checked~form header:before {
            content: "I just love it ";
        }

        .container form {
            display: none;
        }

        input:checked~form {
            display: block;
        }

        form header {
            width: 100%;
            font-size: 25px;
            color: #fe7;
            font-weight: 500;
            margin: 5px 0 20px 0;
            text-align: center;
            transition: all 0.2s ease;
        }

        form .textarea {
            height: 100px;
            width: 100%;
            overflow: hidden;
        }

        form .textarea textarea {
            height: 100%;
            width: 100%;
            outline: none;
            color: #eee;
            border: 1px solid #333;
            background: #222;
            padding: 10px;
            font-size: 17px;
            resize: none;
        }

        .textarea textarea:focus {
            border-color: #444;
        }

        form .btn {
            height: 45px;
            width: 100%;
            margin: 15px 0;
        }

        form .btn button {
            height: 100%;
            width: 100%;
            border: 1px solid #444;
            outline: none;
            background: #222;
            color: #999;
            font-size: 17px;
            font-weight: 500;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        form .btn button:hover {
            background: #1b1b1b;
        }
    </style>
    </body>

    </html>
@endsection
