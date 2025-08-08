<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::where('is_active', true)
            ->latest('date')
            ->paginate(9);

        return view('pages.achievements.index', [
            'achievements' => $achievements,
        ]);
    }

    public function show(Achievement $achievement)
    {
        if (!$achievement->is_active) {
            abort(404);
        }

        return view('pages.achievements.show', [
            'achievement' => $achievement,
        ]);
    }
}
