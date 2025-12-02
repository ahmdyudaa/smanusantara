@extends('layouts.app')

@section('title', $page->title . ' - SMA Nusantara Cendekia')

@section('content')
<div class="bg-white py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Breadcrumbs -->
        <div class="mb-6 text-sm text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-primary">Beranda</a>
            <span class="mx-2">/</span>
            <span class="text-gray-700">{{ $page->title }}</span>
        </div>

        <article class="bg-gray-50 p-8 md:p-12 rounded-2xl shadow-sm">
            <!-- Content -->
            <div class="prose max-w-none text-lg text-gray-700 leading-relaxed">
                {!! $page->content !!}
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
