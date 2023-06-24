<?php

use App\Http\Controllers\Job_vacancieController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ValidationController;
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



Route::post('v1/auth/login', [LoginController::class, 'login']);
Route::get('v1/auth/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

Route::get('v1/job_vacancies', [Job_vacancieController::class, 'index'])->middleware('auth:sanctum');
Route::get('v1/job_vacancies/{id}', [Job_vacancieController::class, 'show'])->middleware('auth:sanctum');
Route::post('/v1/validation', [ValidationController::class, 'store'])->middleware('auth:sanctum');
Route::get('v1/validations', [ValidationController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
