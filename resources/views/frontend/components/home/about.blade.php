


 <!-- About Section -->
    <section class="py-16 bg-gray-100">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">

          <h2 class="text-4xl font-bold mb-6">
            {{__('about.title')}}
          </h2>
          <p class="text-gray-600 max-w-2xl mx-auto">
            {{__('about.min_slug')}}
          </p>
        </div>

        <div class="flex flex-col md:flex-row items-center gap-12">
          <div class="md:w-1/2 relative">
            <img
              {{-- src="https://readdy.ai/api/search-image?query=modern%20traveler%20with%20sleek%20luggage%20in%20futuristic%20airport%20terminal%2C%20glass%20and%20steel%20architecture%2C%20soft%20natural%20lighting%2C%20professional%20travel%20photography%2C%20lifestyle&width=600&height=500&seq=123459&orientation=landscape" --}}
              src="{{asset('/images/about1.jpg')}}"
              alt="Modern Traveler"
              class="rounded-2xl shadow-2xl w-full h-auto md:h-[500px] lg:h-[500px] object-cover object-top"
            />
            <div
              class="absolute -bottom-6 -right-6 bg-white rounded-xl p-4 shadow-lg hidden md:block"
            >
              <div class="flex items-center gap-3">
                <i class="ri-award-fill text-4xl text-[#FF681A]"></i>
                <div>
                  <div class="font-semibold">{{__('about.award')}}</div>
                  <div class="text-sm text-gray-500">{{__('about.award_slug')}}</div>
                </div>
              </div>
            </div>
          </div>
          <div class="md:w-1/2">
            <span class="text-primary font-semibold mb-4 block"
              >{{__('about.about_title')}}</span
            >
            <h2 class="text-3xl font-bold mb-6">
              {{__('about.name_company')}}
            </h2>
            <p class="text-gray-600 mb-8 text-justify">
              {{__('about.about_us')}}
            </p>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
              <div
                class="bg-white p-6 rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.05)]"
              >
                <div class="flex items-center gap-4 mb-3">
                  <div
                    class="w-12 h-10 bg-[#FF681A]/10 rounded-full flex items-center justify-center"
                  >
                    <i class="ri-earth-fill text-xl text-[#FF681A]"></i>
                  </div>
                  <div class="text-2xl font-bold text-[#FF681A]">+85</div>
                </div>
                <div class="text-sm text-gray-500 text-center">{{__('about.Journeys')}}</div>
              </div>
              <div
                class="bg-white p-6 rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.05)]"
              >
                <div class="flex items-center gap-4 mb-3">
                  <div
                    class="w-12 h-10 bg-[#FF681A]/10 rounded-full flex items-center justify-center"
                  >
                    <i class="ri-team-fill text-xl text-[#FF681A]"></i>
                  </div>
                  <div class="text-2xl font-bold text-[#FF681A]">94%</div>
                </div>
                <div class="text-sm text-gray-500"> {{__('about.Customer_satisfaction')}} </div>
              </div>
               <div
                class="bg-white p-6 rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.05)]"
              >
                <div class="flex items-center gap-4 mb-3">
                  <div
                    class="w-12 h-10 bg-[#FF681A]/10 rounded-full flex items-center justify-center"
                  >
                    <i class="ri-calendar-fill text-2xl text-[#FF681A]"></i>
                  </div>
                  <div class="text-2xl font-bold text-[#FF681A]">+20</div>
                </div>
                <div class="text-sm text-gray-500 text-center">{{__('about.experience')}}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
