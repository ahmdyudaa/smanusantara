<?php

namespace App\Http\Controllers;

use App\Models\PageContent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function show($page_name)
    {
        $user = User::first(); // Get the first user to be the author of the page
        $page = PageContent::firstOrCreate(
            ['page_name' => $page_name],
            [
                'title' => 'Konten untuk ' . str_replace('_', ' ', Str::title($page_name))),
                'content' => '<h1>' . str_replace('_', ' ', Str::title($page_name)) . '</h1><p>Konten untuk halaman ini belum tersedia. Silakan edit melalui panel admin.</p>',
                'updated_by' => $user ? $user->id : 1, // Default to user 1 if no user exists
            ]
        );

        return view('pages.static.show', compact('page'));
    }

    public function akademik()
    {
        return view('pages.akademik');
    }

    public function kontak()
    {
        return view('pages.kontak');
    }
}
