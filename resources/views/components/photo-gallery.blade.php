@if($galleryImages->isNotEmpty())
<!-- Photo Gallery -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Galeri Kegiatan</h2>
            <p class="text-lg text-gray-600">Dokumentasi berbagai kegiatan dan momen berharga di sekolah</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            @foreach($galleryImages as $image)
            <div class="gallery-item bg-gray-200 rounded-xl overflow-hidden cursor-pointer">
                <div class="h-48 bg-cover bg-center" title="{{ $image->title }}" style="background-image: url('{{ Illuminate\Support\Facades\Storage::url($image->image_url) }}')"></div>
            </div>
            @endforeach
        </div>
        <div class="text-center">
            <a href="#" class="inline-flex items-center space-x-2 bg-primary text-white px-6 py-3 rounded-button font-medium hover:bg-blue-700 transition-colors whitespace-nowrap">
                <span>Lihat Lebih Banyak</span>
                <div class="w-5 h-5 flex items-center justify-center"><i class="ri-image-line"></i></div>
            </a>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const galleryItems = document.querySelectorAll('.gallery-item');
    galleryItems.forEach(item => {
        item.addEventListener('click', function() {
            const bgImageDiv = this.querySelector('div');
            if (!bgImageDiv || !bgImageDiv.style.backgroundImage) return;

            const bgImage = bgImageDiv.style.backgroundImage;
            const imageUrl = bgImage.slice(5, -2); // Extracts URL from "url(...)"
            const imageTitle = bgImageDiv.title || 'Gallery Image';

            const lightbox = document.createElement('div');
            lightbox.className = 'fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center p-4 transition-opacity duration-300';
            lightbox.style.opacity = 0;

            lightbox.innerHTML = `
                <div class="relative max-w-4xl max-h-full transform scale-95 transition-transform duration-300">
                    <img src="${imageUrl}" alt="${imageTitle}" class="max-w-full max-h-[90vh] object-contain rounded-lg">
                    <button class="absolute -top-4 -right-4 w-10 h-10 bg-white bg-opacity-20 hover:bg-opacity-30 rounded-full flex items-center justify-center text-white transition-all" onclick="this.closest('.fixed').remove()">
                        <i class="ri-close-line text-xl"></i>
                    </button>
                </div>
            `;
            document.body.appendChild(lightbox);

            // Trigger fade in and scale up animations
            setTimeout(() => {
                lightbox.style.opacity = 1;
                lightbox.querySelector('.relative').style.transform = 'scale(1)';
            }, 10);

            lightbox.addEventListener('click', function(e) {
                if (e.target === lightbox) {
                    lightbox.remove();
                }
            });
        });
    });
});
</script>
@endpush
@endif
