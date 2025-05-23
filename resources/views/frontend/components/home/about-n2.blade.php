


 <!-- About Section -->
    <section class="py-16 bg-gray-100">
      <div class="container mx-auto px-4">

        <div class="flex flex-col md:flex-row items-center gap-12 mb-16">

          <div class="md:w-1/2">
            <h2 class="text-3xl font-bold mb-6">
              {{__('about.name_company')}} ?
            </h2>
            <p class="text-gray-600 mb-8 text-justify">
                {!! __('about.about_us_n2') !!}
            </p>

          </div>


          <div class="md:w-1/2 relative">
            <img
              src="{{asset('/images/about.jpg')}}"
              alt="Modern Traveler"
              class="rounded-2xl shadow-2xl w-full h-auto md:h-[500px] lg:h-[500px] object-cover object-top"
            />

          </div>


        </div>

<div class="grid grid-cols-2 md:grid-cols-6 gap-6">
              <div
                class="bg-white p-6 rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.05)]"
              >
                <div class="flex items-center justify-center gap-4 mb-3">
                  <div
                    class="w-12 h-10 bg-[#FF681A]/10 rounded-full flex items-center justify-center">
                    <i class="ri-landscape-fill text-4xl text-[#FF681A]"></i>
                  </div>
                </div>
                <div class="text-sm text-gray-500 text-center">{{__('about.hiking')}}</div>
              </div>
              <div
                class="bg-white p-6 rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.05)]"
              >
                <div class="flex items-center justify-center gap-4 mb-3">
                  <div
                    class="w-12 h-10 bg-[#FF681A]/10 rounded-full flex items-center justify-center">
                    <i class="ri-car-fill text-4xl text-[#FF681A]"></i>
                  </div>
                </div>
                <div class="text-sm text-gray-500 text-center">{{__('about.tours')}}</div>
              </div>
              <div
                class="bg-white p-6 rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.05)]"
              >
                <div class="flex items-center justify-center gap-4 mb-3">
                  <div
                    class="w-12 h-10 bg-[#FF681A]/10 rounded-full flex items-center justify-center">
                     <img src="{{ asset('/images/family.png') }}"
                                class="object-cover w-full h-auto"
                                alt="family image">
                  </div>
                </div>
                <div class="text-sm text-gray-500 text-center">{{__('about.family_tour')}}</div>
              </div>

             <div
                class="bg-white p-6 rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.05)]"
              >
                <div class="flex items-center justify-center gap-4 mb-3">
                  <div
                    class="w-12 h-10 bg-[#FF681A]/10 rounded-full flex items-center justify-center">
                    <i class="ri-bike-fill text-4xl text-[#FF681A]"></i>
                  </div>
                </div>
                <div class="text-sm text-gray-500 text-center">{{__('about.cycling')}}</div>
              </div>
              <div
                class="bg-white p-6 rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.05)]"
              >
                <div class="flex items-center justify-center gap-4 mb-3">
                  <div
                    class="w-12 h-10 bg-[#FF681A]/10 rounded-full flex items-center justify-center">
                        <img src="{{ asset('/images/horse.png') }}"
                                class="object-cover w-full h-auto"
                                alt="horse image">
                  </div>
                </div>
                <div class="text-sm text-gray-500 text-center">{{__('about.horse_riding')}}</div>
              </div>
              <div
                class="bg-white p-6 rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.05)]"
              >
                <div class="flex items-center justify-center gap-4 mb-3">
                  <div
                    class="w-12 h-10 bg-[#FF681A]/10 rounded-full flex items-center justify-center">
                    <i class="ri-function-fill text-4xl text-[#FF681A]"></i>
                  </div>
                </div>
                <div class="text-sm text-gray-500 text-center">{{__('about.multi_activity')}}</div>
              </div>

            </div>


      </div>
    </section>
