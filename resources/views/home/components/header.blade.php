<!-- Header -->
<header
    class="sticky z-40 md:z-auto top-0 sm:top-auto bg-white sm:bg-transparent flex sm:flex h-[50px] sm:h-[70px] max-w-7xl mx-auto px-4 md:px-2 items-center justify-between">
    <div class="flex items-center space-x-2 sm:space-x-3">
        <img class="w-10 h-10 sm:w-14 sm:h-14" src="{{ asset('assets/img/ptpi.png') }}" alt="Logo PTPI">
        <div>
            <div class="text-sm sm:text-lg xl:text-2xl uppercase font-bold text-gray-800 tracking-wider">Hospital
                Engineering Forum 2021
            </div>
            <div class="hidden sm:block text-xs xl:text-md uppercase text-gray-600 tracking-wider">Plan Your Hospital
                with
                The Most Cost Effective Technology!
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
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div x-show="openMobileMenu" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95" @click.away="openMobileMenu = false"
        class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden z-50">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
            <div class="pt-5 pb-6 px-5">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2 sm:space-x-3">
                        <img class="w-10 h-10 sm:w-14 sm:h-14" src="{{ asset('assets/img/ptpi.png') }}" alt="Logo PTPI">
                        <div>
                            <div
                                class="text-sm sm:text-lg xl:text-2xl uppercase font-bold text-gray-800 tracking-wider">
                                Hospital
                                Engineering
                                Forum
                                2021
                            </div>
                            <div class="hidden sm:block text-xs xl:text-md uppercase text-gray-600 tracking-wider">Plan
                                your
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
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mt-6">
                    <nav class="grid gap-y-4">
                        <!-- Home -->
                        <a href="#"
                            class="bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-[#00B4BF]">
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

                        <!-- Overview -->
                        <div x-data="{ open: false }" class="space-y-1">
                            <button type="button"
                                class="bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-[#00B4BF]"
                                x-state:on="Current" x-state:off="Default" aria-controls="sub-menu-1"
                                @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()"
                                x-state-description="Current: &quot;bg-gray-100 text-gray-900&quot;, Default: &quot;bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900&quot;">
                                <svg class="flex-shrink-0 h-6 w-6 text-[#00B4BF]" xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                                <span class="flex-1 ml-3 text-base font-medium text-gray-900">
                                    Overview
                                </span>
                                <svg class="text-gray-300 ml-3 flex-shrink-0 h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150"
                                    viewBox="0 0 20 20" x-state:on="Expanded" x-state:off="Collapsed" aria-hidden="true"
                                    :class="{ 'text-gray-400 rotate-90': open, 'text-gray-300': !(open) }">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor"></path>
                                </svg>
                            </button>
                            <div x-description="Expandable link section, show/hide based on state." class="space-y-1"
                                id="sub-menu-1" x-show="open">

                                <a href="{{ route('overview.about-hef') }}"
                                    class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                    About HEF
                                </a>

                                <a href="{{ route('overview.about-iahe') }}"
                                    class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                    About IAHE
                                </a>

                                <a href="{{ route('overview.webinar-rundown') }}"
                                    class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                    Webinar Rundown
                                </a>

                                <a href="{{ route('overview.news') }}"
                                    class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                    News
                                </a>

                                <a href="#"
                                    class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                    Important Dates
                                </a>

                            </div>
                        </div>

                        <!-- Visitor -->
                        <div x-data="{ open: false }" class="space-y-1">
                            <button type="button"
                                class="bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-[#00B4BF]"
                                x-state:on="Current" x-state:off="Default" aria-controls="sub-menu-1"
                                @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()"
                                x-state-description="Current: &quot;bg-gray-100 text-gray-900&quot;, Default: &quot;bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900&quot;">
                                <svg class="flex-shrink-0 h-6 w-6 text-[#00B4BF]" xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="flex-1 ml-3 text-base font-medium text-gray-900">
                                    Visitor
                                </span>
                                <svg class="text-gray-300 ml-3 flex-shrink-0 h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150"
                                    viewBox="0 0 20 20" x-state:on="Expanded" x-state:off="Collapsed" aria-hidden="true"
                                    :class="{ 'text-gray-400 rotate-90': open, 'text-gray-300': !(open) }">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor"></path>
                                </svg>
                            </button>
                            <div x-description="Expandable link section, show/hide based on state." class="space-y-1"
                                id="sub-menu-1" x-show="open">

                                <a href="{{ route('visitor.guideline') }}"
                                    class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                    Visitor Guideline
                                </a>

                                <a href="{{ route('visitor.who-attend') }}"
                                    class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                    Who Attends?
                                </a>

                                <a href="{{ route('visitor.why-attend') }}"
                                    class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                    Why Attend?
                                </a>
                            </div>
                        </div>

                        <!-- Exhibitor -->
                        <div x-data="{ open: false }" class="space-y-1">
                            <button type="button"
                                class="bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-[#00B4BF]"
                                x-state:on="Current" x-state:off="Default" aria-controls="sub-menu-1"
                                @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()"
                                x-state-description="Current: &quot;bg-gray-100 text-gray-900&quot;, Default: &quot;bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900&quot;">
                                <svg class="flex-shrink-0 h-6 w-6 text-[#00B4BF]" xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                                </svg>
                                <span class="flex-1 ml-3 text-base font-medium text-gray-900">
                                    Exhibitor
                                </span>
                                <svg class="text-gray-300 ml-3 flex-shrink-0 h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150"
                                    viewBox="0 0 20 20" x-state:on="Expanded" x-state:off="Collapsed" aria-hidden="true"
                                    :class="{ 'text-gray-400 rotate-90': open, 'text-gray-300': !(open) }">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor"></path>
                                </svg>
                            </button>
                            <div x-description="Expandable link section, show/hide based on state." class="space-y-1"
                                id="sub-menu-1" x-show="open">

                                <a href="{{ route('exhibitor.guideline') }}"
                                    class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                    Exhibitor Guideline
                                </a>

                                <a href="{{ route('exhibitor.who-exhibit') }}"
                                    class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                    Who Exhibit?
                                </a>

                                <a href="{{ route('exhibitor.why-exhibit') }}"
                                    class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                    Why Exhibit?
                                </a>

                                <a href="{{ route('exhibitor.packages') }}"
                                    class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                    Packages
                                </a>

                                <!-- <a href="#"
                    class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                    Exhibitor List
                  </a>

                  <a href="#"
                    class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                    Sponsor & Partner
                  </a> -->
                            </div>
                        </div>

                        <!-- FAQ -->
                        <div x-data="{ open: false }" class="space-y-1">
                            <button type="button"
                                class="bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-[#00B4BF]"
                                x-state:on="Current" x-state:off="Default" aria-controls="sub-menu-1"
                                @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()"
                                x-state-description="Current: &quot;bg-gray-100 text-gray-900&quot;, Default: &quot;bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900&quot;">
                                <svg class="flex-shrink-0 h-6 w-6 text-[#00B4BF]" xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="flex-1 ml-3 text-base font-medium text-gray-900">
                                    FAQ
                                </span>
                                <svg class="text-gray-300 ml-3 flex-shrink-0 h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150"
                                    viewBox="0 0 20 20" x-state:on="Expanded" x-state:off="Collapsed" aria-hidden="true"
                                    :class="{ 'text-gray-400 rotate-90': open, 'text-gray-300': !(open) }">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor"></path>
                                </svg>
                            </button>
                            <div x-description="Expandable link section, show/hide based on state." class="space-y-1"
                                id="sub-menu-1" x-show="open">

                                <a href="{{ route('faq.general') }}"
                                    class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                    FAQ General & Technical
                                </a>

                                <a href="{{ route('faq.visitor') }}"
                                    class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                    FAQ Visitor
                                </a>

                                <a href="{{ route('faq.exhibitor') }}"
                                    class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                    FAQ Exhibitor
                                </a>
                            </div>
                        </div>

                    </nav>
                </div>
            </div>
            <div class="py-6 px-5 space-y-6">
                <div>
                    <div class="grid grid-cols-2 gap-2">
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSeawVl6UT0m2DwsYryRt1Yf-NSFhSnIR-gE6Baq58qJYSxc_Q/viewform"
                            class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:bg-[#116368] bg-[#00B4BF]">
                            Register as Exhibitor
                        </a>
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSeawVl6UT0m2DwsYryRt1Yf-NSFhSnIR-gE6Baq58qJYSxc_Q/viewform"
                            class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:bg-[#116368] bg-[#00B4BF]">
                            Register as Visitor
                        </a>
                    </div>
                    <p class="mt-6 text-center text-base font-medium text-gray-500">
                        Already have an account?
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSeawVl6UT0m2DwsYryRt1Yf-NSFhSnIR-gE6Baq58qJYSxc_Q/viewform"
                            class="hover:text-[#116368] text-[#00B4BF]">
                            Login
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>
