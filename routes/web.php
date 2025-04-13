<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\FeaturesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomePageController::class,'index']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('/products', [ProductsController::class, 'index']);

Route::get('/posts', [PostsController::class, 'index']);
Route::get('/posts/create', [PostsController::class, 'create']);
Route::get('/posts/update', [PostsController::class, 'update']);
Route::get('/posts/delete', [PostsController::class, 'delete']);
Route::get('/posts/restore', [PostsController::class, 'restore']);
Route::get('/posts/first_or_create', [PostsController::class, 'firstOrCreate']);
Route::get('/posts/update_or_create', [PostsController::class, 'updateOrCreate']);

Route::get('/features', [FeaturesController::class, 'index']);

Route::get('/contacts', [ContactsController::class, 'index']);