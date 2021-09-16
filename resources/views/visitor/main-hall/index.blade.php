<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
        <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />
        <script src="//unpkg.com/alpinejs" defer></script>
        <title>Virtual Booth 5 Poster</title>
        <style>
            * {
                margin: 0;
                padding: 0;
            }

            [x-cloak] {
                display: none !important;
            }

            .dashboard-hall {
                background-image: url("{{ asset('assets/img/virtual-exhibition.jpg') }}");
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                aspect-ratio: 2 / 1;
                width: 100%;
                height: 100%;
                position: relative;
            }

            .bg-image {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
            }

            .btn-1 {
                position: absolute;
                top: 42%;
                left: 6.75%;
                perspective: 1000px;
                width: 14%;
                height: 17%;
            }

            .btn-1 svg {
                width: 20%;
                height: auto;
            }


            .btn-1 span {
                font-size: 2vw;
            }


            .btn-1 a {
                transform: rotateY(35deg) rotateX(-5deg) rotateZ(-6deg);
                animation: fullpulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
            }

            .btn-2 svg {
                width: 20%;
                height: auto;
            }

            .btn-2 span {
                font-size: 2vw;
            }

            .btn-1:hover a {
                animation: none;
            }

            .btn-2 {
                position: absolute;
                top: 42%;
                right: 7.6%;
                perspective: 1000px;
                width: 14%;
                height: 17%;
            }

            .btn-2 a {
                transform: rotateY(-35deg) rotateX(-5deg) rotateZ(6deg);
                animation: fullpulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
            }

            .btn-2 svg {
                width: 20%;
                height: auto;
            }

            .btn-2 span {
                font-size: 2vw;
            }

            .btn-2:hover a {
                animation: none;
            }

            .btn-3 {
                position: absolute;
                top: 31%;
                left: 49.9%;
                transform: translateX(-50%);
                perspective: 1000px;
                width: 15.5%;
                height: 19.5%;
            }

            .btn-3 svg {
                width: 40%;
                height: auto;
            }

            .advertisement {
                position: absolute;
                top: 31%;
                left: 22.5%;
                perspective: 600px;
                width: 19.5%;
                height: 25%;
            }

            .advertisement div {
                transform: translateX(-50%);
                width: 100%;
                height: 100%;
                transform: rotateY(15deg) rotateX(-3deg) rotateZ(-2deg);
            }

            .advertisement2 {
                position: absolute;
                top: 31%;
                right: 22.75%;
                perspective: 600px;
                width: 19.5%;
                height: 25%;
            }

            .advertisement2 div {
                transform: translateX(-50%);
                width: 100%;
                height: 100%;
                transform: rotateY(-15deg) rotateX(-3deg) rotateZ(2deg);
            }


            .expandable-textarea {
                border: 1px solid #ccc;
                font-family: inherit;
                font-size: inherit;
                padding: 1px 6px;

                display: block;
                width: 100%;
                overflow: hidden;
                resize: both;
                min-height: 20px;
                line-height: 20px;
            }

            .chat-bg {
                background-color: #cccccc;
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 304 304' width='304' height='304'%3E%3Cpath fill='%23acacac' fill-opacity='0.4' d='M44.1 224a5 5 0 1 1 0 2H0v-2h44.1zm160 48a5 5 0 1 1 0 2H82v-2h122.1zm57.8-46a5 5 0 1 1 0-2H304v2h-42.1zm0 16a5 5 0 1 1 0-2H304v2h-42.1zm6.2-114a5 5 0 1 1 0 2h-86.2a5 5 0 1 1 0-2h86.2zm-256-48a5 5 0 1 1 0 2H0v-2h12.1zm185.8 34a5 5 0 1 1 0-2h86.2a5 5 0 1 1 0 2h-86.2zM258 12.1a5 5 0 1 1-2 0V0h2v12.1zm-64 208a5 5 0 1 1-2 0v-54.2a5 5 0 1 1 2 0v54.2zm48-198.2V80h62v2h-64V21.9a5 5 0 1 1 2 0zm16 16V64h46v2h-48V37.9a5 5 0 1 1 2 0zm-128 96V208h16v12.1a5 5 0 1 1-2 0V210h-16v-76.1a5 5 0 1 1 2 0zm-5.9-21.9a5 5 0 1 1 0 2H114v48H85.9a5 5 0 1 1 0-2H112v-48h12.1zm-6.2 130a5 5 0 1 1 0-2H176v-74.1a5 5 0 1 1 2 0V242h-60.1zm-16-64a5 5 0 1 1 0-2H114v48h10.1a5 5 0 1 1 0 2H112v-48h-10.1zM66 284.1a5 5 0 1 1-2 0V274H50v30h-2v-32h18v12.1zM236.1 176a5 5 0 1 1 0 2H226v94h48v32h-2v-30h-48v-98h12.1zm25.8-30a5 5 0 1 1 0-2H274v44.1a5 5 0 1 1-2 0V146h-10.1zm-64 96a5 5 0 1 1 0-2H208v-80h16v-14h-42.1a5 5 0 1 1 0-2H226v18h-16v80h-12.1zm86.2-210a5 5 0 1 1 0 2H272V0h2v32h10.1zM98 101.9V146H53.9a5 5 0 1 1 0-2H96v-42.1a5 5 0 1 1 2 0zM53.9 34a5 5 0 1 1 0-2H80V0h2v34H53.9zm60.1 3.9V66H82v64H69.9a5 5 0 1 1 0-2H80V64h32V37.9a5 5 0 1 1 2 0zM101.9 82a5 5 0 1 1 0-2H128V37.9a5 5 0 1 1 2 0V82h-28.1zm16-64a5 5 0 1 1 0-2H146v44.1a5 5 0 1 1-2 0V18h-26.1zm102.2 270a5 5 0 1 1 0 2H98v14h-2v-16h124.1zM242 149.9V160h16v34h-16v62h48v48h-2v-46h-48v-66h16v-30h-16v-12.1a5 5 0 1 1 2 0zM53.9 18a5 5 0 1 1 0-2H64V2H48V0h18v18H53.9zm112 32a5 5 0 1 1 0-2H192V0h50v2h-48v48h-28.1zm-48-48a5 5 0 0 1-9.8-2h2.07a3 3 0 1 0 5.66 0H178v34h-18V21.9a5 5 0 1 1 2 0V32h14V2h-58.1zm0 96a5 5 0 1 1 0-2H137l32-32h39V21.9a5 5 0 1 1 2 0V66h-40.17l-32 32H117.9zm28.1 90.1a5 5 0 1 1-2 0v-76.51L175.59 80H224V21.9a5 5 0 1 1 2 0V82h-49.59L146 112.41v75.69zm16 32a5 5 0 1 1-2 0v-99.51L184.59 96H300.1a5 5 0 0 1 3.9-3.9v2.07a3 3 0 0 0 0 5.66v2.07a5 5 0 0 1-3.9-3.9H185.41L162 121.41v98.69zm-144-64a5 5 0 1 1-2 0v-3.51l48-48V48h32V0h2v50H66v55.41l-48 48v2.69zM50 53.9v43.51l-48 48V208h26.1a5 5 0 1 1 0 2H0v-65.41l48-48V53.9a5 5 0 1 1 2 0zm-16 16V89.41l-34 34v-2.82l32-32V69.9a5 5 0 1 1 2 0zM12.1 32a5 5 0 1 1 0 2H9.41L0 43.41V40.6L8.59 32h3.51zm265.8 18a5 5 0 1 1 0-2h18.69l7.41-7.41v2.82L297.41 50H277.9zm-16 160a5 5 0 1 1 0-2H288v-71.41l16-16v2.82l-14 14V210h-28.1zm-208 32a5 5 0 1 1 0-2H64v-22.59L40.59 194H21.9a5 5 0 1 1 0-2H41.41L66 216.59V242H53.9zm150.2 14a5 5 0 1 1 0 2H96v-56.6L56.6 162H37.9a5 5 0 1 1 0-2h19.5L98 200.6V256h106.1zm-150.2 2a5 5 0 1 1 0-2H80v-46.59L48.59 178H21.9a5 5 0 1 1 0-2H49.41L82 208.59V258H53.9zM34 39.8v1.61L9.41 66H0v-2h8.59L32 40.59V0h2v39.8zM2 300.1a5 5 0 0 1 3.9 3.9H3.83A3 3 0 0 0 0 302.17V256h18v48h-2v-46H2v42.1zM34 241v63h-2v-62H0v-2h34v1zM17 18H0v-2h16V0h2v18h-1zm273-2h14v2h-16V0h2v16zm-32 273v15h-2v-14h-14v14h-2v-16h18v1zM0 92.1A5.02 5.02 0 0 1 6 97a5 5 0 0 1-6 4.9v-2.07a3 3 0 1 0 0-5.66V92.1zM80 272h2v32h-2v-32zm37.9 32h-2.07a3 3 0 0 0-5.66 0h-2.07a5 5 0 0 1 9.8 0zM5.9 0A5.02 5.02 0 0 1 0 5.9V3.83A3 3 0 0 0 3.83 0H5.9zm294.2 0h2.07A3 3 0 0 0 304 3.83V5.9a5 5 0 0 1-3.9-5.9zm3.9 300.1v2.07a3 3 0 0 0-1.83 1.83h-2.07a5 5 0 0 1 3.9-3.9zM97 100a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-48 32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32 48a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16-64a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 96a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-144a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-96 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm96 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16-64a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-32 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM49 36a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-32 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM33 68a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-48a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 240a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16-64a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm80-176a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32 48a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm112 176a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM17 180a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM17 84a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32 64a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6z'%3E%3C/path%3E%3C/svg%3E");
            }


            @keyframes fullpulse {

                0%,
                100% {
                    opacity: 1;
                }

                50% {
                    opacity: 0;
                }
            }
        </style>
    </head>

    <body
        x-data="{openVideoModal: false, openProductSlideOver: false, openCompanyProfileSlideOver: false, openBookConsultationModal: false, openPosterModal: false, openChatModal: false, selectedPoster: null, posters: posters }"
        class="2xl:overflow-y-scroll">

        @include('layouts.dashboard.fab-chat')
        @include('layouts.dashboard.header')

        <div class="dashboard-hall">
            <!-- Header / Navbar -->
            <header class="hidden lg:block bg-transparent sticky z-10">
                <nav x-data="{openProfileDropdown: false, openMobileMenu: false}"
                    class="bg-transparent px-1.5 lg:px-2 py-1.5 xl:py-2">
                    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8 bg-white rounded-t-lg lg:rounded-b-lg bg-opacity-10 shadow"
                        style="backdrop-filter: blur(20px);">
                        <div class="relative h-12 2xl:h-16 flex items-center justify-between">
                            <div class="px-2 flex items-center lg:px-0">
                                <a href="index.html" class="flex-shrink-0 flex items-center space-x-3">
                                    <img class="block h-10 w-10 2xl:h-12 2xl:w-12"
                                        src="{{ asset('assets/img/ptpi.png') }}" alt="Workflow">
                                    <div class="hidden lg:block text-2xl font-bold text-[#00B4BF]">HEF 2021</div>
                                </a>
                                <div class="hidden lg:block lg:ml-10">
                                    <div class="flex space-x-4">
                                        <a href="main-hall.html" class="text-[#00B4BF] rounded-md px-3 font-medium">
                                            Main Hall
                                        </a>

                                        <a href="seminar-room.html"
                                            class="text-gray-300 hover:text-white rounded-md px-3 font-medium">
                                            Seminar
                                        </a>

                                        <a href="exhibitor-list.html"
                                            class="text-gray-300 hover:text-white rounded-md px-3 font-medium">
                                            Exhibitors
                                        </a>

                                        <a href="consultation.html"
                                            class="text-gray-300 hover:text-white rounded-md px-3 font-medium">
                                            Consultation
                                        </a>

                                        <a href="live-schedule.html"
                                            class="text-gray-300 hover:text-white rounded-md px-3 font-medium">
                                            Live Stage Schedule
                                        </a>

                                        <!-- <a href="#" class="text-gray-700 hover:text-gray-900 rounded-md px-3 text-sm font-medium">
                        Booking Consultancy
                      </a>

                      <a href="#" class="text-gray-700 hover:text-gray-900 rounded-md px-3 text-sm font-medium">
                        Certificate
                      </a> -->
                                    </div>
                                </div>
                            </div>

                            <div class="flex lg:hidden">
                                <!-- Mobile menu button -->
                                <button type="button" x-on:click="openMobileMenu = !openMobileMenu"
                                    class="p-2 rounded-md inline-flex items-center justify-center text-gray-800 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-white"
                                    aria-controls="mobile-menu" aria-expanded="false">
                                    <span class="sr-only">Open main menu</span>
                                    <!-- Menu Icon -->
                                    <svg x-bind:class="! openMobileMenu ? 'block' : 'hidden'" class="h-6 w-6"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>
                                    <!-- Close Menu Icon -->
                                    <svg x-bind:class="! openMobileMenu ? 'hidden' : 'block'" class="h-6 w-6"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Desktop User Dropdown -->
                            <div class="hidden lg:block lg:ml-4">
                                <div class="flex items-center">
                                    <button
                                        class="flex-shrink-0 rounded-full p-1 text-white hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-white">
                                        <span class="sr-only">View notifications</span>
                                        <!-- Heroicon name: outline/bell -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                        </svg>
                                    </button>

                                    <!-- Profile dropdown -->
                                    <div class="ml-3 relative flex-shrink-0">
                                        <div>
                                            <button x-on:click="openProfileDropdown = !openProfileDropdown"
                                                type="button"
                                                class="bg-[#183086] rounded-full flex text-sm text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-white"
                                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                                <span class="sr-only">Open user menu</span>
                                                <img class="rounded-full h-8 w-8"
                                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                    alt="">
                                            </button>
                                        </div>

                                        <div x-cloak x-show="openProfileDropdown"
                                            x-transition:enter="transition ease-out duration-100"
                                            x-transition:enter-start="transform opacity-0 scale-95"
                                            x-transition:enter-end="transform opacity-100 scale-100"
                                            x-transition:leave="transition ease-in duration-75"
                                            x-transition:leave-start="transform opacity-100 scale-100"
                                            x-transition:leave-end="transform opacity-0 scale-95"
                                            @click.away="openProfileDropdown = false"
                                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white opacity-75 ring-1 ring-black ring-opacity-5 focus:outline-none"
                                            style="backdrop-filter: blur(20px);" role="menu" aria-orientation="vertical"
                                            aria-labelledby="user-menu-button" tabindex="-1">
                                            <!-- Active: "bg-gray-100", Not Active: "" -->
                                            <a href="#"
                                                class="block py-2 px-4 text-sm text-gray-900 hover:text-[#00B4BF] font-medium"
                                                role="menuitem" tabindex="-1" id="user-menu-item-0">
                                                Your Profile
                                            </a>

                                            <a href="#"
                                                class="block py-2 px-4 text-sm text-gray-900 hover:text-[#00B4BF] font-medium"
                                                role="menuitem" tabindex="-1" id="user-menu-item-1">
                                                Settings
                                            </a>

                                            <a href="#"
                                                class="block py-2 px-4 text-sm text-gray-900 hover:text-[#00B4BF] font-medium"
                                                role="menuitem" tabindex="-1" id="user-menu-item-2">
                                                Sign out
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile menu, show/hide based on menu state. -->
                    <div x-cloak x-show="openMobileMenu" class="lg:hidden bg-white bg-opacity-50 shadow-md rounded-b-lg"
                        style="backdrop-filter: blur(20px);" id="mobile-menu">
                        <div class="px-2 pt-2 pb-3 space-y-1">
                            <a href="main-hall.html"
                                class="text-[#00B4BF] block rounded-md py-2 px-3 text-base font-medium">
                                Main Hall
                            </a>

                            <a href="seminar-room.html"
                                class="text-gray-900 hover:text-[#00B4BF] block rounded-md py-2 px-3 text-base font-medium">
                                Seminar
                            </a>
                            <a href="exhibitor-list.html"
                                class="text-gray-900 hover:text-[#00B4BF] block rounded-md py-2 px-3 text-base font-medium">
                                Exhibitors
                            </a>

                            <a href="consultation.html"
                                class="text-gray-900 hover:text-[#00B4BF] block rounded-md py-2 px-3 text-base font-medium">
                                Consultation
                            </a>

                            <a href="live-schedule.html"
                                class="text-gray-900 hover:text-[#00B4BF] block rounded-md py-2 px-3 text-base font-medium">
                                Live Stage Schedule
                            </a>
                        </div>
                        <div class="pt-4 pb-3 border-t border-white">
                            <div class="px-5 flex items-center">
                                <div class="flex-shrink-0">
                                    <img class="rounded-full h-10 w-10"
                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                </div>
                                <div class="ml-3">
                                    <div class="text-base font-medium text-gray-900">Tom Cook</div>
                                    <div class="text-sm font-medium text-[#00B4BF]">tom@example.com</div>
                                </div>
                                <button
                                    class="ml-auto flex-shrink-0 rounded-full p-1 text-gray-900 hover:text-[#00B4BF] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-[#00B4BF] focus:ring-white">
                                    <span class="sr-only">View notifications</span>
                                    <!-- Heroicon name: outline/bell -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </button>
                            </div>
                            <div class="mt-3 px-2 space-y-1">
                                <a href="#"
                                    class="block rounded-md py-2 px-3 text-base font-medium text-gray-900 hover:text-[#00B4BF]">
                                    Your Profile
                                </a>

                                <a href="#"
                                    class="block rounded-md py-2 px-3 text-base font-medium text-gray-900 hover:text-[#00B4BF]">
                                    Settings
                                </a>

                                <a href="#"
                                    class="block rounded-md py-2 px-3 text-base font-medium text-gray-900 hover:text-[#00B4BF]">
                                    Sign out
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            <main class="px-1.5 lg:px-2 pb-2 max-w-7xl mx-auto">
                <!-- ###### Modals ###### -->
                <!-- Start Video Modal/Dialog -->
                <div x-cloak x-show="openVideoModal" @keydown.window.escape="openVideoModal = false"
                    class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" x-ref="dialog"
                    aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                        <!-- Overlay -->
                        <div x-show="openVideoModal" x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            x-description="Background overlay, show/hide based on modal state."
                            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                            @click="openVideoModal = false" aria-hidden="true">
                        </div>


                        <!-- This element is to trick the browser into centering the modal contents. -->
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>

                        <!-- Modal -->
                        <div x-show="openVideoModal" x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-description="Modal panel, show/hide based on modal state."
                            class="inline-block align-bottom rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-5xl sm:w-full sm:p-6 -translate-y-10"
                            style="background: rgba( 255, 255, 255, 0.15 );
      box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
      backdrop-filter: blur( 6.5px );
      -webkit-backdrop-filter: blur( 6.5px );
      border-radius: 10px;
      border: 1px solid rgba( 255, 255, 255, 0.18 );">
                            <div class="plyr__video-embed" id="player" style="--plyr-color-main: #00B4BF;">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/3u_vIdnJYLc"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen allow="autoplay"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Video Modal/ Dialog -->

                @include('layouts.dashboard.chat')

                <!-- End Chat Modal/ Dialog -->
            </main>

            <!-- ###### Links ######-->
            <!-- Link Exhibition Hall -->
            <div class="btn-1">
                <a href="exhibitor-list.html"
                    class="h-full bg-[#A6FAFF] bg-opacity-100 w-full rounded-md text-[#00B4BF] border-[4px] border-[#00B4BF] flex items-center justify-center space-x-2"><svg
                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="door-open"
                        class="svg-inline--fa fa-door-open fa-w-20 w-8 h-8" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path fill="currentColor"
                            d="M624 448h-80V113.45C544 86.19 522.47 64 496 64H384v64h96v384h144c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16zM312.24 1.01l-192 49.74C105.99 54.44 96 67.7 96 82.92V448H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h336V33.18c0-21.58-19.56-37.41-39.76-32.17zM264 288c-13.25 0-24-14.33-24-32s10.75-32 24-32 24 14.33 24 32-10.75 32-24 32z">
                        </path>
                    </svg>
                    <span class="text-2xl font-bold">Enter</span></a>
            </div>

            <div class="btn-2">
                <a href="seminar-room.html"
                    class=" h-full bg-[#A6FAFF] bg-opacity-100 w-full rounded-md text-[#00B4BF] border-[4px] border-[#00B4BF] flex items-center justify-center space-x-2""><svg
          aria-hidden=" true" focusable="false" data-prefix="fas" data-icon="door-open"
                    class="svg-inline--fa fa-door-open fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 640 512">
                    <path fill="currentColor"
                        d="M624 448h-80V113.45C544 86.19 522.47 64 496 64H384v64h96v384h144c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16zM312.24 1.01l-192 49.74C105.99 54.44 96 67.7 96 82.92V448H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h336V33.18c0-21.58-19.56-37.41-39.76-32.17zM264 288c-13.25 0-24-14.33-24-32s10.75-32 24-32 24 14.33 24 32-10.75 32-24 32z">
                    </path>
                    </svg>
                    <span class="font-bold">Enter</span>
                </a>
            </div>

            <!-- Open Video Button -->
            <button @click="openVideoModal = true"
                style="background-image: url('https://i.ytimg.com/vi/3u_vIdnJYLc/maxresdefault.jpg'); background-position: center; background-size: cover;"
                class="btn-3 bg-opacity-15 rounded-md text-[#00B4BF] border-[4px] border-[#00B4BF] animate-pulse flex items-center justify-center"><svg
                    class="pl-1" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18.25 12L5.75 5.75V18.25L18.25 12Z" />
                </svg>
                <span class="sr-only">Open Video</span></button>

            <!-- Advertisement 1 -->
            <div class="advertisement">
                <div>
                    <iframe width="100%" height="100%"
                        src="https://www.youtube.com/embed/3u_vIdnJYLc?autoplay=1&mute=1&loop=1"
                        title="YouTube video player" frameborder="0" allow="autoplay; loop; fullscreen"></iframe>
                </div>
            </div>

            <!-- Advertisement 2 -->
            <div class=" advertisement2">
                <div>
                    <iframe width="100%" height="100%"
                        src="https://www.youtube.com/embed/3u_vIdnJYLc?autoplay=1&mute=1&loop=1"
                        title="YouTube video player" frameborder="0" allow="autoplay; loop; fullscreen"></iframe>
                </div>
            </div>
        </div>

        <!-- Script -->
        <script src="https://cdn.plyr.io/3.6.8/plyr.js"></script>
        <!-- <script>const player = new Plyr('#player');</script> -->
        <script>
            const player = new Plyr('#player');

    const posters = [
      "{{ asset('assets/img/brosur1.jpg') }}",
      "{{ asset('assets/img/brosur2.jpg') }}",
      "{{ asset('assets/img/brosur3.jpg') }}",
      "{{ asset('assets/img/brosur4.jpg') }}",
      "{{ asset('assets/img/brosur5.jpg') }}",
    ];

    // Chat
    const chatForm = document.getElementById('chat-form');
    const message = document.getElementById('message');
    const imageFile = document.getElementById('imageFile');

    chatForm.onsubmit = (e) => {
      e.preventDefault();
      console.log({ e });
      console.log({ message: message.innerText })
      console.log({ imageFile: imageFile.files[0] })
    }
        </script>
    </body>

</html>
