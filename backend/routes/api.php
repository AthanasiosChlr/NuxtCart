<?php
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/products', function () {
    return Products::all();
});

Route::get('/ping', function (Request $request) {
    return response()->json(['message' => 'Success!']);
});