<!DOCTYPE html>
<html lang="en">

    @include('layouts.dashboard.head')

    <body
        x-data="{openVideoModal: false, openProductSlideOver: false, openCompanyProfileSlideOver: false, openBookConsultationModal: false, openPosterModal: false, openChatModal: false, selectedPoster: null, posters: posters }"
        class="2xl:overflow-y-scroll">

        <!-- Chat Button -->
        <div class="absolute right-4 lg:right-6 bottom-4 lg:bottom-6 z-10" style="backdrop-filter: (4px);">
            <button @click="openChatModal = true"
                class="animate-bounce bg-white bg-opacity-50 hover:bg-opacity-80 transition-all duration-200 px-2 lg:px-3 py-4 lg:py-6 rounded-full shadow-2xl">
                <img class="w-14 lg:w-20" src="{{ asset('assets/img/chat-icon.png') }}" alt="chat-icon">
            </button>
        </div>

        @include('layouts.dashboard.header')

        @yield('content')

        @yield('script')
    </body>

</html>
