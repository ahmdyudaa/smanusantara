@extends('layouts.app')

@section('title', 'Arsip Pengumuman - SMA Nusantara Cendekia')

@section('content')
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900">Arsip Pengumuman</h1>
            <p class="text-lg text-gray-600 mt-2">Informasi penting untuk seluruh civitas akademika.</p>
        </div>

        @if($announcements->isNotEmpty())
            <div class="bg-white rounded-2xl shadow-sm p-8">
                <div class="space-y-6">
                    @foreach($announcements as $announcement)
                        @php
                            $priorityClass = match($announcement->priority) {
                                \App\Enums\AnnouncementPriority::URGENT => 'bg-red-50 border-red-500',
                                \App\Enums\AnnouncementPriority::PENTING => 'bg-blue-50 border-primary',
                                \App\Enums\AnnouncementPriority::INFO => 'bg-green-50 border-secondary',
                            };
                            $iconClass = match($announcement->priority) {
                                \App\Enums\AnnouncementPriority::URGENT => 'bg-red-500',
                                \App\Enums\AnnouncementPriority::PENTING => 'bg-primary',
                                \App\Enums\AnnouncementPriority::INFO => 'bg-secondary',
                            };
                             $icon = match($announcement->priority) {
                                \App\Enums\AnnouncementPriority::URGENT => 'ri-alarm-line',
                                \App\Enums\AnnouncementPriority::PENTING => 'ri-calendar-line',
                                \App\Enums\AnnouncementPriority::INFO => 'ri-information-line',
                            };
                            $badgeClass = match($announcement->priority) {
                                \App\Enums\AnnouncementPriority::URGENT => 'bg-red-500',
                                \App\Enums\AnnouncementPriority::PENTING => 'bg-primary',
                                \App\Enums\AnnouncementPriority::INFO => 'bg-secondary',
                            };
                        @endphp
                    <div class="announcement-item {{ $priorityClass }} rounded-xl p-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 {{ $iconClass }} rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="{{ $icon }} text-white text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center space-x-3 mb-2">
                                    <a href="{{ route('announcements.show', $announcement) }}" class="text-lg font-bold text-gray-900 hover:text-primary">{{ $announcement->title }}</a>
                                    <span class="px-3 py-1 {{ $badgeClass }} text-white text-xs font-medium rounded-full capitalize">{{ $announcement->priority->value }}</span>
                                </div>
                                <div class="text-gray-600 mb-3 prose max-w-none">{!! Str::limit(strip_tags($announcement->content), 200) !!}</div>
                                <div class="flex items-center space-x-4 text-sm text-gray-500">
                                    <span>{{ $announcement->published_at->format('d F Y') }}</span>
                                    <span>•</span>
                                    <span class="capitalize">{{ $announcement->category->value }}</span>
                                    <span>•</span>
                                    <a href="{{ route('announcements.show', $announcement) }}" class="hover:text-primary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-12">
                {{ $announcements->links() }}
            </div>
        @else
            <div class="text-center py-16">
                <p class="text-gray-500 text-lg">Tidak ada pengumuman yang ditemukan.</p>
            </div>
        @endif
    </div>
</div>
@endsection
