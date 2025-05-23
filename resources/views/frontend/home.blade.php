@extends('frontend.layouts.app')
@section('title', 'Terra Sud Adventures')
@section('styles')
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

@endsection

@section('content')

{{-- hero section --}}
@include('frontend.components.home.heroSection')


{{-- top tours section --}}
@include('frontend.components.home.topTours',['tours' => $tours])

{{-- about section --}}
@include('frontend.components.home.about')

{{-- tour Types section  --}}
@include('frontend.components.home.tourTypes')

{{-- about number 2 --}}
@include('frontend.components.home.about-n2')

{{-- partners section --}}
@include('frontend.components.home.partners')







@endsection



@section('scripts')



<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- Swiper Init -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.mySwiper', {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      grabCursor: true,
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },
      breakpoints: {
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      },
    });
  });
</script>

@endsection
