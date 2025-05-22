


<!-- Trending Tours Section -->
    <section class="bg-white py-12">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          <span class="text-primary font-semibold mb-4 inline-block"
            >Featured Experiences</span
          >
          <h2 class="text-4xl font-bold mb-6">Most Coveted Journeys</h2>
          <p class="text-gray-600 max-w-2xl mx-auto">
            Discover our curated collection of immersive travel experiences,
            enhanced by AI-powered personalization
          </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Tour Item --}}
        @foreach ($tours as $tour)

        @endforeach
          <div
            class="bg-white rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.05)] group hover:shadow-[0_4px_25px_rgba(0,0,0,0.1)] transition-all duration-300"
          >
            <div class="relative h-64">
              <img
                src="{{ asset('/storage/'.$tour->main_image) }}"
                alt="{{$tour->name}}"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
              />
              <div
                class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-medium text-primary flex items-center gap-2"
              >
                <i class="ri-time-line"></i>
                <span>{{$tour->duration_days}} Days</span>
              </div>
              <div
                class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-medium text-primary"
              >
                {{$tour->tourType->name}}
              </div>
            </div>
            <div class="p-8">
              <div class="flex items-center gap-2 mb-3">
                <i class="ri-map-pin-line text-primary"></i>
                <span class="text-gray-600">{{$tour->startLocation->name}} - {{$tour->endLocation->name}}</span>
              </div>
              <h3 class="text-xl font-bold mb-3">{{$tour->name}}</h3>
              <p class="text-gray-600 mb-6">
                {{Illuminate\Support\Str::limit(strip_tags($tour->description), 45, '...')}}
              </p>
              <div class="flex justify-between items-center">
                <div>
                  <div class="text-xl font-bold text-primary">$1,299</div>
                </div>
                <button
                  class="px-6 py-3 bg-primary text-white rounded-full hover:bg-primary/90 flex items-center gap-2 whitespace-nowrap !rounded-button"
                >
                  <span>Book Now</span>
                  <i class="ri-arrow-right-line"></i>
                </button>
              </div>
            </div>
          </div>



          {{-- add more tours --}}
        </div>
      </div>
    </section>
