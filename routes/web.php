<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $blogs = \App\Models\Blog::where('status', 'published')->latest('publish_date')->take(3)->get();
    return view('index', compact('blogs'));
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'submit'])
    ->middleware('throttle:3,1')
    ->name('contact.submit');

Route::get('/blogs', function () {
    $blogs = \App\Models\Blog::where('status', 'published')->latest('publish_date')->paginate(12);
    return view('blogs', compact('blogs'));
})->name('blogs');

Route::get('/blogs/{slug}', function ($slug) {
    $blog = \App\Models\Blog::where('status', 'published')->where('slug', $slug)->firstOrFail();
    return view('blog-detail', compact('blog'));
})->name('blog-detail');

Route::get('/storage-link', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    return 'Storage link created successfully.';
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.submit');
    Route::post('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('dashboard', function () {
            return redirect()->route('admin.blogs.index');
        })->name('dashboard');

        Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);
    });
});