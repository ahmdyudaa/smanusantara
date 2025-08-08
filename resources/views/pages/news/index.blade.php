@extends('layouts.app')

@section('title', 'Arsip Berita - SMA Nusantara Cendekia')

@section('content')
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900">Arsip Berita</h1>
            <p class="text-lg text-gray-600 mt-2">Kumpulan berita dan informasi terkini seputar sekolah.</p>
        </div>

        @if($newsItems->isNotEmpty())
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($newsItems as $news)
                <article class="bg-gray-50 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <a href="{{ route('news.show', $news) }}">
                        <div class="h-48 bg-cover bg-center" style="background-image: url('{{ $news->image_url ? Illuminate\Support\Facades\Storage::url($news->image_url) : 'https://readdy.ai/api/search-image?query=education,news' }}')"></div>
                    </a>
                    <div class="p-6">
                        <div class="flex items-center space-x-2 mb-3">
                            <span class="px-3 py-1 bg-primary bg-opacity-10 text-primary text-xs font-medium rounded-full capitalize">{{ $news->category->value }}</span>
                            @if($news->published_at)
                            <span class="text-gray-500 text-sm">{{ $news->published_at->format('d F Y') }}</span>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 hover:text-primary transition-colors">
                            <a href="{{ route('news.show', $news) }}">{{ $news->title }}</a>
                        </h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($news->content), 120) }}</p>
                        <a href="{{ route('news.show', $news) }}" class="inline-flex items-center space-x-2 text-primary hover:text-blue-700 font-medium">
                            <span>Baca Selengkapnya</span>
                            <div class="w-4 h-4 flex items-center justify-center"><i class="ri-arrow-right-line text-sm"></i></div>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $newsItems->links() }}
            </div>
        @else
            <div class="text-center py-16">
                <p class="text-gray-500 text-lg">Tidak ada berita yang ditemukan.</p>
            </div>
        @endif
    </div>
</div>
@endsection
