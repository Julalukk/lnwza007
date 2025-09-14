<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::published()->latest('published_at')->get();
        
        return view('news.index', compact('news'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::published()->findOrFail($id);
        
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'content' => 'required|string',
            'category' => 'required|string|in:ยาเสพติด,การจับกุม,การป้องกัน,กฎหมาย',
            'author' => 'required|string|max:255',
            'source_url' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'published_at' => 'required|date'
        ], [
            'title.required' => 'กรุณากรอกหัวข้อข่าว',
            'summary.required' => 'กรุณากรอกสรุปข่าว',
            'content.required' => 'กรุณากรอกเนื้อหาข่าว',
            'category.required' => 'กรุณาเลือกหมวดหมู่',
            'author.required' => 'กรุณากรอกชื่อผู้เขียน',
            'published_at.required' => 'กรุณาเลือกวันที่เผยแพร่',
            'image.image' => 'ไฟล์ต้องเป็นรูปภาพ'
        ]);

        // ตรวจสอบการอัปโหลดรูปภาพ
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            
            // ตรวจสอบขนาดไฟล์ (ขีดจำกัด 2MB)
            if ($file->getSize() > 2 * 1024 * 1024) {
                return redirect()->back()->withErrors(['image' => 'ไฟล์มีขนาดเกินขีดจำกัด']);
            }
            
            // ตรวจสอบประเภทของไฟล์
            if (!in_array($file->getMimeType(), ['image/jpeg', 'image/png', 'image/jpg'])) {
                return redirect()->back()->withErrors(['image' => 'ไฟล์ไม่ใช่ประเภทภาพที่รองรับ']);
            }
            
            // เก็บไฟล์
            $imagePath = $file->store('news', 'public');
            $url = Storage::url($imagePath);
            $data['image_url'] = $url;
        }

        $data['status'] = 'published';
        $data['slug'] = \Str::slug($data['title']);

        News::create($data);

        return redirect()->route('news.index')->with('success', 'เพิ่มข่าวเรียบร้อยแล้ว!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = News::findOrFail($id);
        
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'content' => 'required|string',
            'category' => 'required|string|in:ยาเสพติด,การจับกุม,การป้องกัน,กฎหมาย',
            'author' => 'required|string|max:255',
            'source_url' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'published_at' => 'required|date'
        ], [
            'title.required' => 'กรุณากรอกหัวข้อข่าว',
            'summary.required' => 'กรุณากรอกสรุปข่าว',
            'content.required' => 'กรุณากรอกเนื้อหาข่าว',
            'category.required' => 'กรุณาเลือกหมวดหมู่',
            'author.required' => 'กรุณากรอกชื่อผู้เขียน',
            'published_at.required' => 'กรุณาเลือกวันที่เผยแพร่',
            'image.image' => 'ไฟล์ต้องเป็นรูปภาพ'
        ]);

        // ตรวจสอบการอัปโหลดรูปภาพใหม่
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            
            // ตรวจสอบขนาดไฟล์
            if ($file->getSize() > 2 * 1024 * 1024) {
                return redirect()->back()->withErrors(['image' => 'ไฟล์มีขนาดเกินขีดจำกัด']);
            }
            
            // ตรวจสอบประเภทของไฟล์
            if (!in_array($file->getMimeType(), ['image/jpeg', 'image/png', 'image/jpg'])) {
                return redirect()->back()->withErrors(['image' => 'ไฟล์ไม่ใช่ประเภทภาพที่รองรับ']);
            }
            
            // ลบรูปเก่า (ถ้ามี)
            if ($news->image_url) {
                $oldImagePath = str_replace('/storage/', '', $news->image_url);
                Storage::disk('public')->delete($oldImagePath);
            }
            
            // เก็บไฟล์ใหม่
            $imagePath = $file->store('news', 'public');
            $url = Storage::url($imagePath);
            $data['image_url'] = $url;
        }

        $data['slug'] = \Str::slug($data['title']);

        $news->update($data);

        return redirect()->route('news.index')->with('success', 'แก้ไขข่าวเรียบร้อยแล้ว!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        
        // ลบรูปภาพ (ถ้ามี)
        if ($news->image_url) {
            $oldImagePath = str_replace('/storage/', '', $news->image_url);
            Storage::disk('public')->delete($oldImagePath);
        }
        
        $news->delete();

        return redirect()->route('news.index')->with('success', 'ลบข่าวเรียบร้อยแล้ว!');
    }
}
