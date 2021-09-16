<!DOCTYPE html>
<html lang="en">
    @include('layouts.dashboard.head')
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        [x-cloak] {
            display: none !important;
        }


        .swiper-pagination-bullet {
            border-radius: 100%;
            width: 1vw;
            height: 1vw;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .swiper-pagination-bullet-active {
            background-color: #00B4BF;
        }

        .overlay-nav {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .exhibitor-list {
            background-image: url('./assets/exhibitor-list.jpg');
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

        .board-wrapper {
            perspective: 1000px;
            position: absolute;
            top: 28.5%;
            left: 20.6%;
            width: 55.5%;
            height: 49%;
            overflow: hidden;
        }

        .board {
            width: 100%;
            height: 100%;
            /* animation: fullpulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite; */
        }

        .board:hover {
            animation: none;
        }

        .board svg {
            width: 50%;
            height: auto;
        }

        .board-title {
            background: rgba(255, 255, 255, 0.6);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            padding: 0.5% 1%;
            font-size: 2vw;
            font-weight: bold;
            left: 20.5%;
            width: 55.5%;
            top: 19%
        }

        .filter-box-wrapper {
            background: rgba(255, 255, 255, 0.6);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            perspective: 1000px;
            position: absolute;
            top: 78.75%;
            left: 20.5%;
            width: 55.5%;
            height: 10.5%;
            overflow: hidden;
        }

        .filter-box {
            width: 100%;
            height: 100%;
            padding: 0 2%;

            /* padding: 2%; */
            /* animation: fullpulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite; */
        }

        .filter-item {
            font-size: 1vw;
            display: flex;
            align-items: center;
        }

        .filter-item input {
            width: 1vw;
            height: 1vw;
            margin-right: 2%;
            border-radius: 3px;
        }

        .search-exhibitor-input {
            /* margin-bottom: 2%; */
        }

        .search-exhibitor-input-icon {
            height: 1.1vw;
        }

        .search-exhibitor-input input {
            width: 100%;
            height: 100%;
            /* padding: 2% 4% 2% 4$; */
            padding: 1% 4% 1% 8%;
            font-size: 50%;

        }

        .search-exhibitor-button {
            padding: 1.5% 3%;
        }

        .search-exhibitor-button svg {
            width: 1.1vw;
            /* height: 10%; */
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
                opacity: 0.6;
            }

            50% {
                opacity: 0
            }
        }
    </style>

    <body x-data="{ openChatModal: false }" class="2xl:overflow-y-scroll bg-gray-100">
        @include('layouts.dashboard.fab-chat')
        @include('layouts.dashboard.header')
        @include('layouts.dashboard.header-lg')
        <main class="max-w-7xl mx-auto px-2 xl:px-0">
            @include('layouts.dashboard.chat')

            <div class="px-2 xl:px-0 py-6">
                <div class="flex justify-between items-center mb-4">
                    <h2
                        class="pl-0 lg:pl-1 text-xl text-gray-700 font-bold text-center lg:text-left uppercase tracking-wide">
                        Live Stage
                        Schedule
                    </h2>
                    <a href="https://zoom.us" target="_blank"
                        class="px-6 py-2 inline-flex leading-5 font-semibold rounded-md bg-blue-500 hover:bg-blue-600 transition text-white">
                        Join Zoom
                    </a>
                </div>

                <!-- Table -->
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Day
                                            </th>
                                            <th scope="col"
                                                class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Time
                                            </th>
                                            <th scope="col"
                                                class="hidden sm:block px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Title
                                            </th>
                                            <th scope="col"
                                                class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Speaker
                                            </th>
                                            <th scope="col" class="relative px-3 sm:px-6 py-3">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody x-data="{ schedules }" class="bg-white divide-y divide-gray-200">

                                        <template x-for="schedule in schedules" :key="schedule.title">
                                            <tr>
                                                <td class="px-4 py-2  sm:px-6 sm:py-4 whitespace-nowrap">
                                                    <div x-text="schedule.day"
                                                        class="text-sm font-medium text-gray-900">

                                                    </div>
                                                </td>
                                                <td class="px-4 py-2  sm:px-6 sm:py-4 whitespace-nowrap">
                                                    <div x-text="schedule.date"
                                                        class="text-sm font-medium text-gray-900">

                                                    </div>
                                                    <div x-text="schedule.time"
                                                        class="text-sm font-medium text-gray-500">

                                                    </div>
                                                </td>
                                                <td
                                                    class="hidden sm:table-cell px-4 py-2  sm:px-6 sm:py-4 whitespace-nowrap">
                                                    <div x-text="schedule.title"
                                                        class="text-sm font-medium text-gray-900">
                                                        Welcome Speech
                                                    </div>
                                                    <div x-text="schedule.subtitle"
                                                        class="text-sm font-medium text-gray-500">

                                                    </div>
                                                </td>
                                                <td class="px-4 py-2  sm:px-6 sm:py-4 whitespace-nowrap">
                                                    <div x-text="schedule.speaker"
                                                        class="text-sm font-medium text-gray-900">
                                                    </div>
                                                </td>
                                                <td class="px-4 py-2  sm:px-6 sm:py-4 whitespace-nowrap">
                                                    <template x-if="schedule.status === 'done'">
                                                        <span x-text="schedule.status"
                                                            class="px-2 py-1 sm:px-4 sm:py-1.5 inline-flex text-xs sm:text-sm leading-5 font-semibold rounded-md bg-green-100 text-green-800 uppercase">
                                                        </span>
                                                    </template>
                                                    <template x-if="schedule.status === 'now-showing'">
                                                        <span x-text="schedule.status"
                                                            class="px-2 py-1 sm:px-4 sm:py-1.5 inline-flex text-xs sm:text-sm leading-5 font-semibold rounded-md bg-yellow-100 text-yellow-800 uppercase animate-pulse">
                                                        </span>
                                                    </template>
                                                    <template x-if="schedule.status === 'upcoming'">
                                                        <span x-text="schedule.status"
                                                            class="px-2 py-1 sm:px-4 sm:py-1.5 inline-flex text-xs sm:text-sm leading-5 font-semibold rounded-md bg-gray-100 text-gray-800 uppercase">
                                                        </span>
                                                    </template>

                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Chat Modal/ Dialog -->
        </main>
        <!-- Script -->
        <script src="https://cdn.plyr.io/3.6.8/plyr.js"></script>
        <script>
            const player = new Plyr('#player');
        </script>
        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

        <script>
            const schedules = [
              {
                day: "Day 1",
                date: "2 October 2021",
                time: "08.00 - 08.10",
                title: "Welcome Speech",
                subtitle: "",
                speaker: "IAHE President",
                status: "done"
              },
              {
                day: "Day 1",
                date: "2 October 2021",
                time: "08.10 - 08.30",
                title: "Keynote Speech I",
                subtitle: "",
                speaker: "Ministry of Health Representative",
                status: "done"
              },
              {
                day: "Day 1",
                date: "2 October 2021",
                time: "08.30 - 08.50",
                title: "Keynote Speech II",
                subtitle: "",
                speaker: "IFHE Representative",
                status: "now-showing"
              },
              {
                day: "Day 1",
                date: "2 October 2021",
                time: "09.00 - 09.30",
                title: "Hospital Building I Expert Talk",
                subtitle: "Master Plan and Hospital Building Regulations",
                speaker: "Ministry of PUblic Works and Housing Representative",
                status: "upcoming"
              },
            ]
        </script>

        <script>
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
