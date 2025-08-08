@if($announcements->isNotEmpty())
<!-- Important Announcements -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Pengumuman Penting</h2>
            <p class="text-lg text-gray-600">Informasi terbaru yang perlu diketahui oleh seluruh civitas akademika</p>
        </div>
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
                                <h4 class="text-lg font-bold text-gray-900">{{ $announcement->title }}</h4>
                                <span class="px-3 py-1 {{ $badgeClass }} text-white text-xs font-medium rounded-full capitalize">{{ $announcement->priority->value }}</span>
                            </div>
                            <div class="text-gray-600 mb-3 prose max-w-none">{!! $announcement->content !!}</div>
                            <div class="flex items-center space-x-4 text-sm text-gray-500">
                                <span>{{ $announcement->published_at->format('d F Y') }}</span>
                                <span>•</span>
                                <span class="capitalize">{{ $announcement->category->value }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
