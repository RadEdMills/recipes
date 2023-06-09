<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\MeasurementUnit;
use App\Models\Origin;
use App\Models\Recipe;
use App\Models\Tag;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
                if($tag['id']) {
                    $recipe->tags()->attach(Tag::find($tag['id']));
                } else {
//                    $new_tag = Tag::create([
//                        'name'
//                    ]);
//                    $recipe->tags->attach($new_tag);
                }
            }
        }

        $origins = $request->origins;
        if($origins) {
            foreach($origins as $origin) {
                if($origin['id']) {
                    $recipe->origins()->attach(Tag::find($origin['id']));
                } else {
//                    $new_tag = Tag::create([
//                        'name'
//                    ]);
//                    $recipe->tags->attach($new_tag);
                }
            }
        }

        $ingredients = $request->ingredients;
        if($ingredients) {
            foreach($ingredients as $ingredient) {
                if($ingredient['id']) {
                    $recipe->ingredients()->attach(
                        Tag::find($ingredient['id']),
                        [
                            'quantity' => $ingredient['quantity'],
                            'measurement_unit_id' => $ingredient['unit']
                        ]
                    );
                } else {
//                    $new_tag = Tag::create([
//                        'name'
//                    ]);
//                    $recipe->tags->attach($new_tag);
                }
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
