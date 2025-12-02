@extends('layouts.app')

@section('title', $news->title . ' - SMA Nusantara Cendekia')

@section('content')
<div class="bg-white py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Breadcrumbs -->
        <div class="mb-6 text-sm text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-primary">Beranda</a>
            <span class="mx-2">/</span>
            <a href="{{ route('news.index') }}" class="hover:text-primary">Berita</a>
            <span class="mx-2">/</span>
            <span class="text-gray-700">{{ Str::limit($news->title, 30) }}</span>
        </div>

        <article>
            <!-- Title -->
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">{{ $news->title }}</h1>

            <!-- Meta Data -->
            <div class="flex items-center space-x-4 text-gray-500 mb-6">
                <span>Oleh: {{ $news->author->name ?? 'Admin' }}</span>
                <span>•</span>
                <span>{{ $news->published_at ? $news->published_at->format('d F Y') : '' }}</span>
                <span>•</span>
                <span class="px-3 py-1 bg-primary bg-opacity-10 text-primary text-xs font-medium rounded-full capitalize">{{ $news->category->value }}</span>
            </div>

            <!-- Header Image -->
            @if($news->image_url)
            <div class="mb-8 rounded-2xl overflow-hidden shadow-lg">
                <img src="{{ Illuminate\Support\Facades\Storage::url($news->image_url) }}" alt="{{ $news->title }}" class="w-full h-auto object-cover">
            </div>
            @endif

            <!-- Content -->
            <div class="prose max-w-none text-lg text-gray-700 leading-relaxed">
                {!! $news->content !!}
            </div>
        </article>

    </div>
</div>
@endsection

@push('styles')
<style>
    .prose h1, .prose h2, .prose h3, .prose h4 {
        color: #1f2937;
        font-weight: 700;
    }
    .prose p {
        margin-bottom: 1.25em;
    }
    .prose a {
        color: #1e40af;
        text-decoration: underline;
    }
    .prose blockquote {
        border-left-color: #1e40af;
        color: #374151;
    }
    .prose ul, .prose ol {
        margin-left: 1.25rem;
    }
</style>
@endpush
