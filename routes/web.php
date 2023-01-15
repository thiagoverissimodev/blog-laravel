<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ContentController;
use App\Http\Controllers\Dashboard\GalleryController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\ImageController;
use App\Http\Controllers\Dashboard\PagesController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\VideoController;
use App\Http\Controllers\Site\SiteController;
use App\Models\Section;
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
// $sectionsMenu = Section::where('menu', '1')->get();

// foreach($sectionsMenu as $linkMenu){
    //     Route::get('/'.$linkMenu->url, [SiteController::class, 'makePages'])->name('make-pages');
    // }
    
    Route::get('/', [SiteController::class, 'index'])->name('home');
    Route::get('/artigos', [SiteController::class, 'articles'])->name('site.articles.index');
    Route::get('/artigos/{id}', [App\Http\Controllers\Site\ArticleController::class, 'show'])->name('site.articles.show');

Route::group(['namespace', 'Dashboard', 'prefix' => 'dashboard'], function(){
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'auth'])->name('login');
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/sair', [AuthController::class, 'logout'])->name('logout');
        Route::get('/principal', [HomeController::class, 'index'])->name('dashboard.home');

        Route::get('/secao', [SectionController::class, 'index'])->name('dashboard.section');
        Route::get('/secao/adicionar', [SectionController::class, 'create'])->name('dashboard.section.create');
        Route::post('/secao/adicionar', [SectionController::class, 'store'])->name('dashboard.section.store');
        Route::get('/secao/editar/{id}', [SectionController::class, 'show'])->name('dashboard.section.show');
        Route::put('/secao/editar/{id}', [SectionController::class, 'update'])->name('dashboard.section.update');
        Route::get('/secao/deletar/{id}', [SectionController::class, 'destroy'])->name('dashboard.section.delete');
        
        Route::get('/categoria', [CategoryController::class, 'index'])->name('dashboard.category');
        Route::get('/categoria/adicionar', [CategoryController::class, 'create'])->name('dashboard.category.create');
        Route::post('/categoria/adicionar', [CategoryController::class, 'store'])->name('dashboard.category.store');
        Route::get('/categoria/editar/{id}', [CategoryController::class, 'show'])->name('dashboard.category.show');
        Route::put('/categoria/editar/{id}', [CategoryController::class, 'update'])->name('dashboard.category.update');
        Route::get('/categoria/deletar/{id}', [CategoryController::class, 'destroy'])->name('dashboard.category.delete');

        Route::get('/conteudo', [ContentController::class, 'index'])->name('dashboard.content');
        Route::get('/conteudo/adicionar', [ContentController::class, 'create'])->name('dashboard.content.create');
        Route::post('/conteudo/adicionar', [ContentController::class, 'store'])->name('dashboard.content.store');
        Route::get('/conteudo/editar/{id}', [ContentController::class, 'show'])->name('dashboard.content.show');
        Route::put('/conteudo/editar/{id}', [ContentController::class, 'update'])->name('dashboard.content.update');
        Route::get('/conteudo/deletar/{id}', [ContentController::class, 'destroy'])->name('dashboard.content.delete');

        Route::get('/artigos', [ArticleController::class, 'index'])->name('dashboard.articles');
        Route::get('/artigos/adicionar', [ArticleController::class, 'create'])->name('dashboard.articles.create');
        Route::post('/artigos/adicionar', [ArticleController::class, 'store'])->name('dashboard.articles.store');
        Route::get('/artigos/editar/{id}', [ArticleController::class, 'show'])->name('dashboard.articles.show');
        Route::put('/artigos/editar/{id}', [ArticleController::class, 'update'])->name('dashboard.articles.update');
        Route::get('/artigos/deletar/{id}', [ArticleController::class, 'destroy'])->name('dashboard.articles.delete');

        Route::get('/paginas', [PagesController::class, 'index'])->name('dashboard.pages');
        Route::get('/paginas/adicionar', [PagesController::class, 'create'])->name('dashboard.pages.create');
        Route::post('/paginas/adicionar', [PagesController::class, 'store'])->name('dashboard.pages.store');
        Route::get('/paginas/editar/{id}', [PagesController::class, 'show'])->name('dashboard.pages.show');
        Route::put('/paginas/editar/{id}', [PagesController::class, 'update'])->name('dashboard.pages.update');
        Route::get('/paginas/deletar/{id}', [PagesController::class, 'destroy'])->name('dashboard.pages.delete');


        Route::get('/galeria', [GalleryController::class, 'index'])->name('dashboard.gallery');
        Route::get('/galeria/adicionar', [GalleryController::class, 'create'])->name('dashboard.gallery.create');
        Route::post('/galeria/adicionar', [GalleryController::class, 'store'])->name('dashboard.gallery.store');
        Route::get('/galeria/editar/{id}', [GalleryController::class, 'show'])->name('dashboard.gallery.show');
        Route::put('/galeria/editar/{id}', [GalleryController::class, 'update'])->name('dashboard.gallery.update');
        Route::get('/galeria/deletar/{id}', [GalleryController::class, 'destroy'])->name('dashboard.gallery.delete');

        Route::get('/video', [VideoController::class, 'index'])->name('dashboard.video');
        Route::get('/video/adicionar', [VideoController::class, 'create'])->name('dashboard.video.create');
        Route::post('/video/adicionar', [VideoController::class, 'store'])->name('dashboard.video.store');
        Route::get('/video/editar/{id}', [VideoController::class, 'show'])->name('dashboard.video.show');
        Route::put('/video/editar/{id}', [VideoController::class, 'update'])->name('dashboard.video.update');
        Route::get('/video/deletar/{id}', [VideoController::class, 'deletar'])->name('dashboard.video.delete');

        Route::get('/imagens', [ImageController::class, 'index'])->name('dashboard.image');
        Route::get('/imagens/adicionar', [ImageController::class, 'create'])->name('dashboard.image.create');
        Route::post('/imagens/adicionar', [ImageController::class, 'store'])->name('dashboard.image.store');
        Route::get('/imagens/editar/{id}', [ImageController::class, 'show'])->name('dashboard.image.show');
        Route::put('/imagens/editar/{id}', [ImageController::class, 'update'])->name('dashboard.image.update');
        Route::get('/imagens/deletar/{id}', [ImageController::class, 'destroy'])->name('dashboard.image.delete');

        Route::get('/usuario', [UserController::class, 'index'])->name('dashboard.user');
        Route::get('/usuario/adicionar', [UserController::class, 'create'])->name('dashboard.user.create');
        Route::post('/usuario/adicionar', [UserController::class, 'store'])->name('dashboard.user.store');
        Route::get('/usuario/editar/{id}', [UserController::class, 'show'])->name('dashboard.user.show');
        Route::put('/usuario/editar/{id}', [UserController::class, 'update'])->name('dashboard.user.update');
        Route::get('/usuario/deletar/{id}', [UserController::class, 'destroy'])->name('dashboard.user.delete');
    });
});

