<!-- Navigation -->
<nav id="navigation"
    class="hidden md:flex w-full top-0 left-0 right-0 justify-between items-center py-4 px-4 md:px-2 z-50 bg-[#25243A]">
    <div id="navigation-wrapper" class="max-w-7xl mx-auto w-full flex justify-between items-center z-50">
        <ul class="flex space-x-4 lg:space-x-12 font-medium items-center">
            <!-- Home -->
            <li><a href="index.html"
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

                            <a href="about-hef.html"
                                class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                About HEF
                            </a>

                            <a href="about-iahe.html"
                                class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                About IAHE
                            </a>

                            <a href="webinar-rundown.html"
                                class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                Webinar Rundown
                            </a>

                            <a href="news.html"
                                class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                News
                            </a>

                            <a href="important-dates.html"
                                class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                Important Dates
                            </a>

                        </div>
                    </div>
                </div>
            </li>

            <!-- Visitor -->
            <li class="relative" x-data="{open: false}"><button @click="open = true; openGuestModal = true"
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

                            <a href="who-attend.html"
                                class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                Who Attends?
                            </a>

                            <a href="why-attend.html"
                                class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                Why Attend
                            </a>

                        </div>
                    </div>
                </div>
            </li>

            <!-- Exhibitor -->
            <li class="relative" x-data="{open: false}"><button @click="open = true; openGuestModal = true"
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

                            <a href="who-exhibit.html"
                                class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                Who Exhibit?
                            </a>

                            <a href="why-exhibit.html"
                                class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                Why Exhibit?
                            </a>

                            <a href="packages.html"
                                class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                Packages
                            </a>

                            <!-- <a href="#" class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                  Exhibitor List
                </a>

                <a href="#" class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                  Sponsor & Partner
                </a> -->

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

                            <a href="{{ route('faq.general') }}"
                                class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                FAQ General & Technical
                            </a>

                            <a href="{{ route('faq.visitor') }}"
                                class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                FAQ Visitor
                            </a>

                            <a href="{{ route('faq.exhibitor') }}"
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
