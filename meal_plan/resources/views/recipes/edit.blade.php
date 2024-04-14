<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Recipe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{ route('recipes.update', $recipe->id) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="title">Title:</label>
                            <input type="text" id="title" name="title" value="{{ $recipe->title }}" required>
                        </div>
                        <div>
                            <label for="ingredients">Ingredients:</label>
                            <textarea id="ingredients" name="ingredients" required>{{ $recipe->ingredients }}</textarea>
                        </div>
                        <div>
                            <label for="instructions">Instructions:</label>
                            <textarea id="instructions" name="instructions" required>{{ $recipe->instructions }}</textarea>
                        </div>
                        <button type="submit">Update Recipe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
