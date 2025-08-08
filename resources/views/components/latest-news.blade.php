@if($latestNews->isNotEmpty())
<!-- Latest News -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-12">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Berita Terbaru</h2>
                <p class="text-lg text-gray-600">Informasi terkini seputar kegiatan dan pencapaian sekolah</p>
            </div>
            <a href="#" class="inline-flex items-center space-x-2 text-primary hover:text-blue-700 font-medium">
                <span>Lihat Semua</span>
                <div class="w-5 h-5 flex items-center justify-center"><i class="ri-arrow-right-line"></i></div>
            </a>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($latestNews as $news)
            <article class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <div class="h-48 bg-cover bg-center" style="background-image: url('{{ $news->image_url ? Illuminate\Support\Facades\Storage::url($news->image_url) : 'https://readdy.ai/api/search-image?query=education' }}')"></div>
                <div class="p-6">
                    <div class="flex items-center space-x-2 mb-3">
                        <span class="px-3 py-1 bg-primary bg-opacity-10 text-primary text-xs font-medium rounded-full capitalize">{{ $news->category->value }}</span>
                        @if($news->published_at)
                        <span class="text-gray-500 text-sm">{{ $news->published_at->format('d F Y') }}</span>
                        @endif
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 hover:text-primary transition-colors cursor-pointer">
                        <a href="#">{{ $news->title }}</a>
                    </h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($news->content), 120) }}</p>
                    <a href="#" class="inline-flex items-center space-x-2 text-primary hover:text-blue-700 font-medium">
                        <span>Baca Selengkapnya</span>
                        <div class="w-4 h-4 flex items-center justify-center"><i class="ri-arrow-right-line text-sm"></i></div>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif
