@extends('layouts.app-home')
@section('content')
@include('home.components.header')
@include('home.components.navigation')
<!-- Content -->
<section class="max-w-7xl mx-auto py-10 px-2 bg-white mb-10">
    <div class="mt-4 grid lg:grid-cols-2 gap-10">
        <div>
            <div class="text-[#00B4BF] uppercase text-xl font-bold text-center lg:text-left">About</div>
            <h3 class="mt-2 mb-6 text-4xl font-bold text-gray-700 up text-center lg:text-left">Hospital Engineering
                Forum
                2021
            </h3>
            <p class="max-w-5xl mx-auto text-lg leading-relaxed lg:text-xl lg:leading-loose text-gray-600">
                Hospital Engineering Forum is the first virtual national seminar and international fair by Indonesian
                Association
                of
                Hospital Engineering (IAHE) which will be held on 2, 16, and 30 October 2021. This forum focuses on 6
                hospital
                engineering
                areas: Hospital Building, Hospital Mechanic, Hospital Electric, Hospital Environment, Hospital
                Informatics,
                and
                Hospital
                Devices. More than 40 speakers from the government, association, hospital and industry sectors are
                invited.
                We
                also
                provide stands for around 100 local and international exhibitors. This event will be co-organised with
                Karya
                Indonesia
                Cerdas.
            </p>
        </div>
        <div>
            <img src="{{ asset('assets/img/about-hef.png') }}" alt="About HEF">
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
