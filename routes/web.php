<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryArticleController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductRequestController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DataEntryController;
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

// Route::post('/submitemails', [DashboardController::class, 'emailputfrontend'])->name('newsletter');

// Route::group(['prefix' =>'home'], function () {
    Route::post('/submitemails/post', [GuestController::class, 'emailputfrontend'])->name('newsletter');
    // Route::get('/article/show/{article:slug}', [ArticleController::class, 'show'])->name('article.show');
    // Route::delete('/article/destroy/{article:slug}', [ArticleController::class, 'destroy'])->name('article.destroy');
// });

Route::get('/product', [FrontEndController::class, 'product'])->name('product');
Route::get('/product/{product:slug}', [FrontEndController::class, 'product_show'])->name('product.show');
Route::get('/product/category/{name}', [FrontEndController::class, 'product_filter'])->name('product.filter');
Route::post('/product/request', [FrontEndController::class, 'product_request'])->name('product.request');
Route::get('/storage/{product_pdfs}', [FrontEndController::class, 'download_productPdf'])->name('download_product.pdf');
// Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');


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
    Route::get('/subscribers_news', [DashboardController::class, 'getsubs'])->name('subscribers_news.index');
    Route::delete('/subscribers_news/{id}', 'DashboardController@subscribers_news_destroy')->name('subscribers_news.destroy');
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

    // Dashboard CRUD Buyer
    Route::get('/buyer',[BuyerController::class,'index'])->name('buyer.index');
    Route::get('/buyer/create', [BuyerController::class, 'create'])->name('buyer.create');
    Route::post('/buyer/store', [BuyerController::class, 'store'])->name('buyer.store');
    Route::get('/buyer/{id}/edit', [BuyerController::class, 'edit'])->name('buyer.edit');
    Route::put('/buyer/{id}/update', [BuyerController::class, 'update'])->name('buyer.update');
    Route::delete('/buyer/{id}/destroy', [BuyerController::class, 'destroy'])->name('buyer.destroy');
    Route::get('/buyer/{id}/forward',[BuyerController::class,'buyer_to_transactional_store_forward'])->name('transactional.forward');


    // Dashboard CRUD Transactional using BuyerController

    Route::get('/transactional',[BuyerController::class,'transactional_index'])->name('transactional.index');
    Route::get('/transactional/{id}/edit',[BuyerController::class,'transactional_edit'])->name('transactional.edit');
    Route::put('/transactional/{id}/update', [BuyerController::class, 'transactional_update'])->name('transactional.update');

    // Dashboard CRUD Data Entry Product
    Route::get('/dataentry',[DataEntryController::class,'index'])->name('dataentry.index');
    Route::get('/dataentry/create', [DataEntryController::class, 'create'])->name('dataentry.create');
    Route::post('/dataentry/store', [DataEntryController::class, 'store'])->name('dataentry.store');
    Route::delete('/dataentry/{id}/destroy', [DataEntryController::class, 'destroy'])->name('dataentry.destroy');

    // Dashboard CRUD Data Entry Payment
    Route::get('/dataentry_payment',[DataEntryController::class,'index_payment'])->name('dataentry_payment.index');
    Route::get('/dataentry_payment/create', [DataEntryController::class, 'create_payment'])->name('dataentry_payment.create');
    Route::post('/dataentry_payment/store', [DataEntryController::class, 'store_payment'])->name('dataentry_payment.store');
    Route::delete('/dataentry_payment/{id}/destroy', [DataEntryController::class, 'destroy_payment'])->name('dataentry_payment.destroy');

    // Dashboard CRUD Data Entry Shipping Terms
    Route::get('/dataentry_shipping',[DataEntryController::class,'index_shipping'])->name('dataentry_shipping.index');
    Route::get('/dataentry_shipping/create', [DataEntryController::class, 'create_shipping'])->name('dataentry_shipping.create');
    Route::post('/dataentry_shipping/store', [DataEntryController::class, 'store_shipping'])->name('dataentry_shipping.store');
    Route::delete('/dataentry_shipping/{id}/destroy', [DataEntryController::class, 'destroy_shipping'])->name('dataentry_shipping.destroy');

    // Dashboard CRUD Transactional Data
    // Route::get('/dataentry',[DataEntryController::class,'indexin'])->name('transactional.index');

});

Auth::routes();
