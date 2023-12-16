<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\StreamerController;
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







Route::group([
   'middleware' => ['auth:sanctum']
], function () {
   // Route::delete('/deleteUser{id}', [AdminController::class, 'deleteUserById']);
   // Route::put('/activateUser{id}', [AdminController::class, 'activateUserById']);
   // Route::put('/activateUser{id}', [AdminController::class, 'inactivateUserById']);
   // Route::get('/getUser{id}', [AdminController::class, 'getUserById']);
   Route::get('/getAllUsers', [AdminController::class, 'getAllUsers']);
   Route::get('/getAllStreams', [AdminController::class, 'getAllStreams']);
   Route::put('/editBrandProfile', [BrandController::class, 'editBrandProfile']);
   Route::get('/profile', [UserController::class, 'getProfile']);
   Route::put('/editUserProfile', [UserController::class, 'editUserProfile']);
   Route::get('/getAllBrands', [StreamerController::class, 'getAllBrands']);
   Route::get('/getAllStreamers', [BrandController::class, 'getAllStreamers']);
   Route::put('/inactivateUser', [UserController::class, 'inactivate']);
   Route::put('/editStreamerProfile', [StreamerController::class, 'editStreamerProfile']);
   Route::get('/getStreamsByStreamer', [StreamerController::class, 'getStreamsByStreamer']);
   Route::post('/createStream', [StreamerController::class, 'reportAStream']);
   Route::get('/getAllCampaigns', [AdminController::class, 'getAllCampaigns']);
   Route::put('/payStream', [StreamerController::class, 'payStream']);
   Route::post('/createACampaign', [BrandController::class, 'createACampaign']);
   Route::get('/getCampaignsAsABrand', [BrandController::class, 'getCampaignsAsABrand']);
   Route::delete('/deleteCampaign/{id}', [BrandController::class, 'deleteACampaign']);
   Route::get('/getAllBrands', [AdminController::class, 'getAllBrands']);
   Route::get('/getAllStreamers', [AdminController::class, 'getAllStreamers']);
   Route::get('/getAllStreams', [AdminController::class, 'getAllStreams']);
   Route::get('/getAllActivatedCampaigns', [StreamerController::class, "getAllActivatedCampaigns"]);
});
Route::put('/inactivateACampaign/{id}', [BrandController::class, "inactivateACampaign"]);
Route::put('/activateACampaign/{id}', [BrandController::class, "activateACampaign"]);


Route::post('/registerBrand', [UserController::class, 'registerBrand']);
Route::post('/registerStreamer', [UserController::class, 'registerStreamer']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/getCountries', [UserController::class, 'getCountries']);

//como usuario actualizar mis credenciales de email y password
