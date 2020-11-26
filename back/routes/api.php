<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\livreurController;
use App\Http\Controllers\magasinController;
use App\Http\Controllers\ExportImportLivreurController;
use App\Http\Controllers\ExportImportMagasinController;
use App\Http\Controllers\AuthController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    


// Route::group([
//     'middleware' => 'api',
//     'prefix' => 'auth'
// ], function () {
// Route::prefix('/v1')->group(function(){

///////////////// LIVREUR //////////////////////////////////////////////////////////////////////////////

    Route::get('livreur', [LivreurController::class, 'index_livreur']);
    Route::post('livreur', [LivreurController::class, 'store_livreur']);

    Route::get('livreur/{livreur}', [livreurController::class, 'show_livreur']);

    Route::get('livreurNom', [livreurController::class, 'show_livreur_nom']);
    Route::get('livreurPrenom', [livreurController::class, 'show_livreur_prenom']);
    Route::get('livreurMail', [livreurController::class, 'show_livreur_email']);
    Route::get('livreurNum', [livreurController::class, 'show_livreur_numero']);
    //Route::get('livreur/zone/{id_zone}', [LivreurController::class, 'show_livreur_zone_choisi']);
    
    Route::delete('livreur/{livreur}', [livreurController::class, 'destroy_livreur']);
    Route::put('livreur/{livreur}', [livreurController::class, 'update_livreur']);

///////////////// MAGASIN //////////////////////////////////////////////////////////////////////////////

    Route::get('magasin', [magasinController::class, 'index_magasin']);
    Route::post('magasin', [magasinController::class, 'store_magasin']);

    Route::get('magasin/{magasin}', [magasinController::class, 'show_magasin']);

    Route::delete('magasin/{magasin}', [magasinController::class, 'destroy_magasin']);
    Route::put('magasin/{magasin}', [LivreurController::class, 'update_magasin']);

    ///////////////// EXPORT - IMPORT LIVREUR //////////////////////////////////////////////////////////////////////////////

    Route::get('exportlivreur', [ExportImportLivreurController::class, 'export']);
    Route::get('importlivreur', [ExportImportLivreurController::class, 'import']);

    ///////////////// EXPORT - IMPORT MAGASIN//////////////////////////////////////////////////////////////////////////////

    Route::get('exportmagasin', [ExportImportMagasinController::class, 'export']);
    Route::get('importmagasin', [ExportImportMagasinController::class, 'import']);


});




