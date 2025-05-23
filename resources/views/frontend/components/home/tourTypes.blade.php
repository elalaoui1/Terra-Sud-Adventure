


<section class="py-16">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-10 text-center">
            {{__('tourType.title')}}
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
          <div class="relative rounded-lg overflow-hidden h-64 group">
            <img
              {{-- src="https://readdy.ai/api/search-image?query=majestic%20mountain%20bromo%20with%20beautiful%20sunrise%2C%20volcanic%20landscape%2C%20indonesia%2C%20dramatic%20lighting%2C%20professional%20travel%20photography%2C%20foggy%20atmosphere&width=600&height=300&seq=123460&orientation=landscape" --}}
              src="{{ asset('images/category1.jpg') }}"
              alt="Treks & Hikes"
              class="w-full h-full object-cover object-center transition-transform duration-500 group-hover:scale-105"
            />
            <div
              class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"
            ></div>
            <div class="absolute bottom-0 left-0 p-6 text-white transition-opacity duration-500 group-hover:opacity-0">
              <h3 class="text-xl font-bold mb-1">{{__('tourType.tours')}}</h3>
              <div class="flex items-center">
                <img src="{{ asset('logo_mini.png') }}"
                    class="rounded-[5px] object-cover w-[70px] h-auto"
                    alt="Terra Sud ">
              </div>
            </div>
            <!-- Hover text with animation -->
            <div class="absolute inset-0 flex items-end">
                <div class="w-full p-6 pb-8 text-white text-base font-medium bg-black/60 rounded-b-lg
                    opacity-0 translate-y-8 group-hover:opacity-100 group-hover:translate-y-0
                    transition-all duration-500 ease-out">
                     <h3 class="text-xl font-bold mb-1">{{__('tourType.tours')}}</h3>

                    {{ __('tourType.tours_description') }}
                </div>
            </div>
          </div>
          <div class="relative rounded-lg overflow-hidden h-64 group">
            <img
              {{-- src="https://readdy.ai/api/search-image?query=beautiful%20mountain%20lake%20retreat%20with%20calm%20water%20reflection%2C%20peaceful%20nature%20scene%2C%20lush%20green%20surroundings%2C%20dramatic%20lighting%2C%20professional%20travel%20photography&width=600&height=300&seq=123461&orientation=landscape" --}}
              src="{{ asset('images/category11.jpg') }}"
              alt="Private Tours & Trips"
              class="w-full h-full object-cover object-center transition-transform duration-500 group-hover:scale-105"
            />
            <div
              class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"
            ></div>
            <div class="absolute bottom-0 left-0 p-6 text-white transition-opacity duration-500 group-hover:opacity-0">
              <h3 class="text-xl font-bold mb-1">{{__('tourType.private_tours')}}</h3>
              <div class="flex items-center">
                <img src="{{ asset('logo_mini.png') }}"
                    class="rounded-[5px] object-cover w-[70px] h-auto"
                    alt="Terra Sud ">
              </div>
            </div>
             <!-- Hover text with animation -->
            <div class="absolute inset-0 flex items-end">
                <div class="w-full p-6 pb-8 text-white text-base font-medium bg-black/60 rounded-b-lg
                    opacity-0 translate-y-8 group-hover:opacity-100 group-hover:translate-y-0
                    transition-all duration-500 ease-out">
                     <h3 class="text-xl font-bold mb-1">{{__('tourType.private_tours')}}</h3>

                    {{ __('tourType.private_tours_description') }}
                </div>
            </div>
          </div>
        </div>
        <div class="relative rounded-lg overflow-hidden h-80 mb-6 group">
          <img
            {{-- src="https://readdy.ai/api/search-image?query=stunning%20azores%20archipelago%20aerial%20view%2C%20dramatic%20coastline%20with%20green%20cliffs%20and%20blue%20ocean%2C%20portugal%2C%20volcanic%20islands%2C%20professional%20travel%20photography&width=1200&height=400&seq=123462&orientation=landscape" --}}
            src="{{ asset('images/category22.jpg') }}"
            alt="Custom Tour"
            class="w-full h-full object-cover object-center transition-transform duration-500 group-hover:scale-105"
          />
          <div
            class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"
          ></div>
          <div class="absolute bottom-0 left-0 p-6 text-white transition-opacity duration-500 group-hover:opacity-0">
            <h3 class="text-xl font-bold mb-1">{{__('tourType.custom_tour')}}</h3>
            <div class="flex items-center">
              <img src="{{ asset('logo_mini.png') }}"
                    class="rounded-[5px] object-cover w-[70px] h-auto"
                    alt="Terra Sud ">
            </div>
          </div>
          <!-- Hover text with animation -->
            <div class="absolute inset-0 flex items-end">
                <div class="w-full p-6 pb-8 text-white text-base font-medium bg-black/60 rounded-b-lg
                    opacity-0 translate-y-8 group-hover:opacity-100 group-hover:translate-y-0
                    transition-all duration-500 ease-out">
                     <h3 class="text-xl font-bold mb-1">{{__('tourType.custom_tour')}}</h3>

                    {{ __('tourType.custom_tour_description') }}
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div class="relative rounded-lg overflow-hidden h-64 group">
            <img
              {{-- src="https://readdy.ai/api/search-image?query=majestic%20mount%20fuji%20with%20cherry%20blossoms%2C%20snow%20capped%20mountain%2C%20japan%2C%20clear%20sky%2C%20beautiful%20landscape%2C%20professional%20travel%20photography&width=600&height=300&seq=123463&orientation=landscape" --}}
            src="{{ asset('images/category33.jpg') }}"
              alt="Excursions"
              class="w-full h-full object-cover object-center transition-transform duration-500 group-hover:scale-105"
            />
            <div
              class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"
            ></div>
            <div class="absolute bottom-0 left-0 p-6 text-white transition-opacity duration-500 group-hover:opacity-0">
              <h3 class="text-xl font-bold mb-1">{{__('tourType.excursions')}}</h3>
              <div class="flex items-center">
               <img src="{{ asset('logo_mini.png') }}"
                    class="rounded-[5px] object-cover w-[70px] h-auto"
                    alt="Terra Sud ">
              </div>
            </div>
            <!-- Hover text with animation -->
            <div class="absolute inset-0 flex items-end">
                <div class="w-full p-6 pb-8 text-white text-base font-medium bg-black/60 rounded-b-lg
                    opacity-0 translate-y-8 group-hover:opacity-100 group-hover:translate-y-0
                    transition-all duration-500 ease-out">
                     <h3 class="text-xl font-bold mb-1">{{__('tourType.excursions')}}</h3>

                    {{ __('tourType.excursions_description') }}
                </div>
            </div>
          </div>
          <div class="relative rounded-lg overflow-hidden h-64 group">
            <img
              {{-- src="https://readdy.ai/api/search-image?query=stunning%20raja%20ampat%20islands%20aerial%20view%2C%20crystal%20clear%20turquoise%20water%2C%20tropical%20paradise%2C%20indonesia%2C%20coral%20reefs%20visible%20from%20above%2C%20professional%20travel%20photography&width=600&height=300&seq=123464&orientation=landscape" --}}
            src="{{ asset('images/category4.jpg') }}"
              alt="Themes & Events"
              class="w-full h-full object-cover object-center transition-transform duration-500 group-hover:scale-105"
            />
            <div
              class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"
            ></div>
            <div class="absolute bottom-0 left-0 p-6 text-white transition-opacity duration-500 group-hover:opacity-0">
              <h3 class="text-xl font-bold mb-1">{{__('tourType.events')}}</h3>
              <div class="flex items-center">
               <img src="{{ asset('logo_mini.png') }}"
                    class="rounded-[5px] object-cover w-[70px] h-auto"
                    alt="Terra Sud ">
              </div>
            </div>
            <!-- Hover text with animation -->
            <div class="absolute inset-0 flex items-end">
                <div class="w-full p-6 pb-8 text-white text-base font-medium bg-black/60 rounded-b-lg
                    opacity-0 translate-y-8 group-hover:opacity-100 group-hover:translate-y-0
                    transition-all duration-500 ease-out">
                     <h3 class="text-xl font-bold mb-1">{{__('tourType.events')}}</h3>

                    {{ __('tourType.events_description') }}
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
