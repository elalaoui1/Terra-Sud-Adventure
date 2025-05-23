
<!-- Trending Tours Section -->
<section class="bg-white py-16">
  <div class="container mx-auto px-4">
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold mb-6">{{ __('topTour.title') }}</h2>
      <p class="text-gray-600 max-w-2xl mx-auto">
        {{ __('topTour.min_slug') }}
      </p>
    </div>

    <!-- Swiper Container -->
    <div class="swiper mySwiper cursor-grab">
      <div class="swiper-wrapper">
        @foreach ($tours as $tour)

        @php
            $locale = app()->getLocale();
            $translation = $tour->translation($locale)->first();
            $typeName = $tour->tourType->{$locale . '_name'} ?? $tour->tourType->name;

        @endphp

        <div class="swiper-slide">
          <div class="bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.05)] group hover:shadow-[0_4px_25px_rgba(0,0,0,0.1)] transition-all duration-300">
            <div class="relative h-64">
              <img
                src="{{ asset('/storage/' . $tour->main_image) }}"
                alt="{{ $tour->name }}"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
              />
              <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-medium text-primary flex items-center gap-2">
                <i class="ri-time-line text-[#FF681A]"></i>
                <span class="text-[#FF681A]">{{ $tour->duration_days }} {{ __('topTour.tour_days') }}</span>
              </div>
              <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-medium text-primary">
                {{ $typeName }}
              </div>
            </div>
            <div class="p-8">
              <div class="flex items-center gap-2 mb-3">
                <i class="ri-map-pin-line text-[#FF681A]"></i>

                <span class="text-gray-600">{{ $tour->startLocation->name }} - {{ $tour->endLocation->name }}</span>
              </div>
              <h3 class="text-xl font-bold mb-3">{{ \Illuminate\Support\Str::limit(strip_tags($translation?->name ?? $tour->name), 30, '...') }}</h3>
              <p class="text-gray-600 mb-6">
                {{ \Illuminate\Support\Str::limit(strip_tags($translation?->description ?? $tour->description), 55, '...') }}
              </p>
              <div class="flex justify-between items-center">
                <div>
                  <div class="text-xl font-bold text-[#FF681A]">€ {{ number_format($tour->tour_prices_min_adult_price, 0) }}</div>
                </div>
                <button
                  class="px-6 py-3 bg-[#FF681A] text-white rounded-full hover:bg-[#FF681A]/90 flex items-center gap-2 whitespace-nowrap !rounded-button"
                >
                  <span>{{ __('topTour.tour_btn_book') }}</span>
                  <i class="ri-arrow-right-line"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
