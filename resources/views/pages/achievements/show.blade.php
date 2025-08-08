@extends('layouts.app')

@section('title', $achievement->title . ' - SMA Nusantara Cendekia')

@section('content')
<div class="bg-white py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Breadcrumbs -->
        <div class="mb-6 text-sm text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-primary">Beranda</a>
            <span class="mx-2">/</span>
            <a href="{{ route('achievements.index') }}" class="hover:text-primary">Prestasi</a>
            <span class="mx-2">/</span>
            <span class="text-gray-700">{{ Str::limit($achievement->title, 30) }}</span>
        </div>

        <article>
            <!-- Title -->
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">{{ $achievement->title }}</h1>

            <!-- Meta Data -->
            <div class="flex items-center space-x-4 text-gray-500 mb-6">
                <span>Tanggal: {{ $achievement->date->format('d F Y') }}</span>
                <span>•</span>
                <span class="px-3 py-1 bg-blue-500 bg-opacity-10 text-blue-600 text-xs font-medium rounded-full capitalize">{{ $achievement->category->value }}</span>
            </div>

            <!-- Header Image -->
            @if($achievement->image_url)
            <div class="mb-8 rounded-2xl overflow-hidden shadow-lg">
                <img src="{{ Illuminate\Support\Facades\Storage::url($achievement->image_url) }}" alt="{{ $achievement->title }}" class="w-full h-auto object-cover">
            </div>
            @endif

            <!-- Content/Description -->
            @if($achievement->description)
            <div class="prose max-w-none text-lg text-gray-700 leading-relaxed">
                {!! $achievement->description !!}
            </div>
            @endif
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
</style>
@endpush
