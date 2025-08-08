@if($achievements->isNotEmpty())
<!-- Achievements Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-12">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Prestasi Terbaru</h2>
                <p class="text-lg text-gray-600">Pencapaian membanggakan dari siswa dan sekolah kami</p>
            </div>
            <a href="{{ route('achievements.index') }}" class="inline-flex items-center space-x-2 text-primary hover:text-blue-700 font-medium">
                <span>Lihat Semua Prestasi</span>
                <div class="w-5 h-5 flex items-center justify-center"><i class="ri-arrow-right-line"></i></div>
            </a>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($achievements as $achievement)
            <article class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col">
                <a href="{{ route('achievements.show', $achievement) }}">
                    <div class="h-48 bg-cover bg-center" style="background-image: url('{{ $achievement->image_url ? Illuminate\Support\Facades\Storage::url($achievement->image_url) : 'https://readdy.ai/api/search-image?query=achievement' }}')"></div>
                </a>
                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex items-center space-x-2 mb-3">
                        <span class="px-3 py-1 bg-blue-500 bg-opacity-10 text-blue-600 text-xs font-medium rounded-full capitalize">{{ $achievement->category->value }}</span>
                        <span class="text-gray-500 text-sm">{{ $achievement->date->format('d F Y') }}</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 hover:text-primary transition-colors">
                        <a href="{{ route('achievements.show', $achievement) }}">{{ $achievement->title }}</a>
                    </h3>
                    @if($achievement->description)
                    <p class="text-gray-600 mb-4 flex-grow">{{ Str::limit($achievement->description, 100) }}</p>
                    @endif
                    <a href="{{ route('achievements.show', $achievement) }}" class="inline-flex items-center space-x-2 text-primary hover:text-blue-700 font-medium mt-auto">
                        <span>Lihat Detail</span>
                        <div class="w-4 h-4 flex items-center justify-center"><i class="ri-arrow-right-line text-sm"></i></div>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif
