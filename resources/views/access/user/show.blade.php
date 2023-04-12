@extends('layouts.app')

@section('content')
    <h1>{{ $recipe->recipe_name }}</h1>
    <p>Ingredients: {{ $recipe->ingredients }}</p>
    <p>Instructions: {{ $recipe->instructions }}</p>
    <p>Average rating: {{ $average_rating }}</p>

    <form method="POST" action="{{ route('ratings.store') }}">
        @csrf
        <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
        <label for="rating">Rate this recipe:</label>
        <select name="rating" id="rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <button type="submit">Submit</button>
    </form>
@endsection
