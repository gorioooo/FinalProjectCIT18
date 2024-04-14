<?php
namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;


class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('dashboard', compact('recipes'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
{
    // Validate the request and store the recipe data

    $submittedData = [
        'title' => $request->input('title'),
        'ingredients' => $request->input('ingredients'),
        'instructions' => $request->input('instructions'),
    ];

    // Process the submitted data and save it to the database

    return view('dashboard', compact('submittedData'))->with('status', 'Recipe submitted successfully!');
}

    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'title' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
        ]);

        $recipe->update($request->all());

        return redirect()->route('recipes.index')
            ->with('success', 'Recipe updated successfully.');
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect()->route('recipes.index')
            ->with('success', 'Recipe deleted successfully.');
    }
}
