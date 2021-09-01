<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
        <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
        <script src="//unpkg.com/alpinejs" defer></script>
        <title>HEW 2021</title>
        <style>
            .swiper-pagination-bullet {
                border-radius: 0;
                width: 16px;
                height: 16px;
                background-color: rgba(255, 255, 255, 0.8);
            }

            .swiper-pagination-bullet-active {
                background-color: #FFF;
            }

            .overlay-nav {
                background-color: rgba(0, 0, 0, 0.5);
            }
        </style>
    </head>

    <body x-data="{openMobileMenu: false}">
        <!-- Header -->
        <header
            class="sticky z-40 md:z-auto top-0 sm:top-auto bg-white sm:bg-transparent flex sm:flex h-[50px] sm:h-[70px] max-w-7xl mx-auto px-4 md:px-2 items-center justify-between">
            <div class="flex items-center space-x-2 sm:space-x-3">
                <img class="w-10 h-10 sm:w-14 sm:h-14" src="{{ asset('assets/img/ptpi.png') }}" alt="Logo PTPI">
                <div>
                    <div class="text-sm sm:text-lg xl:text-2xl uppercase font-bold text-gray-800 tracking-wider">
                        Hospital
                        Engineering
                        Week
                        2021
                    </div>
                    <div class="hidden sm:block text-xs xl:text-md uppercase text-gray-600 tracking-wider">Plan your
                        hospital with
                        the
                        latest
                        technologies!
                    </div>
                </div>
            </div>
            <div class="block md:hidden">
                <button @click="openMobileMenu = true" type="button"
                    class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-[#116368]"
                    aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <!-- Heroicon name: outline/menu -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div x-show="openMobileMenu" x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95" @click.away="openMobileMenu = false"
                class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden z-50">
                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
                    <div class="pt-5 pb-6 px-5">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2 sm:space-x-3">
                                <img class="w-10 h-10 sm:w-14 sm:h-14" src="{{ asset('assets/img/ptpi.png') }}"
                                    alt="Logo PTPI">
                                <div>
                                    <div
                                        class="text-sm sm:text-lg xl:text-2xl uppercase font-bold text-gray-800 tracking-wider">
                                        Hospital
                                        Engineering
                                        Week
                                        2021
                                    </div>
                                    <div
                                        class="hidden sm:block text-xs xl:text-md uppercase text-gray-600 tracking-wider">
                                        Plan your
                                        hospital
                                        with
                                        the
                                        latest
                                        technologies!
                                    </div>
                                </div>
                            </div>
                            <div class="-mr-2">
                                <button @click="openMobileMenu = false" type="button"
                                    class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-[#00B4BF]">
                                    <span class="sr-only">Close menu</span>
                                    <!-- Heroicon name: outline/x -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="mt-6">
                            <nav class="grid gap-y-8">
                                <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                    <!-- Heroicon name: outline/chart-bar -->
                                    <svg class="flex-shrink-0 h-6 w-6 text-[#00B4BF]" xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    <span class="ml-3 text-base font-medium text-gray-900">
                                        Home
                                    </span>
                                </a>

                                <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                    <!-- Heroicon name: outline/cursor-click -->
                                    <svg class="flex-shrink-0 h-6 w-6 text-[#00B4BF]" xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>
                                    <span class="ml-3 text-base font-medium text-gray-900">
                                        Overview
                                    </span>
                                </a>

                                <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                    <!-- Heroicon name: outline/shield-check -->
                                    <svg class="flex-shrink-0 h-6 w-6 text-[#00B4BF]" xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span class="ml-3 text-base font-medium text-gray-900">
                                        Visitor
                                    </span>
                                </a>

                                <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                    <!-- Heroicon name: outline/view-grid -->
                                    <svg class="flex-shrink-0 h-6 w-6 text-[#00B4BF]" xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                                    </svg>
                                    <span class="ml-3 text-base font-medium text-gray-900">
                                        Exhibitor
                                    </span>
                                </a>

                                <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                    <!-- Heroicon name: outline/refresh -->
                                    <svg class="flex-shrink-0 h-6 w-6 text-[#00B4BF]" xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="ml-3 text-base font-medium text-gray-900">
                                        FAQ
                                    </span>
                                </a>
                            </nav>
                        </div>
                    </div>
                    <div class="py-6 px-5 space-y-6">
                        <div>
                            <div class="grid grid-cols-2 gap-2">
                                <a href="#"
                                    class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:bg-[#116368] bg-[#00B4BF]">
                                    Register as Exhibitor
                                </a>
                                <a href="#"
                                    class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:bg-[#116368] bg-[#00B4BF]">
                                    Register as Visitor
                                </a>
                            </div>
                            <p class="mt-6 text-center text-base font-medium text-gray-500">
                                Already have an account?
                                <a href="#" class="hover:text-[#116368] text-[#00B4BF]">
                                    Login
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </header>


        <!-- Slider main container -->
        <div class="swiper relative h-60 sm:h-96 lg:h-[550px] xl:hero-image-height">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper ">
                <!-- Slides -->


                <div style="background: linear-gradient(180deg, rgba(4, 176, 187, 0.71) 0%, rgba(0, 180, 191, 0) 99.99%, rgba(17, 99, 104, 0) 100%);"
                    class="swiper-slide relative">
                    <img class="object-cover w-full h-full mix-blend-darken swiper-slide"
                        src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1052&q=80"
                        alt="MRI machine">
                    <div class="mx-auto max-w-7xl w-full flex justify-center md:justify-end px-2">
                        <div class="absolute top-1/2 -translate-y-1/2 md:max-w-sm">
                            <div class="uppercase mb-1 text-xl font-bold drop-shadow-xl text-white text-center md:text-left"
                                style="text-shadow: 2px 2px rgba(0,0,0, 0.3);">Six Hospital Engineering Area</div>
                            <div class="text-2xl md:text-6xl 2xl:text-7xl md:leading-[80px] drop-shadow-xl text-white font-bold text-center md:text-left"
                                style="text-shadow: 2px 2px rgba(0,0,0, 0.3);">
                                Hospital Building</div>
                        </div>
                    </div>
                </div>

                <div style="background: linear-gradient(180deg, rgba(4, 176, 187, 0.71) 0%, rgba(0, 180, 191, 0) 99.99%, rgba(17, 99, 104, 0) 100%);"
                    class="swiper-slide relative">
                    <img class="object-cover w-full h-full mix-blend-darken swiper-slide"
                        src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1052&q=80"
                        alt="MRI machine">
                    <div class="mx-auto max-w-7xl w-full flex justify-center md:justify-end px-2">
                        <div class="absolute top-1/2 -translate-y-1/2 md:max-w-sm">
                            <div class="uppercase mb-1 text-xl font-bold drop-shadow-xl text-white text-center md:text-left"
                                style="text-shadow: 2px 2px rgba(0,0,0, 0.3);">Six Hospital Engineering Area</div>
                            <div class="text-2xl md:text-6xl 2xl:text-7xl md:leading-[80px] drop-shadow-xl text-white font-bold text-center md:text-left"
                                style="text-shadow: 2px 2px rgba(0,0,0, 0.3);">
                                Hospital Mechanic</div>
                        </div>
                    </div>
                </div>

                <div style="background: linear-gradient(180deg, rgba(4, 176, 187, 0.71) 0%, rgba(0, 180, 191, 0) 99.99%, rgba(17, 99, 104, 0) 100%);"
                    class="swiper-slide relative">
                    <img class="object-cover w-full h-full mix-blend-darken swiper-slide"
                        src="https://images.unsplash.com/photo-1544724569-5f546fd6f2b5?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80"
                        alt="MRI machine">
                    <div class="mx-auto max-w-7xl w-full flex justify-center md:justify-end px-2">
                        <div class="absolute top-1/2 -translate-y-1/2 md:max-w-sm">
                            <div class="uppercase mb-1 text-xl font-bold drop-shadow-xl text-white text-center md:text-left"
                                style="text-shadow: 2px 2px rgba(0,0,0, 0.3);">Six Hospital Engineering Area</div>
                            <div class="text-2xl md:text-6xl 2xl:text-7xl md:leading-[80px] drop-shadow-xl text-white font-bold text-center md:text-left"
                                style="text-shadow: 2px 2px rgba(0,0,0, 0.3);">
                                Hospital Electric</div>
                        </div>
                    </div>
                </div>

                <div style="background: linear-gradient(180deg, rgba(4, 176, 187, 0.71) 0%, rgba(0, 180, 191, 0) 99.99%, rgba(17, 99, 104, 0) 100%);"
                    class="swiper-slide relative">
                    <img class="object-cover w-full h-full mix-blend-darken swiper-slide"
                        src="https://images.unsplash.com/photo-1586773860383-dab5f3bc1bcc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1013&q=80"
                        alt="MRI machine">
                    <div class="mx-auto max-w-7xl w-full flex justify-center md:justify-end px-2">
                        <div class="absolute top-1/2 -translate-y-1/2 md:max-w-sm">
                            <div class="uppercase mb-1 text-xl font-bold drop-shadow-xl text-white text-center md:text-left"
                                style="text-shadow: 2px 2px rgba(0,0,0, 0.3);">Six Hospital Engineering Area</div>
                            <div class="text-2xl md:text-6xl 2xl:text-7xl md:leading-[80px] drop-shadow-xl text-white font-bold text-center md:text-left"
                                style="text-shadow: 2px 2px rgba(0,0,0, 0.3);">
                                Hospital Environment</div>
                        </div>
                    </div>
                </div>

                <div style="background: linear-gradient(180deg, rgba(4, 176, 187, 0.71) 0%, rgba(0, 180, 191, 0) 99.99%, rgba(17, 99, 104, 0) 100%);"
                    class="swiper-slide relative">
                    <img class="object-cover w-full h-full mix-blend-darken swiper-slide"
                        src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1952&q=80"
                        alt="MRI machine">
                    <div class="mx-auto max-w-7xl w-full flex justify-center md:justify-end px-2">
                        <div class="absolute top-1/2 -translate-y-1/2 md:max-w-sm">
                            <div class="uppercase mb-1 text-xl font-bold drop-shadow-xl text-white text-center md:text-left"
                                style="text-shadow: 2px 2px rgba(0,0,0, 0.3);">Six Hospital Engineering Area</div>
                            <div class="text-2xl md:text-6xl 2xl:text-7xl md:leading-[80px] drop-shadow-xl text-white font-bold text-center md:text-left"
                                style="text-shadow: 2px 2px rgba(0,0,0, 0.3);">
                                Hospital Informatics</div>
                        </div>
                    </div>
                </div>

                <div style="background: linear-gradient(180deg, rgba(4, 176, 187, 0.71) 0%, rgba(0, 180, 191, 0) 99.99%, rgba(17, 99, 104, 0) 100%);"
                    class="swiper-slide relative">
                    <img class="object-cover w-full h-full mix-blend-darken swiper-slide"
                        src="{{ asset('assets/img/bg-landing.png') }}" alt="MRI machine">
                    <div class="mx-auto max-w-7xl w-full flex justify-center md:justify-end px-2">
                        <div class="absolute top-1/2 -translate-y-1/2 md:max-w-sm">
                            <div class="uppercase mb-1 text-xl font-bold drop-shadow-xl text-white text-center md:text-left"
                                style="text-shadow: 2px 2px rgba(0,0,0, 0.3);">Six Hospital Engineering Area</div>
                            <div class="text-2xl md:text-6xl 2xl:text-7xl md:leading-[80px] drop-shadow-xl text-white font-bold text-center md:text-left"
                                style="text-shadow: 2px 2px rgba(0,0,0, 0.3);">
                                Hospital Devices</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- If we need pagination -->
            <div class="hidden md:block swiper-pagination text-left ml-10 mb-6"></div>

            <!-- Navigation -->
            <nav id="navigation"
                class="hidden absolute md:flex w-full top-0 left-0 right-0 justify-between items-center py-4 px-4 md:px-2 z-50">
                <div id="navigation-wrapper" class="max-w-7xl mx-auto w-full flex justify-between items-center z-50">
                    <ul class="flex space-x-4 lg:space-x-12 font-medium items-center">
                        <!-- Home -->
                        <li><a href="#"
                                class="text-gray-200 hover:text-white cursor-pointer tracking-widest px-3 py-1.5 text-sm md:text-md font-bold uppercase"
                                style="text-shadow: 1px 1px 4px rgba(0,0,0,0.2);">Home</a>
                        </li>

                        <!-- Overview -->
                        <li class="relative" x-data="{open: false}"><button @click="open = true"
                                class="text-gray-200 hover:text-white cursor-pointer tracking-widest px-3 py-1.5 text-sm md:text-md font-bold uppercase pt-[9px] flex items-center group"
                                style="text-shadow: 1px 1px 4px rgba(0,0,0,0.2);">
                                <span>Overview</span>
                                <svg class="text-gray-200 group-hover:text-white ml-2 h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>

                            <!-- Sub Menu Overview -->
                            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-1"
                                x-description="Flyout menu, show/hide based on flyout menu state."
                                class="absolute z-50 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-xs sm:px-0"
                                x-ref="panel" @click.away="open = false">
                                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                    <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">

                                        <a href="#"
                                            class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            About HEW
                                        </a>

                                        <a href="#"
                                            class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            About IAHE
                                        </a>

                                        <a href="#"
                                            class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            Webinar Rundown
                                        </a>

                                        <a href="#"
                                            class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            News
                                        </a>

                                        <a href="#"
                                            class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            Important Dates
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </li>

                        <!-- Visitor -->
                        <li class="relative" x-data="{open: false}"><button @click="open = true"
                                class="text-gray-200 hover:text-white cursor-pointer tracking-widest px-3 py-1.5 text-sm md:text-md font-bold uppercase pt-[9px] flex items-center group"
                                style="text-shadow: 1px 1px 4px rgba(0,0,0,0.2);">
                                <span>Visitor</span>
                                <svg class="text-gray-200 group-hover:text-white ml-2 h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>

                            <!-- Sub Menu Visitor -->
                            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-1"
                                x-description="Flyout menu, show/hide based on flyout menu state."
                                class="absolute z-50 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-xs sm:px-0"
                                x-ref="panel" @click.away="open = false">
                                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                    <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">

                                        <a href="#"
                                            class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            Visitor Guideline
                                        </a>

                                        <a href="#"
                                            class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            Who Attends?
                                        </a>

                                        <a href="#"
                                            class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            Why Attend
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </li>

                        <!-- Exhibitor -->
                        <li class="relative" x-data="{open: false}"><button @click="open = true"
                                class="text-gray-200 hover:text-white cursor-pointer tracking-widest px-3 py-1.5 text-sm md:text-md font-bold uppercase pt-[9px] flex items-center group"
                                style="text-shadow: 1px 1px 4px rgba(0,0,0,0.2);">
                                <span>Exhibitor</span>
                                <svg class="text-gray-200 group-hover:text-white ml-2 h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>

                            <!-- Sub Menu Exhibitor -->
                            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-1"
                                x-description="Flyout menu, show/hide based on flyout menu state."
                                class="absolute z-50 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-xs sm:px-0"
                                x-ref="panel" @click.away="open = false">
                                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                    <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">

                                        <a href="#"
                                            class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            Exhibitor Guideline
                                        </a>

                                        <a href="#"
                                            class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            Who Exhibit?
                                        </a>

                                        <a href="#"
                                            class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            Why Exhibit?
                                        </a>

                                        <a href="#"
                                            class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            Packages
                                        </a>

                                        <a href="#"
                                            class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            Exhibitor List
                                        </a>

                                        <a href="#"
                                            class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            Sponsor & Partner
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </li>

                        <!-- FAQ -->
                        <li class="relative" x-data="{open: false}"><button @click="open = true"
                                class="text-gray-200 hover:text-white cursor-pointer tracking-widest px-3 py-1.5 text-sm md:text-md font-bold uppercase pt-[9px] flex items-center group"
                                style="text-shadow: 1px 1px 4px rgba(0,0,0,0.2);">
                                <span>FAQ</span>
                                <svg class="text-gray-200 group-hover:text-white ml-2 h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>

                            <!-- Sub Menu FAQ -->
                            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-1"
                                x-description="Flyout menu, show/hide based on flyout menu state."
                                class="absolute z-50 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-xs sm:px-0"
                                x-ref="panel" @click.away="open = false">
                                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                    <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">

                                        <a href="#"
                                            class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            FAQ General & Technical
                                        </a>

                                        <a href="#"
                                            class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            FAQ Visitor
                                        </a>

                                        <a href="#"
                                            class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            FAQ Exhibitor
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="flex items-center space-x-4 lg:space-x-8 font-medium">
                        <li class="relative" x-data="{open: false}"><button @click="open = true"
                                class="text-gray-200 hover:text-white cursor-pointer tracking-widest px-3 py-1.5 text-sm md:text-md font-bold uppercase pt-[9px] flex items-center group"
                                style="text-shadow: 1px 1px 4px rgba(0,0,0,0.2);">
                                <span>Register</span>
                                <svg class="text-gray-200 group-hover:text-white ml-2 h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>

                            <!-- Sub Menu Register -->
                            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-1"
                                x-description="Flyout menu, show/hide based on flyout menu state."
                                class="absolute z-50 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-xs sm:px-0"
                                x-ref="panel" @click.away="open = false">
                                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                    <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">

                                        <a href="register-visitor.html"
                                            class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            Register as Visitor
                                        </a>

                                        <a href="register-exhibitor.html"
                                            class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                            Register as Exhibitor
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="login.html"
                                class="text-gray-200 hover:text-white cursor-pointer tracking-widest px-3 py-1.5 text-sm md:text-md font-bold border border-gray-200 hover:border-white rounded-md uppercase"
                                style="text-shadow: 1px 1px 4px rgba(0,0,0,0.2)">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>




        <!-- Count Down, Event  -->
        <div class="relative bg-gradient-to-b from-[#1DBAC4] to-white pb-10 lg:pb-20 lg:min-h-screen z-0">
            <!-- Circle pattern -->
            <div
                class="hidden lg:block absolute w-[33vw] 2xl:w-[25vw] h-[33vw] 2xl:h-[25vw] right-1/4 top-1/3 2xl:top-1/4 -translate-y-10 2xl:-translate-y-2 translate-x-40 2xl:translate-x-20 bg-[#00B4BF] rounded-full -z-10">
            </div>
            <!-- Count Down -->
            <div class="mb-6 2xl:mb-10 py-6 2xl:py-10 px-6">
                <div class="text-center text-[#116368]  sm:text-lg md:text-xl uppercase font-medium tracking-wider">
                    Registration
                    will
                    be closed
                </div>
                <div class="mt-4 grid grid-cols-4 md:gap-4 max-w-lg mx-auto">
                    <div class="flex flex-col items-center text-[#116368] font-medium">
                        <span class="text-3xl md:text-5xl">4</span>
                        <span class="md:mt-1 text-sm sm:text-md">Days</span>
                    </div>
                    <div class="flex flex-col items-center text-[#116368] font-medium">
                        <span class="text-3xl md:text-5xl">15</span>
                        <span class="md:mt-1 text-sm sm:text-md">Hours</span>
                    </div>
                    <div class="flex flex-col items-center text-[#116368] font-medium">
                        <span class="text-3xl md:text-5xl">45</span>
                        <span class="md:mt-1 text-sm sm:text-md">Minutes</span>
                    </div>
                    <div class="flex flex-col items-center text-[#116368] font-medium">
                        <span class="text-3xl md:text-5xl">12</span>
                        <span class="md:mt-1 text-sm sm:text-md">Seconds</span>
                    </div>
                </div>
            </div>

            <!-- Event -->
            <div class="max-w-7xl mx-auto px-4 md:px-2 py-3 2xl:py-6 flex flex-col lg:flex-row lg:items-center z-10">
                <div>
                    <div
                        class="text-[#063C40] uppercase text-2xl tracking-widest font-semibold text-center md:text-left">
                        Virtual
                    </div>
                    <h2
                        class="mt-1 text-5xl 2xl:text-6xl text-[#063C40] font-extrabold md:max-w-md text-center md:text-left">
                        Hospital
                        Engineering Week</h2>
                    <div class="mt-4 text-xl uppercase tracking-widest font-medium text-center md:text-left">1 - 3
                        October 2021
                    </div>
                </div>
                <div
                    class="mt-6 2xl:mt-0 flex-1 grid grid-cols-2 sm:grid-cols-4 gap-3 lg:gap-5 p-2 max-w-xl md:max-w-3xl mx-auto">
                    <a href="#"
                        class="bg-white flex flex-col items-center py-2 px-2 md:py-6 md:px-6 rounded-3xl shadow-2xl hover:shadow-none">
                        <img class="w-12 md:w-20" src="{{ asset('assets/icons/about-hew.svg') }}" alt="About HEW 2021">
                        <span class="mt-4 uppercase font-medium tracking-wider text-xs md:text-sm text-center">About HEW
                            2021</span>
                    </a>
                    <a href="#"
                        class="bg-white flex flex-col items-center py-2 px-2 md:py-6 md:px-6 rounded-3xl shadow-2xl hover:shadow-none">
                        <img class="w-12 md:w-20" src="{{ asset('assets/icons/register-exhibitor.svg') }}"
                            alt="Register as Exhibitor">
                        <span class="mt-4 uppercase font-medium tracking-wider text-xs md:text-sm text-center">Register
                            as
                            Exhibitor</span>
                    </a>
                    <a href="#"
                        class="bg-white flex flex-col items-center py-2 px-2 md:py-6 md:px-6 rounded-3xl shadow-2xl hover:shadow-none">
                        <img class="w-12 md:w-20" src="{{ asset('assets/icons/why-visit.svg') }}" alt="Why Visit?">
                        <span class="mt-4 uppercase font-medium tracking-wider text-xs md:text-sm text-center">Why
                            Visit?</span>
                    </a>
                    <a href="#"
                        class="bg-white flex flex-col items-center py-2 px-2 md:py-6 md:px-6 rounded-3xl shadow-2xl hover:shadow-none">
                        <img class="w-12 md:w-20" src="{{ asset('assets/icons/exhibitor-list.svg') }}"
                            alt="Exhibitor List 2021">
                        <span class="mt-4 uppercase font-medium tracking-wider text-xs md:text-sm text-center">Exhibitor
                            List
                            2021</span>
                    </a>
                    <a href="#"
                        class="bg-white flex flex-col items-center py-2 px-2 md:py-6 md:px-6 rounded-3xl shadow-2xl hover:shadow-none">
                        <img class="w-12 md:w-20" src="{{ asset('assets/icons/seminar-rundown.svg') }}"
                            alt="Seminar Rundown">
                        <span class="mt-4 uppercase font-medium tracking-wider text-xs md:text-sm text-center">Seminar
                            Rundown</span>
                    </a>
                    <a href="#"
                        class="bg-white flex flex-col items-center py-2 px-2 md:py-6 md:px-6 rounded-3xl shadow-2xl hover:shadow-none">
                        <img class="w-12 md:w-20" src="{{ asset('assets/icons/register-visitor.svg') }}"
                            alt="Register as Visitor">
                        <span class="mt-4 uppercase font-medium tracking-wider text-xs md:text-sm text-center">Register
                            as
                            Visitor</span>
                    </a>
                    <a href="#"
                        class="bg-white flex flex-col items-center py-2 px-2 md:py-6 md:px-6 rounded-3xl shadow-2xl hover:shadow-none">
                        <img class="w-12 md:w-20" src="{{ asset('assets/icons/why-visit-2.svg') }}" alt="Why Visit">
                        <span class="mt-4 uppercase font-medium tracking-wider text-xs md:text-sm text-center">Why
                            Visit</span>
                    </a>
                    <a href="#"
                        class="bg-white flex flex-col items-center py-2 px-2 md:py-6 md:px-6 rounded-3xl shadow-2xl hover:shadow-none">
                        <img class="w-12 md:w-20" src="{{ asset('assets/icons/sponsor-partner.svg') }}"
                            alt="Sponsorship and Partner">
                        <span
                            class="mt-4 uppercase font-medium tracking-wider text-xs md:text-sm text-center">Sponsorship
                            and
                            Partner</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Blog and News -->
        <section class="max-w-7xl mx-auto pt-4 pb-10 bg-white">
            <h2 class="text-[#116368] text-xl uppercase tracking-wider px-4 md:px-2">Blog & News</h2>
            <h3 class="mt-2 mb-10 text-4xl font-bold text-gray-700 px-4 md:px-2">Latest Article</h3>

            <div class="flex lg:grid gap-10 grid-cols-3 md:grid-cols-2 xl:grid-cols-3 overflow-x-auto md:px-2">
                <a href="#" class="group min-w-[250px] mx-4 md:mx-0">
                    <div class="w-full aspect-w-9 aspect-h-6 bg-gray-200 rounded-lg overflow-hidden">
                        <img src="{{ asset('assets/news/1.jpg') }}" alt="News 1"
                            class="w-full h-full object-center object-cover group-hover:opacity-75">
                    </div>
                    <div class="mt-4 text-[#00B4BF] font-medium">
                        May 4, 2021
                    </div>
                    <p class="mt-3 text-gray-600 line-clamp-2 lg:line-clamp-3">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem, laborum beatae impedit numquam
                        repellat vel
                        amet facere? Odio, repellat nihil?
                    </p>
                    <button class="mt-6 bg-[#00B4BF] hover:bg-[#116368] text-white px-3 py-1 rounded-lg ">Read
                        More</button>
                </a>

                <a href="#" class="group min-w-[250px] mx-4 md:mx-0">
                    <div class="w-full aspect-w-9 aspect-h-6 bg-gray-200 rounded-lg overflow-hidden">
                        <img src="{{ asset('assets/news/2.jpg') }}" alt="News 2"
                            class="w-full h-full object-center object-cover group-hover:opacity-75">
                    </div>
                    <div class="mt-4 text-[#00B4BF] font-medium">
                        May 1, 2021
                    </div>
                    <p class="mt-3 text-gray-600 line-clamp-2 lg:line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores quo culpa quos unde autem
                        beatae, assumenda
                        necessitatibus aliquid officia et perspiciatis illo excepturi eos expedita, natus eveniet nisi.
                        Sed,
                        consectetur.
                    </p>
                    <button class="mt-6 bg-[#00B4BF] hover:bg-[#116368] text-white px-3 py-1 rounded-lg ">Read
                        More</button>
                </a>

                <a href="#" class="group min-w-[250px] mx-4 md:mx-0">
                    <div class="w-full aspect-w-9 aspect-h-6 bg-gray-200 rounded-lg overflow-hidden">
                        <img src="{{ asset('assets/news/3.jpg') }}" alt="News 3"
                            class="w-full h-full object-center object-cover group-hover:opacity-75">
                    </div>
                    <div class="mt-4 text-[#00B4BF] font-medium">
                        April 4, 2021
                    </div>
                    <p class="mt-3 text-gray-600 line-clamp-2 lg:line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita beatae non hic iusto quo
                        voluptatum rem est!
                        Impedit ipsa quod sed eius! Rem consequuntur impedit reprehenderit quidem similique eaque,
                        perferendis
                        explicabo vel laudantium id suscipit?
                    </p>
                    <button class="mt-6 bg-[#00B4BF] hover:bg-[#116368] text-white px-3 py-1 rounded-lg ">Read
                        More</button>
                </a>
            </div>
        </section>

        <!-- Call To Action -->
        <section class="max-w-7xl mx-auto py-10 px-2 bg-white mb-10">
            <h3 class="mt-2 mb-10 text-4xl font-bold text-gray-700 uppercase">I'd like to be</h3>
            <div class="grid grid-cols-2 gap-2 md:gap-10">
                <!-- CTA Exhibitor -->
                <div>
                    <div style="background-image: url({{ asset('assets/img/cta-exhibitor.png') }}); background-position: center; background-size: cover;"
                        class="h-40 md:h-72 w-auto rounded-xl flex items-center justify-center relative">
                        <div class="absolute inset-0 w-full h-full" style="background: rgba(1, 152, 162, 0.34);"></div>
                        <div class="flex flex-col items-center mt-4">
                            <div class="text-md md:text-4xl font-extrabold text-white uppercase tracking-widest mb-4 z-10"
                                style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">Exhibitor
                            </div>
                            <a href="register-exhibitor.html"
                                class="bg-[#4A4A4A] text-white text-xs sm:text-md py-1 px-2 rounded-md md:rounded-lg uppercase tracking-wider font-medium shadow-2xl hover:shadow-none z-10">Register
                                Here</a>
                        </div>
                    </div>
                    <p class="mt-4 px-2 line-clamp-3 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.
                        Nesciunt earum
                        distinctio odio
                        sint
                        quam consequatur
                        perferendis ducimus libero harum delectus officiis, voluptates ad assumenda similique unde? Qui,
                        natus odit
                        suscipit sapiente quisquam nostrum molestiae quam libero doloribus accusantium, optio itaque?
                    </p>
                </div>

                <!-- CTA Visitor -->
                <div>
                    <div style="background-image: url({{ asset('assets/img/cta-visitor.png') }}); background-position: center; background-size: cover;"
                        class="h-40 md:h-72 w-auto rounded-xl flex items-center justify-center relative">
                        <div class="absolute inset-0 w-full h-full" style="background: rgba(1, 152, 162, 0.34);"></div>
                        <div class="flex flex-col items-center mt-4">
                            <div class="text-md md:text-4xl font-extrabold text-white uppercase tracking-widest mb-4 z-10"
                                style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">Visitor
                            </div>
                            <a href="register-visitor.html"
                                class="bg-[#4A4A4A] text-white text-xs sm:text-md py-1 px-2 rounded-md md:rounded-lg uppercase tracking-wider font-medium shadow-2xl hover:shadow-none z-10">Register
                                Here</a>
                        </div>
                    </div>
                    <p class="mt-4 px-2 line-clamp-3 text-gray-600">Lorem ipsum dolor sit, amet consectetur adipisicing
                        elit. Vel
                        odit
                        consequuntur modi
                        voluptate
                        maiores nulla
                        sequi, blanditiis quod autem accusantium perspiciatis voluptas harum dignissimos, ex nesciunt.
                        Expedita
                        quibusdam necessitatibus porro amet eaque incidunt aliquid veritatis odio, sunt atque, eius et.
                    </p>
                </div>
            </div>
        </section>

        <!-- Organized by -->
        <section class="max-w-7xl mx-auto md:py-20 mb-20 px-2 bg-white">
            <h3 class="text-3xl text-gray-700 text-center font-medium">Organized by</h3>
            <div class="mt-6 flex justify-center">

                <img class="block md:hidden h-28 -ml-4" src="{{ asset('assets/img/kic-small.png') }}" alt="Logo KIC">
                <img class="hidden md:block h-28 -ml-4" src="{{ asset('assets/img/kic.png') }}" alt="Logo KIC">
            </div>
        </section>

        <!-- Contact -->
        <section class="bg-[#25243A]">
            <div
                class="max-w-7xl mx-auto pt-6 md:pt-20 md:pb-28 px-2 grid md:grid-cols-2 gap-6 items-center overflow-hidden">
                <div>
                    <div class="text-[#00B4BF] uppercase font-medium text-lg tracking-widest">Contact</div>
                    <h3 class="mt-2 text-3xl font-bold text-white">Contact Us</h3>
                    <div class="mt-10 flex flex-col space-y-8">
                        <div class="flex space-x-3 items-start">
                            <div class="border border-gray-600 rounded-full w-10 h-10 flex items-center justify-center">
                                <img class="w-4" src="{{ asset('assets/icons/address.svg') }}" alt="Address">
                            </div>
                            <span class="flex-1 max-w-[350px] text-sm md:text-md text-white mt-0.5">
                                Gedung Wisma NH Building Lantai 1, Jl. Raya Pasar Minggu No.2B-C 2 1 2, RT.2/RW.2,
                                Pancoran, Kec.
                                Pancoran,
                                Kota Jakarta
                                Selatan, Daerah Khusus Ibukota Jakarta 12780
                            </span>
                        </div>

                        <div class="flex space-x-3 items-start">
                            <div class="border border-gray-600 rounded-full w-10 h-10 flex items-center justify-center">
                                <img class="w-4" src="{{ asset('assets/icons/phone.svg') }}" alt="Phone">
                            </div>
                            <div
                                class="flex-1 max-w-[350px] text-sm md:text-md text-white mt-0.5 flex flex-col space-y-2">
                                <span>+62 858 9377 7283 (Adrian)</span>
                                <span>+62 877 7889 9087 (Jordy)</span>
                            </div>
                        </div>

                        <div class="flex space-x-3 items-start">
                            <div class="border border-gray-600 rounded-full w-10 h-10 flex items-center justify-center">
                                <img class="w-4" src="{{ asset('assets/icons/email.svg') }}" alt="Email">
                            </div>
                            <span class="flex-1 max-w-[350px] text-sm md:text-md text-white mt-0.5">
                                hospital.engineering.expo@gmail.com
                            </span>
                        </div>
                    </div>

                </div>

                <div>
                    <!-- Ganti dengan google maps -->
                    <div class="aspect-w-5 aspect-h-3 rounded-2xl overflow-hidden">

                        <img class="w-full h-full object-cover" src="{{ asset('assets/img/google-map.png') }}"
                            alt="Google map">
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-[#25243A]">
            <div class="max-w-7xl mx-auto py-6 px-2 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="text-gray-400 text-sm self-center justify-self-center md:justify-self-start">Copyright
                    &copy; Hospital
                    Engineering Expo
                    2021
                </div>
                <div class="flex space-x-4 self-center justify-self-center ">
                    <a class="text-gray-400 hover:text-white" href="https://facebook.com">
                        <svg class="fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z" />
                        </svg>
                    </a>
                    <a class="text-gray-400 hover:text-white" href="https://twitter.com">
                        <svg class="fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.066 9.645c.183 4.04-2.83 8.544-8.164 8.544-1.622 0-3.131-.476-4.402-1.291 1.524.18 3.045-.244 4.252-1.189-1.256-.023-2.317-.854-2.684-1.995.451.086.895.061 1.298-.049-1.381-.278-2.335-1.522-2.304-2.853.388.215.83.344 1.301.359-1.279-.855-1.641-2.544-.889-3.835 1.416 1.738 3.533 2.881 5.92 3.001-.419-1.796.944-3.527 2.799-3.527.825 0 1.572.349 2.096.907.654-.128 1.27-.368 1.824-.697-.215.671-.67 1.233-1.263 1.589.581-.07 1.135-.224 1.649-.453-.384.578-.87 1.084-1.433 1.489z" />
                        </svg>
                    </a>
                    <a class="text-gray-400 hover:text-white" href="https://linkedin.com">
                        <svg class="fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z" />
                        </svg>
                    </a>
                </div>
                <div class="flex space-x-4 self-center justify-self-center md:justify-self-end">
                    <a class="text-gray-400 hover:text-white text-sm" href="">Privacy Policy</a>
                    <a class="text-gray-400 hover:text-white text-sm" href="">Terms of Use</a>
                </div>
            </div>
        </footer>

        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
        <script>
            const swiper = new Swiper('.swiper', {
      // Optional parameters
      direction: 'horizontal',
      loop: true,

      // If we need pagination
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },

      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

      // And if we need scrollbar
      scrollbar: {
        el: '.swiper-scrollbar',
      },
    });

    const navigation = document.getElementById('navigation');
    const header = document.getElementById('header');

    window.addEventListener('scroll', (e) => {
      if (window.scrollY > 150) {
        navigation.classList.remove('absolute');
        navigation.classList.add('fixed')
        navigation.classList.add('overlay-nav')
      } else {
        navigation.classList.remove('fixed');
        navigation.classList.remove('overlay-nav')
        navigation.classList.add('absolute')
      }
    })
        </script>
    </body>

</html>
