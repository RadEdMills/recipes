<?php

use App\Http\Controllers\IngredientController;
use App\Http\Controllers\RecipeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


Route::get('/recipe/', [RecipeController::class, 'index'])->name('recipe.index');
Route::get('/recipe/{id}', [RecipeController::class, 'show'])->name('recipe.show');

Route::middleware([
    'auth.mod',
    config('jetstream.auth_session'),
])->group(function () {
    Route::get('/recipe/create', [RecipeController::class, 'create'])->name('recipe.create');
    Route::post('/recipe/store', [RecipeController::class, 'store'])->name('recipe.store');

    Route::get('/ingredient/create', [IngredientController::class, 'create'])->name('ingredient.create');
    Route::post('/ingredient/store', [IngredientController::class, 'store'])->name('ingredient.store');
});
