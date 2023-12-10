<?php

use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



//Esto faltaria ordenarlo por middlewares y por roles

//como usuario registrarse como streamer o como marca y loguearse, ver mi perfil y ponerme en estado inactivo
Route::group([
   "middleware" => "auth:sanctum"
], function () {
   Route::get('/profile', [UserController::class, 'getProfile']);
   Route::put('/editUserProfile', [UserController::class, 'editUserProfile']);
});

Route::post('/registerStreamer', [UserController::class, 'registerStreamer']);
Route::post('/registerBrand', [UserController::class, 'registerBrand']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);
Route::put('/inactivate', [UserController::class, 'inactivate']);
Route::get('/getCountries', [UserController::class, 'getCountries']);

//como usuario actualizar mis credenciales de email y password

Route::put('/updateEmail', [UserController::class, 'updateEmail']);
Route::put('/updatePassword', [UserController::class, 'updatePassword']);

//como superadmin eliminar un usuario en concreto, activarlo, ver todos los usuarios y ver un usuario en concreto

Route::delete('/deleteUser{id}', [SuperAdminController::class, 'deleteUser']);
Route::put('/activateUser{id}', [SuperAdminController::class, 'activateUser']);
Route::get('/getAllUsers', [SuperAdminController::class, 'getAllUsers']);
Route::get('/getUser{id}', [SuperAdminController::class, 'getUser']);

//como marca ver todos los streamers dispobibles

Route::get('/getAllStreamers', [BrandController::class, 'getAllStreamers']);

//como streamer ver todas las marcas y todas las campañas disponibles

Route::get('/getAllBrands', [StreamerController::class, 'getAllBrands']);
Route::get('/getAllCampaigns', [StreamerController::class, 'getAllCampaigns']);

//como marca crear una campaña

Route::post('/createCampaign', [BrandController::class, 'createCampaign']);
Route::delete('/deleteCampaign', [BrandController::class, 'deleteCampaign']);
Route::put('/updateCampaign', [BrandController::class, 'updateCampaign']);
Route::get('/getCampaign', [BrandController::class, 'getCampaignInfo']);

//como streamer crear un stream

Route::post('/createStream', [StreamerController::class, 'createStream']);
Route::delete('/deleteStream', [StreamerController::class, 'deleteStream']);
Route::put('/updateStream', [StreamerController::class, 'updateStream']);
Route::get('/getStream', [StreamerController::class, 'getStreamInfo']);

//como superadmin validar un stream 

Route::put('/validateStream', [SuperAdminController::class, 'validateStream']);

//como streamer cobrar un stream ya validado

Route::put('/payStream', [StreamerController::class, 'payStream']);
