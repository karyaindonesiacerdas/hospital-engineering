<!-- Header / Navbar (hidden in large screen) -->
<header class="block lg:hidden bg-transparent sticky z-10">
    <nav x-data="{openProfileDropdown: false, openMobileMenu: false}" class="bg-transparent">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8 bg-white rounded-t-lg lg:rounded-b-lg bg-opacity-50 shadow"
            style="backdrop-filter: blur(20px);">
            <div class="relative h-12 2xl:h-16 flex items-center justify-between">
                <div class="px-2 flex items-center lg:px-0">
                    <a href="index.html" class="flex-shrink-0 flex items-center space-x-3">
                        <img class="block h-10 w-10 2xl:h-12 2xl:w-12" src="{{ asset('assets/img/ptpi.png') }}"
                            alt="Workflow">
                        <div class="hidden lg:block text-2xl font-bold text-[#00B4BF]">HEF 2021</div>
                    </a>
                </div>

                <div class="flex lg:hidden">
                    <!-- Mobile menu button -->
                    <button type="button" x-on:click="openMobileMenu = !openMobileMenu"
                        class="p-2 rounded-md inline-flex items-center justify-center text-gray-800 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu Icon -->
                        <svg x-bind:class="! openMobileMenu ? 'block' : 'hidden'" class="h-6 w-6"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!-- Close Menu Icon -->
                        <svg x-bind:class="! openMobileMenu ? 'hidden' : 'block'" class="h-6 w-6"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div x-cloak x-show="openMobileMenu" class="lg:hidden bg-white bg-opacity-50 shadow-md rounded-b-lg"
            style="backdrop-filter: blur(20px);" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('main-hall') }}"
                    class="text-gray-900 hover:text-[#00B4BF] block rounded-md py-2 px-3 text-base font-medium">
                    Main Hall
                </a>

                <a href="seminar-room.html"
                    class="text-gray-900 hover:text-[#00B4BF] block rounded-md py-2 px-3 text-base font-medium">
                    Seminar
                </a>

                <a href="{{ route('exhibitor-list') }}"
                    class="text-gray-900 hover:text-[#00B4BF] block rounded-md py-2 px-3 text-base font-medium">
                    Exhibitors
                </a>

                <a href="{{ route('consultation') }}"
                    class="text-gray-900 hover:text-[#00B4BF] block rounded-md py-2 px-3 text-base font-medium">
                    Consultation
                </a>

                <a href="{{ route('live-schedule') }}"
                    class="text-[#00B4BF] block rounded-md py-2 px-3 text-base font-medium">
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
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
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

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();"
                            class="block rounded-md py-2 px-3 text-base font-medium text-gray-900 hover:text-[#00B4BF]">
                            Sign out
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</header>
