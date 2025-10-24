<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Route::middleware(['auth:nelayan'])->get('/dashboard-data', function (Request $request) {
    $user = $request->user();
    $permohonan = \App\Models\RekomRequests::where('user_id', $user->id)->latest()->get();

    return response()->json([
        'user' => $user,
        'permohonan' => $permohonan
    ]);
});
