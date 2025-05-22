



<!-- Hero Section -->
    <section class="hero-section min-h-[600px] md:h-dvh lg:h-dvh flex items-center pt-16 bg-cover bg-center" style="background-image: url('/images/hero3.jpg');">
      <div
        class="container mx-auto px-4 w-full flex flex-col md:flex-row items-center"
      >
        <div
          class="md:w-1/2 text-white p-8 mt-10 bg-black/20 rounded-lg backdrop-blur-sm"
        >
          <h1 class="text-4xl md:text-4xl font-bold mb-4 text-white text-center md:text-left">
            {{ __('hero.hero_title') }}
            </h1>
            <p class="text-lg mb-8 text-white/90 md:w-2/3 text-center md:text-left">
                {{ __('hero.hero_description') }}
            </p>

                {{-- filepath: /home/elalaoui/Documents/Projects/Terra-Sud-Adventures/resources/views/frontend/components/home/heroSection.blade.php --}}
        <div class="relative mt-8">
            <div class="flex items-center">
                <div class="flex items-center bg-white/90 rounded-lg px-6 py-5 shadow-lg">
                    <svg class="w-9 h-9 text-[#FF681A] mr-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 32 32">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 20c0 4 4 8 12 8s12-4 12-8-4-8-12-8V4" />
                        <circle cx="16" cy="4" r="2.5" fill="#FF681A" />
                    </svg>
                    <div>
                        <div class="text-xl font-bold text-[#FF681A]">{{ __('hero.hero_slug_h') }}</div>
                        <div class="text-gray-700 text-base">{{ __('hero.hero_slug_p') }}</div>
                    </div>
                </div>
              {{-- Decorative loop arrow pointing to the search form --}}
                <svg class="hidden md:block ml-4" width="120" height="60" viewBox="0 0 120 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- Looping arrow body -->
                    <path d="M10 45 Q40 10, 70 30 Q100 50, 110 20" stroke="#FF681A" stroke-width="5" fill="none" stroke-linecap="round"/>
                    <!-- Modern arrowhead -->
                    <polygon points="110,20 104,28 116,24" fill="#FF681A"/>
                    <!-- Subtle shadow for depth -->
                    <path d="M12 47 Q42 12, 72 32 Q102 52, 112 22" stroke="#FF681A22" stroke-width="9" fill="none" stroke-linecap="round"/>
                </svg>
            </div>
        </div>
        </div>
        <div class="md:w-1/2 p-6">
          <div class="bg-white rounded-lg p-6 w-full max-w-md mx-auto shadow-lg">
            <h3 class="text-xl font-semibold mb-4">{{ __('hero.form_title') }}</h3>
            <form>
            <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- From Destination --}}
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2">{{ __('hero.start') }}</label>
                    <div class="relative">
                        <select
                            class="w-full p-3 border bg-white rounded appearance-none focus:outline-none focus:ring-2 focus:ring-primary/50 pr-10"
                        >
                            <option selected disabled>Select origin</option>
                            <option>Marrakech</option>
                            <option>Casablanca</option>
                            <option>Fes</option>
                            <option>Agadir</option>
                            <!-- Add more cities as needed -->
                        </select>
                        <div class="absolute right-3 top-1/2 -translate-y-1/2 w-5 h-5 flex items-center justify-center pointer-events-none">
                            <i class="ri-map-pin-line text-[#FF681A]"></i>
                        </div>
                    </div>
                </div>
                {{-- To Destination --}}
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2">{{ __('hero.end') }}</label>
                    <div class="relative">
                        <select
                            class="w-full p-3 border bg-white rounded appearance-none focus:outline-none focus:ring-2 focus:ring-primary/50 pr-10"
                        >
                            <option selected disabled>Select destination</option>
                            <option>Merzouga</option>
                            <option>Chefchaouen</option>
                            <option>Essaouira</option>
                            <option>Zagora</option>
                            <!-- Add more cities as needed -->
                        </select>
                        <div class="absolute right-3 top-1/2 -translate-y-1/2 w-5 h-5 flex items-center justify-center pointer-events-none">
                            <i class="ri-map-pin-line text-[#FF681A]"></i>
                        </div>
                    </div>
                </div>
            </div>
                          {{-- Activity and Range of Days --}}
            <div class="grid grid-cols-2 gap-4 mb-4">
                {{-- Activity Select --}}
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2">{{ __('hero.activity') }}</label>
                    <div class="relative">
                        <select
                            class="w-full p-3 border bg-white rounded appearance-none focus:outline-none focus:ring-2 focus:ring-primary/50 pr-10"
                        >
                            <option selected disabled>Select activity</option>
                            <option>Trekking</option>
                            <option>Desert Tour</option>
                            <option>Cultural Visit</option>
                            <option>Surfing</option>
                            <option>City Tour</option>
                            <!-- Add more activities as needed -->
                        </select>
                        <div class="absolute right-3 top-1/2 -translate-y-1/2 w-5 h-5 flex items-center justify-center pointer-events-none">
                            <i class="ri-compass-3-line text-[#FF681A]"></i>
                        </div>
                    </div>
                </div>
                {{-- Range of Days Select --}}
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2">{{ __('hero.days') }}</label>
                    <div class="relative">
                        <select
                            class="w-full p-3 border bg-white rounded appearance-none focus:outline-none focus:ring-2 focus:ring-primary/50 pr-10"
                        >
                            <option selected disabled>Select duration</option>
                            <option>1-3 Days</option>
                            <option>4-7 Days</option>
                            <option>8-14 Days</option>
                            <option>15+ Days</option>
                        </select>
                        <div class="absolute right-3 top-1/2 -translate-y-1/2 w-5 h-5 flex items-center justify-center pointer-events-none">
                            <i class="ri-calendar-2-line text-[#FF681A]"></i>
                        </div>
                    </div>
                </div>
            </div>
                          {{-- Budget Range Slider --}}
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-2">{{ __('hero.budget') }} (€)</label>
                <div class="flex items-center space-x-3">
                    <i class="ri-money-euro-circle-line text-2xl text-[#FF681A]"></i>
                    <input
                        type="range"
                        min="1"
                        max="4000"
                        step="10"
                        value="400"
                        class="w-full accent-[#FF681A]"
                        id="budgetRange"
                        oninput="document.getElementById('budgetValue').innerText = this.value + ' €'"
                    >
                    <span id="budgetValue" class="font-semibold text-[#FF681A]">400 €</span>
                </div>
            </div>
              <button
                type="submit"
                class="w-full py-3 bg-[#FF681A] text-white font-medium rounded hover:bg-[#FF681A]/90 whitespace-nowrap !rounded-button"
              >
                {{__('hero.search') }}
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>
