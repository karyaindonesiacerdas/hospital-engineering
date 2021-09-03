@extends('layouts.app-home')
@section('content')
@include('home.components.header')
@include('home.components.navigation')
<!-- Content -->
<section class="max-w-7xl mx-auto py-10 px-2 bg-white mb-10">
    <h3 class="text-4xl font-bold text-gray-700 text-center lg:text-left px-2 mb-6">Blog & News
    </h3>
    <div class="flex lg:grid gap-10 grid-cols-3 md:grid-cols-2 xl:grid-cols-3 overflow-x-auto md:px-2">
        <!-- News 1 -->
        <a href="news1.html" class="group min-w-[250px] mx-4 md:mx-0">
            <div class="w-full aspect-w-9 aspect-h-6 bg-gray-200 rounded-lg overflow-hidden">
                <img src="{{ asset('assets/img/Poster-en.jpeg') }}" alt="News 1"
                    class="w-full h-full object-center object-cover group-hover:opacity-75">
            </div>
            <div class="mt-4 text-[#00B4BF] font-medium">
                September 1, 2021
            </div>
            <h3 class="mt-2 text-gray-700 font-medium">IAHE Announces its First Hospital Engineering Forum</h3>
            <button class="mt-6 bg-[#00B4BF] hover:bg-[#116368] text-white px-3 py-1 rounded-lg ">Read More</button>
        </a>

        <!-- Put other news here -->
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
