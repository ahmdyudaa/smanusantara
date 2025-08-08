<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $newsItems = News::where('is_active', true)
            ->latest()
            ->paginate(9);

        return view('pages.news.index', [
            'newsItems' => $newsItems,
        ]);
    }

    public function show(News $news)
    {
        // Ensure the news is active before showing, or handle as needed
        if (!$news->is_active) {
            abort(404);
        }

        return view('pages.news.show', [
            'news' => $news,
        ]);
    }
}
