<!-- Header / Navbar (hidden in small screen) -->
<header class="hidden lg:block bg-transparent sticky z-10">
    <nav x-data="{openProfileDropdown: false, openMobileMenu: false}"
        class="bg-transparent px-1.5 lg:px-2 py-1.5 xl:py-2">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8 bg-white rounded-t-lg lg:rounded-b-lg bg-opacity-50 shadow"
            style="backdrop-filter: blur(20px);">
            <div class="relative h-12 2xl:h-16 flex items-center justify-between">
                <div class="px-2 flex items-center lg:px-0">
                    <a href="index.html" class="flex-shrink-0 flex items-center space-x-3">
                        <img class="block h-10 w-10 2xl:h-12 2xl:w-12" src="{{ asset('assets/img/ptpi.png') }}"
                            alt="Workflow">
                        <div class="hidden lg:block text-2xl font-bold text-[#00B4BF]">HEF 2021</div>
                    </a>
                    <div class="hidden lg:block lg:ml-10">
                        <div class="flex space-x-4">
                            <a href="{{ route('main-hall') }}"
                                class="text-gray-700 hover:text-gray-900 rounded-md px-3 font-medium">
                                Main Hall
                            </a>

                            <a href="seminar-room.html"
                                class="text-gray-700 hover:text-gray-900 rounded-md px-3 font-medium">
                                Seminar
                            </a>

                            <a href="{{ route('exhibitor-list') }}"
                                class="text-gray-700 hover:text-gray-900 rounded-md px-3 font-medium">
                                Exhibitors
                            </a>

                            <a href="{{ route('consultation') }}"
                                class="text-gray-700 hover:text-gray-900 rounded-md px-3 font-medium">
                                Consultation
                            </a>

                            <a href="{{ route('live-schedule') }}" class="text-[#00B4BF] rounded-md px-3 font-medium">
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

                <!-- Desktop User Dropdown -->
                <div class="hidden lg:block lg:ml-4">
                    <div class="flex items-center">
                        <button
                            class="flex-shrink-0 rounded-full p-1 text-white hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-white">
                            <span class="sr-only">View notifications</span>
                            <!-- Heroicon name: outline/bell -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="ml-3 relative flex-shrink-0">
                            <div>
                                <button x-on:click="openProfileDropdown = !openProfileDropdown" type="button"
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

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="block py-2 px-4 text-sm text-gray-900 hover:text-[#00B4BF] font-medium"
                                        role="menuitem" tabindex="-1" id="user-menu-item-2">
                                        Sign out
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
