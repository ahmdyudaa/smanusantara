@if($testimonials->isNotEmpty())
<!-- Student Testimonials -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Testimoni Siswa & Alumni</h2>
            <p class="text-lg text-gray-600">Pengalaman dan kesan dari para siswa dan alumni</p>
        </div>
        <div class="relative overflow-hidden">
            <div class="flex space-x-8 testimonial-track" id="testimonial-slider">
                @foreach($testimonials as $testimonial)
                <div class="testimonial-card min-w-full md:min-w-0 md:w-1/3 bg-white rounded-2xl p-8 shadow-sm">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-16 h-16 bg-cover bg-center rounded-full" style="background-image: url('{{ $testimonial->image_url ? Illuminate\Support\Facades\Storage::url($testimonial->image_url) : 'https://readdy.ai/api/search-image?query=profile%20avatar' }}')"></div>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ $testimonial->name }}</h4>
                            <p class="text-gray-600 capitalize">{{ $testimonial->status->value }} @if($testimonial->status == \App\Enums\TestimonialStatus::ALUMNI && $testimonial->batch_year) {{ $testimonial->batch_year }} @endif</p>
                            <div class="flex text-yellow-400 text-sm">
                                @for ($i = 0; $i < $testimonial->rating; $i++)
                                <i class="ri-star-fill"></i>
                                @endfor
                                @for ($i = 5 - $testimonial->rating; $i > 0; $i--)
                                <i class="ri-star-line"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 leading-relaxed mb-4">"{{ $testimonial->content }}"</p>
                    @if($testimonial->published_at)
                    <div class="text-sm text-gray-500">{{ $testimonial->published_at->format('F Y') }}</div>
                    @endif
                </div>
                @endforeach
            </div>
            @if($testimonials->count() > 1)
            <div class="flex justify-center space-x-2 mt-8">
                @foreach($testimonials as $index => $testimonial)
                <button class="w-3 h-3 rounded-full testimonial-dot @if($loop->first) bg-primary active @else bg-gray-300 @endif" data-testimonial="{{ $index }}"></button>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const testimonialTrack = document.getElementById('testimonial-slider');
    if (!testimonialTrack) return;

    const cards = testimonialTrack.querySelectorAll('.testimonial-card');
    const totalTestimonials = cards.length;
    if (totalTestimonials <= 1) return;

    // Clone cards for infinite loop effect on desktop
    if (window.innerWidth >= 768) {
        cards.forEach(card => {
            testimonialTrack.appendChild(card.cloneNode(true));
        });
    }

    const testimonialDots = document.querySelectorAll('.testimonial-dot');
    let currentTestimonial = 0;

    function updateTestimonialSlider() {
        const screenWidth = window.innerWidth;
        if (screenWidth < 768) { // Mobile view
            const translateX = -currentTestimonial * 100;
            testimonialTrack.style.transition = 'transform 0.5s ease';
            testimonialTrack.style.transform = `translateX(${translateX}%)`;
        } else { // Desktop view - this script part might need a more robust library for complex carousels
            testimonialTrack.style.transform = 'translateX(0)'; // Reset for desktop
        }

        testimonialDots.forEach((dot, index) => {
            if (index === currentTestimonial) {
                dot.classList.add('active', 'bg-primary');
                dot.classList.remove('bg-gray-300');
            } else {
                dot.classList.remove('active', 'bg-primary');
                dot.classList.add('bg-gray-300');
            }
        });
    }

    function nextTestimonial() {
        currentTestimonial = (currentTestimonial + 1) % totalTestimonials;
        updateTestimonialSlider();
    }

    testimonialDots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentTestimonial = index;
            updateTestimonialSlider();
        });
    });

    setInterval(nextTestimonial, 4000);

    window.addEventListener('resize', () => {
        // Re-init or adjust logic on resize if needed
        if (window.innerWidth >= 768) {
             testimonialTrack.style.transform = '';
        } else {
            updateTestimonialSlider();
        }
    });

    updateTestimonialSlider();
});
</script>
@endpush
@endif
