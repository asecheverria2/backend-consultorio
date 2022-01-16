<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\MedicoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::resource('centro', CentroController::class);
Route::resource('especialidad', EspecialidadController::class);
Route::resource('consultas', ConsultaController::class);
Route::resource('empleado', EmpleadoController::class);
Route::resource('medico', MedicoController::class);

