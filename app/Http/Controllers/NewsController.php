<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

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
}
