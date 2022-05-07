<?php

use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    "prefix" => "clients"
], function () {
    Route::get("/", [ClientController::class, "get"]);
    Route::get("/{id}", [ClientController::class, "find"]);
    Route::post("/", [ClientController::class, "create"]);
    Route::patch("/", [ClientController::class, "alter"]);
    Route::post("/delete", [ClientController::class, "delete"]);
});
