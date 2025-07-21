<?php
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;

// API Routes
Route::get('/products', [ProductController::class, 'index']);     
Route::get('/products/{slug}', [ProductController::class, 'showBySlug']);
Route::post('/products/{id}', [ProductController::class, 'update']);

Route::get('/brands', [BrandController::class, 'index']);

Route::get('/ping', function () {
    return response()->json(['message' => 'Success!']);
});

Route::post('/admin/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)
        ->where('is_admin', true)
        ->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['Invalid credentials or not an admin.'],
        ]);
    }

    $token = $user->createToken('admin-token')->plainTextToken;

    return response()->json([
        'token' => $token,
        'user' => $user,
    ]);
});

Route::middleware('auth:sanctum')->get('/admin/me', function (Request $request) {
    if (!$request->user()->is_admin) {
        abort(403, 'Unauthorized');
    }

    return $request->user();
});
