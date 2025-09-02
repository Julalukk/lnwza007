<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

// หน้า "รวมข่าวยาเสพติด"
Route::get('/', [NewsController::class, 'index'])->name('news.index');

// หน้า "รายละเอียดข่าวยาเสพติด"
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
