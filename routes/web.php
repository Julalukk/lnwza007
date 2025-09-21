<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// หน้า "รวมข่าวยาเสพติด"
Route::get('/', [NewsController::class, 'index'])->name('news.index');

// หน้า "รายการข่าวยาเสพติด"
Route::get('/news', [NewsController::class, 'index'])->name('news.list');

// หน้า "รายละเอียดข่าวยาเสพติด"
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

// CRUD Routes สำหรับข่าวยาเสพติด - เฉพาะ admin เท่านั้น
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/news-create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news-store', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news-edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news-update/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news-delete/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
});

// Dashboard route - เฉพาะ admin เท่านั้น
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:admin'])->name('dashboard');

// Teacher routes - ใช้ Middleware Group
Route::middleware(['auth', 'role:admin,teacher'])->group(function () {
    Route::get('/teacher', function () {
        return view('teacher');
    })->name('teacher');
});

// Admin routes - ใช้เมธอด middleware() โดยตรง
Route::get('/admin', function () {
    return view('dashboard'); // ใช้ dashboard view เป็นตัวอย่าง
})->middleware('auth', 'role:admin')->name('admin');

// Product routes
Route::get('product-index', function () {
    $products = Product::get();
    return view('query-test', compact('products'));
})->name("product.index");

Route::get('product-form', function () {
    return view('product-form');
})->name("product.form");

Route::post('/product-submit', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ], [
        'name.required' => 'กรุณากรอกชื่อสินค้า',
        'description.required' => 'กรุณากรอกรายละเอียดสินค้า',
        'price.required' => 'กรุณากรอกราคา',
        'price.numeric' => 'ราคาต้องเป็นตัวเลข',
        'image.image' => 'ไฟล์ต้องเป็นรูปภาพ'
    ]);

    // ตรวจสอบว่ามีการอัปโหลดรูปภาพ
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $file = $request->file('image');
        
        // ตรวจสอบขนาดไฟล์ (ขีดจำกัด 2MB)
        if ($file->getSize() > 2 * 1024 * 1024) {
            return redirect()->back()->withErrors(['image' => 'ไฟล์มีขนาดเกินขีดจำกัด']);
        }
        
        // ตรวจสอบประเภทของไฟล์ (ยอมรับเฉพาะภาพ)
        if (!in_array($file->getMimeType(), ['image/jpeg', 'image/png', 'image/jpg'])) {
            return redirect()->back()->withErrors(['image' => 'ไฟล์ไม่ใช่ประเภทภาพที่รองรับ']);
        }
        
        // เก็บไฟล์
        $imagePath = $file->store('uploads', 'public');
        $url = Storage::url($imagePath);
        $data["image"] = $url;
    }

    // บันทึกข้อมูลในฐานข้อมูล
    Product::create($data);

    return redirect()->route('product.index')->with('success', 'เพิ่มสินค้าแล้ว!');
})->name('product.submit');

// Include other route files
require __DIR__.'/auth.php';
require __DIR__.'/settings.php';
