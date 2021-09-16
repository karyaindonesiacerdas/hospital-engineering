@extends('layouts.app-home')
@section('content')
@include('home.components.header')
@include('home.components.navigation')
<!-- Content -->
<section class="max-w-7xl mx-auto py-10 px-2 bg-white mb-10">
    <div class="lg:mt-4 grid lg:grid-cols-2 gap-14 items-center">
        <div>
            <h3 class="text-3xl lg:text-4xl font-bold text-gray-700 text-center lg:text-left px-2 mb-6">Who Exhibit
            </h3>
            <p class="max-w-5xl mx-auto text-lg leading-relaxed lg:text-xl lg:leading-loose text-gray-600 px-2">
                There will be Medical Devices Manufacturer & Distributor, Hospital Equipment and Material Manufacturer &
                Distributor,
                Hospital Consultant, and Hospital Facility Contractor divided in 6 Industry Areas:
            </p>

            <ul class="mt-6 max-w-5xl mx-auto grid grid-cols-2 gap-6">
                <li class="flex items-start space-x-3 text-gray-700">
                    <svg class="w-8 h-8 text-[#00B4BF]" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75" />
                    </svg>
                    <div class="flex-1 text-gray-700 text-lg flex flex-col space-y-1">
                        <span class="font-semibold">Hospital Buildings</span>
                        <span>Architecture & Structure</span>
                    </div>
                </li>
                <li class="flex items-start space-x-3 text-gray-700">
                    <svg class="w-8 h-8 text-[#00B4BF]" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75" />
                    </svg>
                    <div class="flex-1 text-gray-700 text-lg flex flex-col space-y-1">
                        <span class="font-semibold">Hospital Mechanics</span>
                        <span>Plumbing, lift, AC, medical gas, steam, installation and fire prevention, ambulance</span>
                    </div>
                </li>
                <li class="flex items-start space-x-3 text-gray-700">
                    <svg class="w-8 h-8 text-[#00B4BF]" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75" />
                    </svg>
                    <div class="flex-1 text-gray-700 text-lg flex flex-col space-y-1">
                        <span class="font-semibold">Hospital Electrics</span>
                        <span>Power & Signaling</span>
                    </div>
                </li>
                <li class="flex items-start space-x-3 text-gray-700">
                    <svg class="w-8 h-8 text-[#00B4BF]" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75" />
                    </svg>
                    <div class="flex-1 text-gray-700 text-lg flex flex-col space-y-1">
                        <span class="font-semibold">Hospital Environments </span>
                        <span>Waste & Sanitation</span>
                    </div>
                </li>
                <li class="flex items-start space-x-3 text-gray-700">
                    <svg class="w-8 h-8 text-[#00B4BF]" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75" />
                    </svg>
                    <div class="flex-1 text-gray-700 text-lg flex flex-col space-y-1">
                        <span class="font-semibold">Hospital Informatics </span>
                        <span>IOT, AI, Big Data, Smart Hospital</span>
                    </div>
                </li>
                <li class="flex items-start space-x-3 text-gray-700">
                    <svg class="w-8 h-8 text-[#00B4BF]" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75" />
                    </svg>
                    <div class="flex-1 text-gray-700 text-lg flex flex-col space-y-1">
                        <span class="font-semibold">Hospital Devices</span>
                        <span>Diagnostics, Surgery, Rehabilitation</span>
                    </div>
                </li>
                <li class="flex items-start space-x-3 text-gray-700">
                    <svg class="w-8 h-8 text-[#00B4BF]" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75" />
                    </svg>
                    <div class="flex-1 text-gray-700 text-lg flex flex-col space-y-1">
                        <span class="font-semibold">COVID-19 Products</span>
                        <span>PCR equipment, respiratory equipment, antigen test kit, medical oxygen supplies and equipment, isolation room, Personal
                        Protective Equipment (PPE)</span>
                    </div>
                </li>
            </ul>
        </div>

        <div class="grid grid-cols-2 gap-2 md:gap-4">
            <div style="background-image: url({{ asset('assets/img/hospital-building.jpg') }}); background-position: center; background-size: cover;"
                class="flex items-center justify-center h-40 relative rounded-lg overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-b from-[#00B4BF] to-transparent bg-opacity-40"></div>
                <div class="text-lg md:text-2xl font-bold text-white z-10"
                    style="text-shadow: 1px 1px rgba(0,0,0,0.3);">
                    Hospital
                    Building
                </div>
            </div>
            <div style="background-image: url({{ asset('assets/img/hospital-electrics.jpg') }}); background-position: center; background-size: cover;"
                class="flex items-center justify-center h-40 relative rounded-lg overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-b from-[#00B4BF] to-transparent bg-opacity-40"></div>
                <div class="text-lg md:text-2xl font-bold text-white z-10"
                    style="text-shadow: 1px 1px rgba(0,0,0,0.3);">
                    Hospital
                    Electrics
                </div>
            </div>
            <div style="background-image: url({{ asset('assets/img/hospital-environment.jpg') }}); background-position: center; background-size: cover;"
                class="flex items-center justify-center h-40 relative rounded-lg overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-b from-[#00B4BF] to-transparent bg-opacity-40"></div>
                <div class="text-lg md:text-2xl font-bold text-white z-10"
                    style="text-shadow: 1px 1px rgba(0,0,0,0.3);">
                    Hospital
                    Environments
                </div>
            </div>
            <div style="background-image: url({{ asset('assets/img/hospital-informatics.jpg') }}); background-position: center; background-size: cover;"
                class="flex items-center justify-center h-40 relative rounded-lg overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-b from-[#00B4BF] to-transparent bg-opacity-40"></div>
                <div class="text-lg md:text-2xl font-bold text-white z-10"
                    style="text-shadow: 1px 1px rgba(0,0,0,0.3);">
                    Hospital
                    Informatics
                </div>
            </div>
            <div style="background-image: url({{ asset('assets/img/hospital-mechanics.jpg') }}); background-position: center; background-size: cover;"
                class="flex items-center justify-center h-40 relative rounded-lg overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-b from-[#00B4BF] to-transparent bg-opacity-40"></div>
                <div class="text-lg md:text-2xl font-bold text-white z-10"
                    style="text-shadow: 1px 1px rgba(0,0,0,0.3);">
                    Hospital
                    Mechanics
                </div>
            </div>
            <div style="background-image: url({{ asset('assets/img/bg-landing.png') }}); background-position: center; background-size: cover;"
                class="flex items-center justify-center h-40 relative rounded-lg overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-b from-[#00B4BF] to-transparent bg-opacity-40"></div>
                <div class="text-lg md:text-2xl font-bold text-white z-10"
                    style="text-shadow: 1px 1px rgba(0,0,0,0.3);">
                    Hospital Devices
                </div>
            </div>
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
