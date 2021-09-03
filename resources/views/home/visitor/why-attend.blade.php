@extends('layouts.app-home')
@section('content')
@include('home.components.header')
@include('home.components.navigation')
<!-- Content -->
<section class="max-w-7xl mx-auto py-10 px-2 bg-white mb-10">
    <div class="lg:mt-4 grid lg:grid-cols-2 gap-14">
        <div>
            <h3 class="text-3xl lg:text-4xl font-bold text-gray-700 text-center lg:text-left px-2 mb-6">Why Attend
            </h3>
            <p class="max-w-5xl mx-auto text-lg leading-relaxed lg:text-xl lg:leading-relaxed text-gray-600 px-2">
                Visitors of HEF 2021 can look forward to joining a free of charge 3 days online event, ranging from a
                series
                of
                webinars
                to networking opportunities with our exhibitors.
            </p>

            <ul class="mt-6 max-w-5xl mx-auto space-y-6">
                <li class="flex items-start space-x-3 text-gray-700">
                    <svg class="w-8 h-8 text-[#00B4BF]" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75" />
                    </svg>
                    <span class="flex-1 text-gray-700 text-lg">A series of seminars with over 40 speakers from the
                        government,
                        association, industry and hospital sectors with a live
                        Q&A session in each seminar to facilitate the hospital needs that’s up to standards and
                        affordable.</span>
                </li>
                <li class="flex items-start space-x-3 text-gray-700">
                    <svg class="w-8 h-8 text-[#00B4BF]" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75" />
                    </svg>
                    <span class="flex-1 text-gray-700 text-lg">Product presentation from exhibitors and 1 on 1 business
                        matching
                        between exhibitors and prospective buyers.</span>
                </li>
                <li class="flex items-start space-x-3 text-gray-700">
                    <svg class="w-8 h-8 text-[#00B4BF]" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75" />
                    </svg>
                    <span class="flex-1 text-gray-700 text-lg">Free 1 on 1 consultation with speakers or consultants
                        specializing
                        in the 6 hospital engineering areas.</span>
                </li>
                <li class="flex items-start space-x-3 text-gray-700">
                    <svg class="w-8 h-8 text-[#00B4BF]" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75" />
                    </svg>
                    <span class="flex-1 text-gray-700 text-lg">Networking with over 7900 members of IAHE</span>
                </li>
                <li class="flex items-start space-x-3 text-gray-700">
                    <svg class="w-8 h-8 text-[#00B4BF]" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75" />
                    </svg>
                    <span class="flex-1 text-gray-700 text-lg">Get exclusive materials on the topic of Hospital
                        Engineering in
                        the
                        era of COVID19 and Industry 4.0.</span>
                </li>
                <li class="flex items-start space-x-3 text-gray-700">
                    <svg class="w-8 h-8 text-[#00B4BF]" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75" />
                    </svg>
                    <span class="flex-1 text-gray-700 text-lg">Certificate worth 24 points
                        And win attractive prizes and rewards throughout the event.</span>
                </li>
            </ul>
        </div>
        <div>
            <img class="mb-10" src="{{ asset('assets/img/why-attend-and-exhibit-1.png') }}" alt="Why Attend">
            <img src="{{ asset('assets/img/why-attend-and-exhibit-2.png') }}" alt="">
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
