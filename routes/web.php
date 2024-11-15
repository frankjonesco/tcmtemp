<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PusherController;
use App\Http\Controllers\ArticleController;

/*
--------------------------------------------------------------------------
| Key Definitions
|--------------------------------------------------------------------------
|
|   INDEX       List records
|   VIEW........View single page
|   SHOW........Show single record
|   CREATE......Show form for creating a record
|   STORE.......Save record to the database
|   EDIT........Show form to edit record
|   UPDATE......Save updated record to database
|   DESTROY.....Delete record from database
|
|--------------------------------------------------------------------------
*/




// PUSHER CONTROLLER


    // ALL USERS

    Route::controller(PusherController::class)->group(function(){

        // SINGLE SERVE PAGES
        Route::get('/pusher', 'index');
        Route::post('/pusher/broadcast', 'broadcast');
        Route::post('/pusher/receive', 'receive');

    });




// SITE CONTROLLER


    // ALL USERS

    Route::controller(SiteController::class)->group(function(){

        // SINGLE SERVE PAGES
        Route::get('/', 'viewHome');
        Route::get('/about', 'viewAbout');
        Route::get('/terms-of-use', 'viewTermsOfUse');
        Route::get('/privacy-policy', 'viewPrivacyPolicy');

    });




// ARTICLE CONTROLLER


    // AUTHENTICATED USERS

    Route::controller(ArticleController::class)->middleware('auth')->group(function(){

        // ARTICLE INDEX
        Route::get('/admin/articles', 'adminIndex');

        // CRUD ROUTES
        Route::get('/articles/create', 'create');
        Route::post('/articles/store', 'store');
        Route::get('/articles/{article}/edit', 'edit');
        Route::put('/articles/{article}/update', 'update');
        Route::get('/articles/{article}/confirm-delete', 'confirmDelete');
        Route::delete('/articles/{article}/destroy', 'destroy');
    });


    // ALL USERS

    Route::controller(ArticleController::class)->group(function(){

        Route::get('/articles', 'viewIndex');
        Route::get('/articles/{article}', 'show');

    });




// USER CONTROLLER


    // AUTHENTICATED USERS

    Route::controller(UserController::class)->middleware('auth')->group(function(){

        // LOG OUT
        Route::post('/logout', 'logout');

    });


    // GUEST USERS

    Route::controller(UserController::class)->middleware('guest')->group(function(){

        // REGISTER
        Route::get('/register', 'viewRegistration');
        Route::post('/users/store', 'store');

        // LOG IN
        Route::get('/login', 'viewLogin');
        Route::post('/authenticate', 'authenticate');

    });




// ADMIN CONTROLLER


    // AUTHENTICATED USERS

    Route::controller(AdminController::class)->middleware('auth')->group(function(){

        // INDEX
        Route::get('/admin', 'index');

    });

