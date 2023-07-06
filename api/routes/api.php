<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\GeneralFormController;

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

Route::group(['middleware' => 'api'], function ($router) {
    //Authentication routes
    Route::post('/signin', [AuthController::class, 'login']);
    Route::post('/testlanguage', [AuthController::class, 'testlanguage']);

    //User/Employe routes
    Route::get('/getUsers', [UserController::class, 'getUsers']);
    Route::post('/editUser', [UserController::class, 'editUser']);
    Route::post('/addUser', [UserController::class, 'addUser']);
    Route::post('/changePassword', [UserController::class, 'changePassword']);
    Route::post('/getGlobalUser', [UserController::class, 'getGlobalUser']);
    Route::post('/changeStatus', [UserController::class, 'changeStatus']);
    Route::get('/getAgent', [UserController::class, 'getAgent']);
    Route::get('/getAdminModerator', [UserController::class, 'getAdminModerator']);

    //General form routes
    // Route::post('/addGlobalForm', [GeneralFormController::class, 'addGlobalForm']);
    Route::post('/addGlobalFormField', [GeneralFormController::class, 'addGlobalFormField']);
    Route::post('/removeGlobalFormField', [GeneralFormController::class, 'removeGlobalFormField']);
    Route::get('/getFormStructure', [GeneralFormController::class, 'getFormStructure']);
    Route::get('/getAllStructure', [GeneralFormController::class, 'getAllStructure']);
    Route::post('/createAddress', [GeneralFormController::class, 'createAddress']);
    Route::get('/getAddress', [GeneralFormController::class, 'getAddress']);
    Route::get('/getAddressForStructure', [GeneralFormController::class, 'getAddressForStructure']);
    Route::post('/deleteAddress',  [GeneralFormController::class, 'deleteAddress']);
    Route::get('/getAddFields', [GeneralFormController::class, 'getAddedFields']);
    Route::get('/getAllAddresses/{id}', [GeneralFormController::class, 'getAllAddresses']);
    Route::post('/getHome',  [HomeController::class, 'getHome']);

 //HomeController form routes
    Route::post('/addHome',  [HomeController::class, 'addHome']);
    Route::post('/addKeyword/{id}',  [HomeController::class, 'addKeyword']);
    Route::post('/addYandexLocation/{id}',  [HomeController::class, 'addYandexLocation']);
    Route::post('/addReservPhoto/{id}',  [HomeController::class, 'addReservPhoto']);
    Route::post('/multyPhoto/{id}',  [HomeController::class, 'multyPhoto']);
    Route::post('/documentUpload/{id}',  [HomeController::class, 'documentUpload']);

    //Home Edit apis
    Route::post('/editHome/{id}',  [HomeController::class, 'editHome']);
    Route::post('/editKeyword/{id}',  [HomeController::class, 'editKeyword']);
    Route::post('/editYandexLocation/{id}',  [HomeController::class, 'editYandexLocation']);
    Route::post('/editMultyPhoto/{id}',  [HomeController::class, 'editMultyPhoto']);
    Route::post('/editDocumentUpload/{id}',  [HomeController::class, 'editDocumentUpload']);
    Route::post('/addReservPhotoTwo/{id}',  [HomeController::class, 'addReservPhotoTwo']);

    

    //Exchange amount
    Route::post('/setExchange',  [ExchangeController::class, 'setExchange']);
    Route::get('/getExchange',  [ExchangeController::class, 'getExchange']);
});

Route::group(['middleware' => 'authcheck'], function ($router) {
    Route::get('/getProperties/{id}',  [HomeController::class, 'getProperties']);
});
