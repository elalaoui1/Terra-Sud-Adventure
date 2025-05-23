@extends('frontend.layouts.app')
@section('title', 'Treks & Hikes')
@section('styles')


@endsection

@section('content')


{{-- hero section --}}

<div class="relative bg-gray-900 flex justify-center items-center h-[65dvh]">
    <!-- Hero Background Image -->
    <div class="absolute inset-0">
      <img src="/images/tourtype3.jpg" alt="Desert Camp" class="w-full h-full object-cover" loading="lazy">
      <div class="absolute inset-0 bg-black bg-opacity-25"></div>
    </div>

    <div class="relative z-2 text-center flex flex-col items-center text-white px-4 py-16 md:py-24">
        {{-- <p class="w-[20%] mt-4 text-lg md:text-xl backdrop-blur-md bg-white/25 py-1 px-3 rounded-[50px]">{{__('navbar.tours')}}</p> --}}
        <h1 class="text-3xl md:text-4xl font-extrabold mt-6">Every Destination, a Story Waiting To Be Told</h1>
        <p class="mt-4 text-lg md:text-xl">Experience the magic of Morocco’s landscapes, cities, and <br> traditions on your dream tour.</p>
    </div>

</div>

{{-- tours section --}}

@include('frontend.components.Treks_Hikes.tours',['tours' => $tours])





@endsection

@section('scripts')

@endsection

