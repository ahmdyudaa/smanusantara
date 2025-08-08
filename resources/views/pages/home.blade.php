@extends('layouts.app')

@section('title', 'Beranda - SMA Nusantara Cendekia')

@section('content')
    {{-- These will be filled by Blade components --}}
    @include('components.hero-slider')
    @include('components.quick-access')
    @include('components.school-overview')
    @include('components.latest-news')
    @include('components.achievements')
    @include('components.announcements')
    @include('components.photo-gallery')
    @include('components.testimonials')
@endsection
