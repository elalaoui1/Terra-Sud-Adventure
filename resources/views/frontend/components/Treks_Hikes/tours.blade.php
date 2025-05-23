

<div class="relative flex flex-wrap p-6">

    <!-- Filter Toggle Button for Mobile -->
    <button id="filterToggle" aria-label="Open filter options" class="block md:hidden bg-transparent text-black py-2 px-4 w-full border border-black rounded-[50px] mb-4">
        Filter
    </button>

    <!-- Filter Section -->
    <div
        id="filterSidebar"
        class="absolute w-full md:w-1/4 inset-y-0 left-0 z-40 bg-white p-10 border-r shadow-lg md:static md:shadow-none md:border-none transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out"
    >
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-bold mb-4">Filter</h2>
            <button id="resetButton" aria-label="reset filter options" class="text-sm mb-4 font-bold  rounded-[50px] border hover:border-black py-1 px-2 transition duration-200 ease-in-out">Reset All</button>
            <button
                id="filterClose"
                aria-label="close filter button"
                class="text-sm mb-4 font-bold rounded-[50px] border hover:border-black py-1 px-2 transition duration-200 ease-in-out md:hidden"
            >
                Close
            </button>
        </div>

        <div class="mb-4 location-group">
            <h3 class="text-gray-700 mb-2 PPFragment-filter">Destination</h3>

            <div class="space-y-2">
                <label class="block">
                    <input type="checkbox" value="Marrakech" class="mr-2 accent-black"> Marrakech
                </label>
                <label class="block">
                    <input type="checkbox" value="Merzouga" class="mr-2 accent-black"> Merzouga
                </label>
                <label class="block">
                    <input type="checkbox" value="Casablanca" class="mr-2 accent-black"> Casablanca
                </label>
                <label class="block">
                    <input type="checkbox" value="Fes" class="mr-2 accent-black"> Fes
                </label>
                <label class="block">
                    <input type="checkbox" value="Ouarzazate" class="mr-2 accent-black"> Ouarzazate
                </label>
                <label class="block">
                    <input type="checkbox" value="Chefchaouen" class="mr-2 accent-black"> Chefchaouen
                </label>
            </div>
        </div>

        <!-- Other filters like Duration, Budget, and Activities -->

        <div class="mb-4 duration-group">
            <h3 class="text-gray-700 mb-2 PPFragment-filter">Duration</h3>
            <div class="space-y-2">
                <label class="block">
                    <input type="radio" name="duration" value="1-2" class="mr-2 accent-black"> 1-2 Days
                </label>
                <label class="block">
                    <input type="radio" name="duration" value="3-5" class="mr-2 accent-black"> 3-5 Days
                </label>
                <label class="block">
                    <input type="radio" name="duration" value="6-10" class="mr-2 accent-black"> 6-10 Days
                </label>
                <label class="block">
                    <input type="radio" name="duration" value="10+" class="mr-2 accent-black"> More than 10 Days
                </label>
            </div>
        </div>


    </div>

    <!-- Tours Section -->
    <div class="w-full flex justify-center md:w-3/4" id="Tours_Section">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-4">
            <!-- Your existing tour cards go here -->

            @foreach ($tours as $tour)
            {{-- @php
                $enTranslation = $tour->translation('en')->first();
                $name = $enTranslation?->name ?? $tour->name;
                $description = $enTranslation?->description ?? $tour->description;
            @endphp --}}

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
                <i class="ri-time-line text-[#FF681A]"></i>
                <span class="text-[#FF681A]">{{$tour->duration_days}} {{__('topTour.tour_days')}}</span>
              </div>
              <div
                class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-medium text-primary"
              >
                {{$tour->tourType->name}}
              </div>
            </div>
            <div class="p-8">
              <div class="flex items-center gap-2 mb-3">
                <i class="ri-map-pin-line text-[#FF681A]"></i>
                <span class="text-gray-600">{{$tour->startLocation->name}} - {{$tour->endLocation->name}}</span>
              </div>
              <h3 class="text-xl font-bold mb-3">{{Illuminate\Support\Str::limit(strip_tags($tour->name), 30, '...')}}</h3>
              <p class="text-gray-600 mb-6">
                {{Illuminate\Support\Str::limit(strip_tags($tour->description), 45, '...')}}
              </p>
              <div class="flex justify-between items-center">
                <div>
                  <div class="text-xl font-bold text-[#FF681A]">€ {{ number_format($tour->tour_prices_min_adult_price, 0) }}</div>
                </div>
                <button
                  class="px-6 py-3 bg-[#FF681A] text-white rounded-full hover:bg-[#FF681A]/90 flex items-center gap-2 whitespace-nowrap !rounded-button"
                >
                  <span>{{__('topTour.tour_btn_book')}}</span>
                  <i class="ri-arrow-right-line"></i>
                </button>
              </div>
            </div>
          </div>

        @endforeach

        </div>
    </div>


</div>
