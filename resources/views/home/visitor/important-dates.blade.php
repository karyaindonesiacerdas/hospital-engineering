@extends('layouts.app-home')
@section('content')
@include('home.components.header')
@include('home.components.navigation')
<!-- Content -->
<section x-show="showContent" class="max-w-7xl mx-auto py-10 px-2 bg-white mb-10">

    <h3 class="mt-2 mb-10 text-4xl font-bold text-gray-700 text-center lg:text-left">Important Dates
    </h3>
    <div class="grid sm:grid-cols-2 gap-4 md:gap-10">
        <div class="flex flex-col space-y-2 bg-gray-100 opacity-90 py-10 rounded-lg shadow items-center">
            <span class="text-xl md:text-3xl font-bold text-[#00B4BF]">1 September 2021</span>
            <span class="md:text-xl font-medium text-[#00B4BF]">Registration Started</span>
        </div>
        <div class="flex flex-col space-y-2 bg-gray-100 opacity-90 py-10 rounded-lg shadow items-center">
            <span class="text-xl md:text-3xl font-bold text-[#00B4BF]">2 October 2021</span>
            <span class="md:text-xl font-medium text-[#00B4BF]">Event Day 1</span>
        </div>
        <div class="flex flex-col space-y-2 bg-gray-100 opacity-90 py-10 rounded-lg shadow items-center">
            <span class="text-xl md:text-3xl font-bold text-[#00B4BF]">16 October 2021</span>
            <span class="md:text-xl font-medium text-[#00B4BF]">Event Day 2</span>
        </div>
        <div class="flex flex-col space-y-2 bg-gray-100 opacity-90 py-10 rounded-lg shadow items-center">
            <span class="text-xl md:text-3xl font-bold text-[#00B4BF]">30 October 2021</span>
            <span class="md:text-xl font-medium text-[#00B4BF]">Event Day 3</span>
        </div>
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
