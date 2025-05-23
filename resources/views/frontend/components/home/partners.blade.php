



<!-- Partners Section -->
    <section class="py-16 bg-gradient-to-b from-white to-gray-50">
      <div class="container mx-auto px-4">
        <div class="text-center mb-16">
          {{-- <span class="text-primary font-semibold mb-4 inline-block"
            >Our Partners</span
          > --}}
          <h2 class="text-4xl font-bold mb-6">{{__('partner.partner_title')}}</h2>
          <p class="text-gray-600 max-w-2xl mx-auto">
            {{__('partner.partner_subtitle')}}
          </p>
        </div>
        <div class="flex flex-wrap justify-center items-center gap-16">
          <div class="group">
            <div
              class="w-[160px] h-24 bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] hover:shadow-[0_4px_25px_rgba(0,0,0,0.1)] transition-all duration-300 flex items-center justify-center hover:-translate-y-1"
            >
              <img src="{{ asset('/images/Tripadvisor.png') }}"
                    class="rounded-[5px] object-cover w-[130px] h-auto"
                    alt="Tripadvisor">
            </div>
          </div>
          <div class="group">
            <div
              class="w-[160px] h-24 bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] hover:shadow-[0_4px_25px_rgba(0,0,0,0.1)] transition-all duration-300 flex items-center justify-center hover:-translate-y-1"
            >
              <img src="{{ asset('/images/maroc.png') }}"
                    class="rounded-[5px] object-cover w-[130px] h-auto"
                    alt="maroc">
            </div>
          </div>
          <div class="group">
            <div
              class="w-[160px] h-24 bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] hover:shadow-[0_4px_25px_rgba(0,0,0,0.1)] transition-all duration-300 flex items-center justify-center hover:-translate-y-1"
            >
              <img src="{{ asset('/images/Lonely Planet.jpeg') }}"
                    class="rounded-[5px] object-cover w-[130px] h-auto"
                    alt="Lonely Planet">
            </div>
          </div>
        </div>
        {{-- <div class="mt-16 text-center">
          <div
            class="inline-flex items-center gap-2 px-6 py-3 bg-primary/10 rounded-full text-primary"
          >
            <i class="ri-shield-check-line"></i>
            <span class="text-sm font-medium">Secure Payment Partners</span>
          </div>
        </div> --}}
      </div>
    </section>
