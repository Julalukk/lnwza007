<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

// หน้า "รวมข่าวยาเสพติด"
Route::get('/', [NewsController::class, 'index'])->name('news.index');

// หน้า "รายการข่าวยาเสพติด"
Route::get('/news', [NewsController::class, 'index'])->name('news.list');

// หน้า "รายละเอียดข่าวยาเสพติด"
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Include other route files
require __DIR__.'/auth.php';
require __DIR__.'/settings.php';
