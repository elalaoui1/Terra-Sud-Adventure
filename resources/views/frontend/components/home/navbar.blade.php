
 <!-- Top Contact Bar -->
{{-- <div class="bg-[#FF681A] text-white text-sm">
  <div class="container mx-auto px-4 py-1 flex flex-col md:flex-row justify-between items-center gap-2 text-center md:text-left">
    <div>
      📧 <a href="mailto:contact@terrasudadventures.com" class="hover:underline">contact@terrasudadventures.com</a>
    </div>
    <div class="flex items-center space-x-4">
      📞 <a href="tel:+212661348005" class="hover:underline">+212 (0) 661 34 80 05</a>
      <span>|</span>
      <a href="tel:+212668765135" class="hover:underline">+212 (0) 668 76 51 35</a>
    </div>
  </div>
</div> --}}

 <!-- Navigation -->
    <header class="bg-black backdrop-blur-sm fixed w-full z-10">
      <div
        class="container mx-auto px-4 py-3 flex items-center justify-between"
      >
        <div class="flex items-center">
          <a href="#" class="text-2xl font-['Pacifico'] text-gray-800">
              <img src="{{ asset('logo.jpeg') }}"
                    class="object-cover w-[130px] h-auto"
                    alt="Tour image">
          </a>
        </div>
        <nav class="hidden md:flex space-x-8">
          <a href="{{route('home')}}" class="text-white hover:text-[#FF681A]">{{ __('navbar.home') }}</a>
          <a href="{{route('TreksHikes')}}" class="text-white hover:text-[#FF681A]">{{ __('navbar.tours') }}</a>
          <a href="#" class="text-white hover:text-[#FF681A]">{{ __('navbar.private_tours') }}</a>
          <a href="#" class="text-white hover:text-[#FF681A]">{{ __('navbar.excursions') }}</a>
          <a href="#" class="text-white hover:text-[#FF681A]">{{ __('navbar.events') }}</a>
          {{-- <a href="#" class="text-white hover:text-[#FF681A]">{{ __('navbar.custom_tour') }}</a> --}}
        </nav>
        <div class="hidden md:flex items-center space-x-2">
            <div class="relative group">
                <!-- Trigger Button -->
                <button class="flex items-center space-x-1 text-sm text-white hover:text-[#FF681A] focus:outline-none">
                    <span>
                    @php
                        $flag = ['en' => '🇬🇧', 'fr' => '🇫🇷', 'es' => '🇪🇸'][app()->getLocale()] ?? '🌐';
                    @endphp
                    {{ $flag }}
                    </span>
                    <span class="uppercase">{{ app()->getLocale() }}</span>
                    <svg class="w-3 h-3 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                {{-- Desktop Dropdown --}}
                <div
                    class="absolute right-[-1rem] w-[150px] bg-white shadow-lg rounded-md border border-gray-100 hidden group-hover:block z-50"
                    onmouseenter="this.classList.add('block')"
                    onmouseleave="this.classList.remove('block')"
                >
                    @php $locale = app()->getLocale(); @endphp
                    @if($locale !== 'fr')
                        <a href="{{ route('lang.switch', 'fr') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-md">🇫🇷 Français</a>
                    @endif
                    @if($locale !== 'en')
                        <a href="{{ route('lang.switch', 'en') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-md">🇬🇧 English</a>
                    @endif
                    @if($locale !== 'es')
                        <a href="{{ route('lang.switch', 'es') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-md">🇪🇸 Español</a>
                    @endif
                </div>
        </div>


        </div>
        <button
          class="md:hidden w-10 h-10 flex items-center justify-center text-white"
          id="menuButton"
        >
          <i class="ri-menu-line text-2xl"></i>
        </button>
      </div>
    </header>

    {{-- sidebar for ipad , mobile --}}
    <div
      id="sidebar"
      class="fixed top-0 right-0 w-[280px] h-full bg-black transform translate-x-full transition-transform duration-300 ease-in-out z-50 shadow-2xl"
    >
      <div class="p-6">
        <div class="flex justify-between items-center mb-8">
          <a href="#" class="text-2xl font-['Pacifico'] text-white">
            <img src="{{ asset('logo.jpeg') }}"
                    class="object-cover w-[130px] h-auto"
                    alt="Tour image">
          </a>
          <button
            class="w-10 h-10 flex items-center text-white justify-center"
            id="closeButton"
          >
            <i class="ri-close-line text-2xl"></i>
          </button>
        </div>
        <nav class="flex flex-col space-y-6">
          <a href="{{route('home')}}" class="text-white hover:text-[#FF681A] text-lg">{{ __('navbar.home') }}</a>
          <a href="{{route('TreksHikes')}}" class="text-white hover:text-[#FF681A] text-lg">{{ __('navbar.tours') }}</a>
          <a href="#" class="text-white hover:text-[#FF681A] text-lg">{{ __('navbar.private_tours') }}</a>
          <a href="#" class="text-white hover:text-[#FF681A] text-lg">{{ __('navbar.excursions') }}</a>
          <a href="#" class="text-white hover:text-[#FF681A] text-lg">{{ __('navbar.events') }}</a
          >
        </nav>
        <div class="mt-8 flex flex-col space-y-4">
          <div x-data="{ open: false }" class="relative">
                <!-- Button -->
                <button @click="open = !open" class="flex items-center space-x-1 text-white text-sm hover:text-[#FF681A] focus:outline-none">
                    <span>
                    @php
                        $flag = ['en' => '🇬🇧', 'fr' => '🇫🇷', 'es' => '🇪🇸'][app()->getLocale()] ?? '🌐';
                    @endphp
                    {{ $flag }}
                    </span>
                    <span class="uppercase">{{ app()->getLocale() }}</span>
                    <svg class="w-3 h-3 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Dropdown -->
                <div
                    x-show="open"
                    @click.away="open = false"
                    x-transition
                    class="absolute left-0 mt-2 bg-white shadow-lg rounded-md border border-gray-100 z-50">
                    @php $locale = app()->getLocale(); @endphp
                    @if($locale !== 'en')
                        <a href="{{ route('lang.switch', 'en') }}" class="block px-4 py-2 hover:bg-gray-100">🇬🇧 English</a>
                    @endif
                    @if($locale !== 'fr')
                        <a href="{{ route('lang.switch', 'fr') }}" class="block px-4 py-2 hover:bg-gray-100">🇫🇷 Français</a>
                    @endif
                    @if($locale !== 'es')
                        <a href="{{ route('lang.switch', 'es') }}" class="block px-4 py-2 hover:bg-gray-100">🇪🇸 Español</a>
                    @endif
                </div>
                </div>

        </div>
      </div>
    </div>
    <div
      id="overlay"
      class="fixed inset-0 bg-black/50 opacity-0 pointer-events-none transition-opacity duration-300 z-40" ></div>
