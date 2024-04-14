<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>Add New Recipe</h1>
                        <form method="post" action="{{ route('recipes.store') }}">
                            @csrf
                            <div>
                                <label for="title">Title:</label>
                                <input type="text" id="title" name="title" required>
                            </div>
                            <div>
                                <label for="ingredients">Ingredients:</label>
                                <textarea id="ingredients" name="ingredients" required></textarea>
                            </div>
                            <div>
                                <label for="instructions">Instructions:</label>
                                <textarea id="instructions" name="instructions" required></textarea>
                            </div>
                            <button type="submit">Submit Recipe</button>
                        </form>
<!-- Display submitted form data -->
@if (isset($submittedData))
    <div class="mt-4">
        <h2>Submitted Recipes</h2>
        @foreach ($submittedData as $recipe)
            <div class="submitted-recipe">
                <p><strong>Title:</strong> {{ $submittedData['title'] }}</p>
                <p><strong>Ingredients:</strong> {{ $submittedData['ingredients'] }}</p>
                <p><strong>Instructions:</strong> {{ $submittedData['instructions'] }}</p>
                
                <!-- Update and Delete buttons -->
                <div class="mt-2">
                <form method="post" action="{{ route('dashboard', $recipe->id) }}" style="display: inline;">

                        @csrf
                        @method('PUT')
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                    </form>
                    <form method="post" action="{{ route('recipes.destroy', $recipe['id']) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </form>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


