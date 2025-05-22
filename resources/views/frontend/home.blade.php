@extends('frontend.layouts.app')
@section('title', 'Terra Sud Adventures')
@section('styles')

@endsection

@section('content')

{{-- hero section --}}
@include('frontend.components.home.heroSection')


{{-- top tours section --}}
@include('frontend.components.home.topTours',['tours' => $tours])

@endsection



@section('scripts')

@endsection
