<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryArticleController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductRequestController;
use App\Http\Controllers\WriterController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/home', function () {
//     return view('home');
// });

Route::get('/', [FrontEndController::class, 'home'])->name('home');

Route::get('/product', [FrontEndController::class, 'product'])->name('product');
Route::get('/product', [FrontEndController::class, 'product'])->name('product');
Route::get('/product/{product:slug}', [FrontEndController::class, 'product_show'])->name('product.show');
Route::get('/product/category/{name}', [FrontEndController::class, 'product_filter'])->name('product.filter');
Route::post('/product/request', [FrontEndController::class, 'product_request'])->name('product.request');

Route::get('/article', [FrontEndController::class, 'article'])->name('article');
Route::get('/article/{article:slug}', [FrontEndController::class, 'article_show'])->name('article.show');
Route::get('/article/category/{name}', [FrontEndController::class, 'article_filter'])->name('article.filter');

// Frontend Comments
Route::group(['middleware' => ['auth']], function () {
    Route::post('/article/comment', [FrontEndController::class, 'comment_article'])->name('comment.article');
});

// Dashboard General User
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {    
    Route::get('index', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('profile', [DashboardController::class, 'profile_update'])->name('profile.update');
    Route::delete('profile', [DashboardController::class, 'profile_image_destroy'])->name('profile.image.destroy');
    Route::put('password', [DashboardController::class, 'password'])->name('password');
    
    // Storage Link
    Route::get('/storage-link', function () {
        Artisan::call('storage:link');
    });
});

// Dashboard Roles User
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:super_admin|admin']], function () {    
    Route::get('users', [DashboardController::class, 'users'])->name('users');
});
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:super_admin']], function () {    
    Route::get('users/roles/{id}/edit', [DashboardController::class, 'roles_edit'])->name('roles.edit');
    Route::put('users/roles/{id}/update', [DashboardController::class, 'roles_update'])->name('roles.update');
});

// Dashboard CRUD Landing Page
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:super_admin|admin']], function () {
    Route::get('landingpage', [DashboardController::class, 'landingpage'])->name('landingpage');
    Route::post('landingpage', [DashboardController::class, 'landingpage_store'])->name('landingpage.store');
    Route::delete('landingpage', [DashboardController::class, 'landingpage_destroy'])->name('landingpage.destroy');
    
    Route::post('landingpage/carousel', [DashboardController::class, 'carousel'])->name('landingpage.carousel');
    Route::delete('landingpage/carousel', [DashboardController::class, 'carousel_destroy'])->name('landingpage.carousel.destroy');
});

// Dashboard CRUD Article
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:super_admin|editor']], function () {
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/article/edit/{article:slug}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/article/update/{article:slug}', [ArticleController::class, 'update'])->name('article.update');
});
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:super_admin|admin|editor']], function () {
    Route::get('/article/post', [ArticleController::class, 'index'])->name('article.index');
    // Route::get('/article/show/{article:slug}', [ArticleController::class, 'show'])->name('article.show');
    Route::delete('/article/destroy/{article:slug}', [ArticleController::class, 'destroy'])->name('article.destroy');
});

// Dashboard CRUD Article Category
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:super_admin|admin']], function () {
    Route::get('/category-article', [CategoryArticleController::class, 'index'])->name('category_article.index');
    Route::get('/category-article/create', [CategoryArticleController::class, 'create'])->name('category_article.create');
    Route::post('/category-article/store', [CategoryArticleController::class, 'store'])->name('category_article.store');
    Route::get('/category-article/{id}/show', [CategoryArticleController::class, 'show'])->name('category_article.show');
    Route::get('/category-article/{id}/edit', [CategoryArticleController::class, 'edit'])->name('category_article.edit');
    Route::put('/category-article/{id}/update', [CategoryArticleController::class, 'update'])->name('category_article.update');
    Route::delete('/category-article/{id}/destroy', [CategoryArticleController::class, 'destroy'])->name('category_article.destroy');
});

// Dashboard Editor
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:super_admin|admin']], function () {
    Route::get('/editor', [DashboardController::class, 'editor'])->name('editor');
});

// Dashboard Writer
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:super_admin|admin']], function () {
    Route::get('/writer', [WriterController::class, 'index'])->name('writer.index');
    Route::get('/writer/create', [WriterController::class, 'create'])->name('writer.create');
    Route::post('/writer/store', [WriterController::class, 'store'])->name('writer.store');
    Route::get('/writer/{id}/change', [WriterController::class, 'edit'])->name('writer.edit');
    Route::put('/writer/{id}/update', [WriterController::class, 'update'])->name('writer.update');
});

// Dashboard Product
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:super_admin|admin']], function () {
    // Dashboard CRUD Product
    Route::get('/product/item', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    // Route::get('/product/{id}/show', [ProductController::class, 'show'])->name('product.show');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
    
    // Dashboard CRUD Product Category
    Route::get('/category-product', [CategoryProductController::class, 'index'])->name('category_product.index');
    Route::get('/category-product/create', [CategoryProductController::class, 'create'])->name('category_product.create');
    Route::post('/category-product/store', [CategoryProductController::class, 'store'])->name('category_product.store');
    Route::get('/category-product/{id}/show', [CategoryProductController::class, 'show'])->name('category_product.show');
    Route::get('/category-product/{id}/edit', [CategoryProductController::class, 'edit'])->name('category_product.edit');
    Route::put('/category-product/{id}/update', [CategoryProductController::class, 'update'])->name('category_product.update');
    Route::delete('/category-product/{id}/destroy', [CategoryProductController::class, 'destroy'])->name('category_product.destroy');
    
    // Dashboard CRUD Product Request
    Route::get('product/request', [ProductRequestController::class, 'index'])->name('product.request.index');
    Route::get('product/{id}/request/show', [ProductRequestController::class, 'show'])->name('product.request.show');
    Route::post('product/{id}/request/update', [ProductRequestController::class, 'update'])->name('product.request.update');
    Route::delete('product/{id}/request/destroy', [ProductRequestController::class, 'destroy'])->name('product.request.destroy');
});

Auth::routes();
