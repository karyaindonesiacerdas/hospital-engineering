@extends('layouts.app-home')
@section('content')
@include('home.components.header')
@include('home.components.navigation')
<!-- Content -->
<section class="max-w-7xl mx-auto py-10 px-2 bg-white mb-10">
    <h2 class="text-3xl lg:text-4xl font-bold text-gray-700 text-center lg:text-left px-2 mb-6">Programs
    </h2>
    <!-- Programs 1 -->
    <div class="lg:mt-4 grid lg:grid-cols-2 px-2 gap-14 items-center mb-10 lg:mb-20">
        <div class="rounded-xl overflow-hidden mt-2 shadow-2xl">
            <img src="{{ asset('assets/img/seminar-room.jpeg') }}" alt="Webinar Series">
        </div>
        <div>
            <h3 class="text-xl lg:text-2xl font-bold text-gray-700 text-center lg:text-left px-2 mb-2">Webinar Series
            </h3>
            <h4 class="px-2 mb-4 text-gray-500 italic text-xl">"Meet and Consult with Exhibitors"</h4>
            <p class="max-w-5xl mx-auto text-lg leading-relaxed lg:text-xl lg:leading-loose text-gray-600 px-2">
                Opportunity to meet exhibitors in the Link & Match system to discuss collaborations and solutions
                related to 6
                areas of
                hospital engineering
            </p>
        </div>
    </div>

    <!-- Programs 2 -->
    <div class="lg:mt-4 grid lg:grid-cols-2 px-2 gap-14 items-center mb-10 lg:mb-20">
        <div>
            <h3 class="text-xl lg:text-2xl font-bold text-gray-700 text-center lg:text-left px-2 mb-4">Virtual
                Exhibition
            </h3>
            <h4 class="px-2 mb-4 text-gray-500 italic text-xl">"National & International Hospital Engineering Products
                Exhibition"</h4>
            <p class="max-w-5xl mx-auto text-lg leading-relaxed lg:text-xl lg:leading-loose text-gray-600 px-2">
                Exhibition of products from around 100 local and international  companies in 6 areas of hospital
                engineering
                and
                products related to COVID-19. Opportunity to meet potential buyers in 1 on 1 business matching and
                product
                exposure to
                7900 IAHE members.
            </p>
        </div>
        <div class="rounded-xl overflow-hidden mt-2 shadow-2xl">
            <img src="{{ asset('assets/img/virtual-exhibition.jpg') }}" alt="Virtual Exhibition">
        </div>
    </div>

    <!-- Programs 3 -->
    <div class="lg:mt-4 grid lg:grid-cols-2 px-2 gap-14 items-center mb-10 lg:mb-20">
        <div class="rounded-xl mt-2 overflow-hidden shadow-2xl">
            <img src="https://images.unsplash.com/photo-1586985564150-11ee04838034?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2030&q=80"
                alt="Consultation Room">
        </div>
        <div>
            <h3 class="text-xl lg:text-2xl font-bold text-gray-700 text-center lg:text-left px-2 mb-4">Consultation Room
            </h3>
            <h4 class="px-2 mb-4 text-gray-500 italic text-xl">"Sharing Best Practices"</h4>
            <p class="max-w-5xl mx-auto text-lg leading-relaxed lg:text-xl lg:leading-loose text-gray-600 px-2">
                A series of seminars with more than 40 speakers from government, hospitals, experts and industry in 6
                areas of
                hospital
                engineering with live question and answer sessions at each seminar
            </p>
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
