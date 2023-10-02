<?php

use App\Http\Controllers\Amiscontroller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProduitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/login", [AuthController::class, "login"]);

Route::prefix("produit")->group(function () {
    Route::post("", [ProduitController::class, "addProduit"]);
    Route::get("/{succursale}", [ProduitController::class, "getProduitBySuccursale"]);
    Route::get("/code/{code}/succursale/{succursale}", [ProduitController::class, "getProduitByCodeInSuccursale"]);
    Route::get("/critere/{critereRecherche}/libelle/{libelle}/succursale/{succursale}", [ProduitController::class, "searchProductBy"]);
});

Route::prefix("/friend")->group(function () {
    Route::get("/{succursaleId}", [Amiscontroller::class, "getAmis"]);
    // Route::get("AskRelation/{}",[Amiscontroller::class,"getDemandeRelation"]);
    Route::post("/demande", [Amiscontroller::class, "askFriend"]);
});

Route::prefix("commande")->group(function () {
    Route::post("", [CommandeController::class, "addCommande"]);
});

// / 
