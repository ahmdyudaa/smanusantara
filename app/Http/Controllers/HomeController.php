<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Announcement;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $sliders = Slider::where('is_active', true)->orderBy('order')->get();
        $latestNews = News::where('is_active', true)->latest()->take(3)->get();
        $announcements = Announcement::where('is_active', true)->where('published_at', '<=', now())
            ->where(function ($query) {
                $query->whereNull('expired_at')->orWhere('expired_at', '>', now());
            })
            ->latest()->take(3)->get();
        $galleryImages = Gallery::where('is_active', true)->latest()->take(8)->get();
        $testimonials = Testimonial::where('is_active', true)->latest()->take(3)->get();
        $achievements = Achievement::where('is_active', true)->latest()->take(3)->get();

        $achievementCount = Achievement::where('is_active', true)->count();

        return view('pages.home', compact(
            'sliders',
            'latestNews',
            'announcements',
            'galleryImages',
            'testimonials',
            'achievements',
            'achievementCount'
        ));
    }
}
