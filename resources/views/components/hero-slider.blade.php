@if($sliders->isNotEmpty())
<!-- Hero Section with Slider -->
<section class="relative h-screen bg-cover bg-center slider-container">
    <div class="slider-track" id="hero-slider">
        @foreach($sliders as $slider)
        <div class="slider-slide relative w-full h-screen bg-cover bg-center" style="background-image: url('{{ Illuminate\Support\Facades\Storage::url($slider->image_url) }}')">
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
                <div class="text-white max-w-3xl">
                    <h1 class="text-5xl md:text-6xl font-bold mb-6">{{ $slider->title }}</h1>
                    <p class="text-xl md:text-2xl mb-8 leading-relaxed">{{ $slider->description }}</p>
                    @if($slider->button_text && $slider->button_url)
                    <a href="{{ $slider->button_url }}" class="inline-flex items-center space-x-3 bg-primary text-white px-8 py-4 rounded-button font-medium hover:bg-blue-700 transition-colors whitespace-nowrap">
                        <span>{{ $slider->button_text }}</span>
                        <div class="w-5 h-5 flex items-center justify-center"><i class="ri-arrow-right-line"></i></div>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($sliders->count() > 1)
    <!-- Slider Navigation -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-3">
        @foreach($sliders as $index => $slider)
        <button class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition-all slider-dot @if($loop->first) active bg-white @endif" data-slide="{{ $index }}"></button>
        @endforeach
    </div>
    <!-- Slider Controls -->
    <button class="absolute left-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white bg-opacity-20 hover:bg-opacity-30 rounded-full flex items-center justify-center text-white transition-all" id="prev-slide">
        <div class="w-6 h-6 flex items-center justify-center"><i class="ri-arrow-left-line text-xl"></i></div>
    </button>
    <button class="absolute right-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white bg-opacity-20 hover:bg-opacity-30 rounded-full flex items-center justify-center text-white transition-all" id="next-slide">
        <div class="w-6 h-6 flex items-center justify-center"><i class="ri-arrow-right-line text-xl"></i></div>
    </button>
    @endif
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const sliderTrack = document.getElementById('hero-slider');
    if (!sliderTrack) return;
    const slides = sliderTrack.querySelectorAll('.slider-slide');
    const dots = document.querySelectorAll('.slider-dot');
    const prevBtn = document.getElementById('prev-slide');
    const nextBtn = document.getElementById('next-slide');
    let currentSlide = 0;
    const totalSlides = slides.length;

    if (totalSlides <= 1) return;

    function updateSlider() {
        const translateX = -currentSlide * 100;
        sliderTrack.style.transform = `translateX(${translateX}%)`;
        dots.forEach((dot, index) => {
            if (index === currentSlide) {
                dot.classList.add('active', 'bg-white');
                dot.classList.remove('bg-opacity-50');
            } else {
                dot.classList.remove('active', 'bg-white');
                dot.classList.add('bg-opacity-50');
            }
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSlider();
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateSlider();
    }

    if (prevBtn && nextBtn) {
        nextBtn.addEventListener('click', nextSlide);
        prevBtn.addEventListener('click', prevSlide);
    }

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentSlide = index;
            updateSlider();
        });
    });

    setInterval(nextSlide, 5000);
});
</script>
@endpush
@endif
