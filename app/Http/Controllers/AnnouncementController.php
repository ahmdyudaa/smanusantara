<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::where('is_active', true)
            ->where('published_at', '<=', now())
            ->where(function ($query) {
                $query->whereNull('expired_at')->orWhere('expired_at', '>', now());
            })
            ->latest()
            ->paginate(10);

        return view('pages.announcements.index', [
            'announcements' => $announcements,
        ]);
    }

    public function show(Announcement $announcement)
    {
        if (!$announcement->is_active) {
            abort(404);
        }

        return view('pages.announcements.show', [
            'announcement' => $announcement,
        ]);
    }
}
