@extends('layouts.app-home')
@section('content')
@include('home.components.header')
@include('home.components.navigation')
<!-- Content -->
<section class="max-w-7xl mx-auto py-10 px-2 bg-white mb-10">
    <div class="text-[#00B4BF] uppercase text-xl font-bold">Packages</div>
    <h3 class="mt-2 mb-6 text-4xl font-bold text-gray-700">Virtual Exhibition Price List
    </h3>
    <p class="text-lg leading-relaxed lg:text-xl lg:leading-relaxed text-gray-600">
        Companies interested in exhibiting may select between the following packages or select the desired features
        separately
    </p>
    <div class="my-4">
        <img src="{{ asset('assets/img/packages.png') }}" alt="Packages">
    </div>
    <p class="max-w-5xl text-lg leading-relaxed lg:text-xl lg:leading-loose text-gray-600">For more information about
        the price, you can contact us in +62 858 9377 7283 (Adrian).</p>

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
