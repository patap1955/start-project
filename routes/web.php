<?php

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

Route::get("/", [\App\Http\Controllers\PageController::class, "index"])->name('index');
Route::get("/politics", [\App\Http\Controllers\PageController::class, "politics"])->name('politics');
Route::get("/news", [\App\Http\Controllers\NewsController::class, 'index'])->name("news-index");
Route::get('/news/{news:slug}', [\App\Http\Controllers\NewsController::class, "show"])->name("show-news");
//Route::post('/form-contacts', [\App\Http\Controllers\PageController::class, "formContacts"])->name("form-contacts");
//Route::get("/portfolio", [\App\Http\Controllers\PortfolioController::class, 'index'])->name("portfolio");
//Route::get("/certificates", [\App\Http\Controllers\CertificateController::class, 'index'])->name("cert");

//Route::get("/home", [\App\Http\Controllers\HomeController::class, "index"])->name("home");
//Route::post("/home", [\App\Http\Controllers\HomeController::class, "contact"])->name("contact");

Auth::routes();

Route::prefix('amg-admin')->group(function () {
    Route::get('/', \App\Http\Controllers\Admin\AdminController::class)->name("admin.index");
    Route::get("contacts", [\App\Http\Controllers\Admin\AdminContactsController::class, "index"])->name("admin.contacts");
    Route::post("gallery/{article}/img/delete", [\App\Http\Controllers\Admin\AdminImagesController::class, "deleteImageArticle"]);
    Route::resource("gallery", \App\Http\Controllers\Admin\AdminGalleryController::class);
    Route::resource("certificate", \App\Http\Controllers\Admin\AdminCertificateController::class);
    Route::resource("article", \App\Http\Controllers\Admin\AdminArticlesController::class);
    Route::resource("news", \App\Http\Controllers\Admin\AdminNewsController::class);
    Route::resource("setting", \App\Http\Controllers\Admin\SettingsController::class);
    Route::patch("contacts/{contact}", [\App\Http\Controllers\Admin\AdminContactsController::class, "completedStatus"])->name("admin.contacts.completed");
    Route::get("metrica", [\App\Http\Controllers\Admin\MetricaController::class, "index"])->name("metrica.index");
    Route::resource("roles", \App\Http\Controllers\Admin\RoleController::class);
    Route::resource("users", \App\Http\Controllers\Admin\UserController::class);
    Route::get("/errors", [\App\Http\Controllers\Admin\ErrorController::class, "error403"])->name("error403");
    //    Route::resource("categories", \App\Http\Controllers\Admin\CategoryController::class);
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
