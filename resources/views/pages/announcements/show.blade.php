@extends('layouts.app')

@section('title', $announcement->title . ' - SMA Nusantara Cendekia')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Breadcrumbs -->
        <div class="mb-6 text-sm text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-primary">Beranda</a>
            <span class="mx-2">/</span>
            <a href="{{ route('announcements.index') }}" class="hover:text-primary">Pengumuman</a>
            <span class="mx-2">/</span>
            <span class="text-gray-700">{{ Str::limit($announcement->title, 30) }}</span>
        </div>

        <div class="bg-white p-8 md:p-12 rounded-2xl shadow-sm">
            <article>
                <!-- Meta Data -->
                <div class="flex flex-wrap items-center gap-4 text-gray-500 mb-4">
                    <span>{{ $announcement->published_at ? $announcement->published_at->format('d F Y') : '' }}</span>
                    <span>•</span>
                    <span class="capitalize">{{ $announcement->category->value }}</span>
                    <span>•</span>
                    @php
                        $badgeClass = match($announcement->priority) {
                            \App\Enums\AnnouncementPriority::URGENT => 'bg-red-500',
                            \App\Enums\AnnouncementPriority::PENTING => 'bg-primary',
                            \App\Enums\AnnouncementPriority::INFO => 'bg-secondary',
                        };
                    @endphp
                    <span class="px-3 py-1 {{ $badgeClass }} text-white text-xs font-medium rounded-full capitalize">{{ $announcement->priority->value }}</span>
                </div>

                <!-- Title -->
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-8">{{ $announcement->title }}</h1>

                <!-- Content -->
                <div class="prose max-w-none text-lg text-gray-700 leading-relaxed">
                    {!! $announcement->content !!}
                </div>
            </article>
        </div>

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
