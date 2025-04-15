<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\FeaturesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class,'index'])->name('main.index');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/products', [ProductsController::class, 'index'])->name('product.index');

Route::get('/posts', [PostsController::class, 'index'])->name('post.index');
Route::get('/posts/create', [PostsController::class, 'create'])->name('post.create');

Route::post('/posts', [PostsController::class,'store'])->name('post.store');
Route::get('/posts/{post}', [PostsController::class,'show'])->name('post.show');

Route::get('/posts/update', [PostsController::class, 'update']);
Route::get('/posts/delete', [PostsController::class, 'delete']);
Route::get('/posts/restore', [PostsController::class, 'restore']);
Route::get('/posts/first_or_create', [PostsController::class, 'firstOrCreate']);
Route::get('/posts/update_or_create', [PostsController::class, 'updateOrCreate']);

Route::get('/features', [FeaturesController::class, 'index'])->name('feature.index');

Route::get('/contacts', [ContactsController::class, 'index'])->name('contact.index');