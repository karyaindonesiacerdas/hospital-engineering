@extends('layouts.app-home')
@section('content')
@include('home.components.header')
@include('home.components.navigation')
<!-- Content -->
<section class="max-w-7xl mx-auto py-10 px-2 bg-white mb-10">
    <h3 class="mt-2 mb-6 text-4xl font-bold text-gray-700 text-center lg:text-left">Webinar Rundown
    </h3>
    <div class="space-y-10">
        <img class="rounded-xl overflow-hidden" src="{{ asset('assets/img/DAY 1.png') }}" alt="Rundown Day 1">
        <img class="rounded-xl overflow-hidden" src="{{ asset('assets/img/DAY 2.png') }}" alt="Rundown Day 2">
        <img class="rounded-xl overflow-hidden" src="{{ asset('assets/img/DAY 3.png') }}" alt="Rundown Day 3">
    </div>

</section>
@endsection
@section('script')
<script>
    // ======== Sticky Navigation =========
    window.addEventListener('scroll', (e) => {
        if (window.scrollY > 150) {
            navigation.classList.remove('static');
            navigation.classList.add('fixed')
            navigation.classList.add('overlay-nav')
        } else {
            navigation.classList.remove('fixed');
            navigation.classList.remove('overlay-nav')
            navigation.classList.add('static')
        }
    });
</script>
@endsection
