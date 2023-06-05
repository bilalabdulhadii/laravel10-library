<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AuthorController;
use App\Http\Controllers\admin\BookController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\admin\LoanController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Front\BooksController;
use App\Http\Controllers\Front\CategoriesController;
use App\Http\Controllers\Front\EventsController;
use App\Http\Controllers\Front\WritersController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::middleware('admin')->get('/image', [AdminController::class,'show_images'])->name('images');

/******************************* ADMIN PANEL ROUTES *******************************/
Route::middleware('admin')->get('/admin', [AdminController::class,'index'])->name('admin');
Route::get('/admin-login', [AdminController::class,'login'])->name('admin.login');
Route::post('/admin-check', [AdminController::class,'check'])->name('admin.check');


Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {

    /******************************* ADMIN PANEL ROUTES *******************************/
    Route::middleware('settings')->group(function (){
        Route::get('/settings', [SettingController::class,'index'])->name('settings');
        Route::post('/settings/update', [SettingController::class,'update'])->name('settings.update');
    });


    /****************************** ADMIN CATEGORY ROUTES *****************************/
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category','index')->name('category');

        Route::prefix('category')->name('category.')->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'destroy')->name('delete');
        });
    });

    /****************************** ADMIN AUTHOR ROUTES *****************************/
    Route::controller(AuthorController::class)->group(function () {
        Route::get('/author', 'index')->name('author');

        Route::prefix('author')->name('author.')->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'destroy')->name('delete');
        });
    });

    /****************************** ADMIN USER ROUTES *****************************/
    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index')->name('user');

        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'destroy')->name('delete');
        });
    });

    /****************************** ADMIN LOAN ROUTES *****************************/
    Route::controller(LoanController::class)->group(function () {
        Route::get('/loan', 'index')->name('loan');

        Route::prefix('loan')->name('loan.')->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::get('/return/{id}', 'return')->name('return');
            Route::get('/active/{id}', 'active')->name('active');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'destroy')->name('delete');
        });
    });

    /****************************** ADMIN BOOK ROUTES *****************************/
    Route::controller(BookController::class)->group(function () {
        Route::get('/book', 'index')->name('book');

        Route::prefix('book')->name('book.')->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'destroy')->name('delete');
        });
    });

    /****************************** ADMIN MESSAGE ROUTES *****************************/
    Route::controller(MessageController::class)->group(function () {
        Route::get('/message', 'index')->name('message');

        Route::prefix('message')->name('message.')->group(function () {
            Route::get('/show/{id}', 'show')->name('show');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'destroy')->name('delete');
        });
    });

    /****************************** ADMIN FAQ ROUTES *****************************/
    Route::controller(FaqController::class)->group(function () {
        Route::get('/faq', 'index')->name('faq');

        Route::prefix('faq')->name('faq.')->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'destroy')->name('delete');
        });
    });

    /****************************** ADMIN EVENT ROUTES *****************************/
    Route::controller(EventController::class)->group(function () {
        Route::get('/event', 'index')->name('event');

        Route::prefix('event')->name('event.')->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'destroy')->name('delete');
        });
    });
});

/****************************** FRONT ROUTES *****************************/
Route::middleware('front')->group(function () {

    Route::get('/', [FrontController::class, 'index'])->name('index');
    Route::post('/message', [MessageController::class, 'message'])->name('message');
    Route::get('/dashboard/loan/{id}', [DashboardController::class, 'loan'])->name('dashboard.loan');

    Route::name('index.')->controller(FrontController::class)->group(function () {
        Route::get('/about', 'about')->name('about');
        Route::get('/contact', 'contact')->name('contact');
        Route::get('/events', 'events')->name('events');
        Route::get('/services', 'services')->name('services');
        Route::get('/faq', 'faq')->name('faq');
    });

    Route::name('index.')->prefix('books')->controller(BooksController::class)->group(function () {

        Route::get('/', 'index')->name('books');
        Route::name('books.')->group(function () {
            Route::get('/show/{id}', 'show')->name('show');
            Route::post('/loan/create/{id}', 'create')->name('loan.create');
            Route::get('/loan/', 'loan')->name('loan');
        });
    });

    Route::name('index.')->prefix('writers')->controller(WritersController::class)->group(function () {

        Route::get('/', 'index')->name('writers');
        Route::name('writers.')->group(function () {
            Route::get('/show/{id}', 'show')->name('show');
        });
    });

    Route::name('index.')->prefix('categories')->controller(CategoriesController::class)->group(function () {

        Route::get('/', 'index')->name('categories');
        Route::get('/{id}', 'show')->name('categories.show');
    });

    Route::name('index.')->prefix('events')->controller(EventsController::class)->group(function () {

        Route::get('/', 'index')->name('events');
        Route::get('/{id}', 'show')->name('events.show');
    });


    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::get('/notifications', function () {
            return view('notifications');
        })->name('notifications');
    });
});

Route::get('/coming-soon', [FrontController::class,'coming_soon'])->name('coming-soon');

/*
// 1. write in the route
Route::get('/hello', function (){
    return 'Hello World!';
});

// 2. call view in route
Route::get('/', function () {
    return view('welcome');
});

// 3. call controller function
Route::get('/home', [HomeController::class,'index'])->name('home');

// 4. route -> controller -> view
Route::get('/test', [HomeController::class,'test'])->name('test');

// 5. route with parameters
Route::get('/test2/{id}/{number}', [HomeController::class,'test2'])->name('test2');

// 6. send with post method
Route::post('/save', [HomeController::class,'save'])->name('save');
*/


