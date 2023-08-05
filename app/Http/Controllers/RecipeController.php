<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\MeasurementUnit;
use App\Models\Origin;
use App\Models\Recipe;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\isEmpty;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::with('tags', 'origins')->get();
        $can_login = Route::has('login');
        $can_register = Route::has('register');

        return inertia('Recipe/Index', [
            'recipes' => $recipes,
            'canLogin' =>$can_login,
            'canRegister' => $can_register

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        $origins = Origin::all();
        $ingredients = Ingredient::all();
        $measurement_units = MeasurementUnit::all();

        return inertia('Recipe/Create', compact('tags', 'origins', 'ingredients', 'measurement_units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $recipe = Recipe::create([
            'title' => $request->title,
            'description' => $request->description,
            'instructions' => $request->instructions
        ]);

        $tags = $request->tags;
        if($tags) {
            foreach($tags as $tag) {
                if(!is_string($tag)) {
                    $recipe->tags()->attach(Tag::find($tag['id']));
                } else {
                    $recipe->tags()->create([
                        'name' => $tag
                    ]);
                }
            }
        }

        $origins = $request->origins;
        if($origins) {
            foreach($origins as $origin) {
                if(!is_string($origin)) {
                    $recipe->origins()->attach(Tag::find($origin['id']));
                } else {
                    $recipe->origins()->create([
                        'name' => $origin
                    ]);
                }
            }
        }

        $ingredients = $request->ingredients;
        if($ingredients) {
            foreach($ingredients as $ingredient) {
                if(!is_string($ingredient)) {
                    $recipe->ingredients()->attach(
                        Tag::find($ingredient['id']),
                        [
                            'quantity' => $ingredient['quantity'],
                            'measurement_unit_id' => $ingredient['unit']
                        ]
                    );
                } else {
                    $recipe->ingredients()->create([
                        'name' => $ingredient
                    ]);
                }
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recipe = Recipe::with('tags', 'origins')->find($id);
        $can_login = Route::has('login');
        $can_register = Route::has('register');

        return inertia('Recipe/Show', [
            'recipe' => $recipe,
            'canLogin' =>$can_login,
            'canRegister' => $can_register
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
