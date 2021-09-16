<!DOCTYPE html>
<html lang="en">

    <head>

        @include('layouts.dashboard.head')
    </head>

    <body x-data="{ openChatModal: false }" class="2xl:overflow-y-scroll bg-gray-100">
        @include('layouts.dashboard.fab-chat')
        @include('layouts.dashboard.header')
        @include('layouts.dashboard.header-lg')

        <main class="max-w-7xl mx-auto px-2 xl:px-0">
            <!-- ###### Modals ###### -->
            @include('layouts.dashboard.chat')

            <div class="px-2 xl:px-0 py-6">
                <h2
                    class="pl-0 lg:pl-1 text-xl text-gray-700 mb-4 font-bold text-center lg:text-left uppercase tracking-wide">
                    Your Consultation Booking
                </h2>
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
                                                Date
                                            </th>
                                            <th scope="col"
                                                class="hidden sm:block px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Time
                                            </th>
                                            <th scope="col"
                                                class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Exhibitor
                                            </th>
                                            <th scope="col" class="relative px-3 sm:px-6 py-3">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody x-data="{ consultations }" class="bg-white divide-y divide-gray-200">
                                        <template x-for="consultation, index in consultations"
                                            :key="`consultation.title ${index}`">
                                            <tr>
                                                <td class="px-4 py-2  sm:px-6 sm:py-4 whitespace-nowrap">
                                                    <div x-text="consultation.date"
                                                        class="text-sm font-medium text-gray-900">
                                                    </div>
                                                    <div x-text="consultation.time"
                                                        class="block sm:hidden text-sm font-medium text-gray-500">
                                                    </div>
                                                </td>
                                                <td
                                                    class="hidden sm:table-cell px-4 py-2  sm:px-6 sm:py-4 whitespace-nowrap">
                                                    <div x-text="consultation.time"
                                                        class="text-sm font-medium text-gray-900">
                                                    </div>
                                                </td>
                                                <td class="px-4 py-2  sm:px-6 sm:py-4 whitespace-nowrap">
                                                    <a x-text="consultation.exhibitor"
                                                        x-bind:href="consultation.link_booth"
                                                        class="text-sm text-gray-900 hover:text-[#00B4BF]"></a>
                                                    <div x-text="consultation.engineering_areas.join(', ')"
                                                        class="text-sm text-gray-500">
                                                    </div>
                                                </td>
                                                <td class="px-4 py-2  sm:px-6 sm:py-4 whitespace-nowrap">
                                                    <template x-if="consultation.status === 'done'">
                                                        <span x-text="consultation.status"
                                                            class="px-2 py-1 sm:px-4 sm:py-1.5 inline-flex text-xs sm:text-sm leading-5 font-semibold rounded-md bg-green-100 text-green-800">
                                                        </span>
                                                    </template>
                                                    <template x-if="consultation.status === 'cancelled'">
                                                        <span x-text="consultation.status"
                                                            class="px-2 py-1 sm:px-4 sm:py-1.5 inline-flex text-xs sm:text-sm leading-5 font-semibold rounded-md bg-red-100 text-red-800">
                                                        </span>
                                                    </template>
                                                    <template x-if="consultation.status === 'current'">
                                                        <a x-bind:href="consultation.link_zoom" target="_blank"
                                                            class="px-2 py-1 sm:px-4 sm:py-1.5 inline-flex text-xs sm:text-sm leading-5 font-semibold rounded-md bg-blue-500 hover:bg-blue-600 hover:animate-none transition text-white animate-bounce">
                                                            Join Zoom
                                                        </a>
                                                    </template>
                                                    <template x-if="consultation.status === 'upcoming'">
                                                        <span x-text="consultation.status"
                                                            class="px-2 py-1 sm:px-4 sm:py-1.5 inline-flex text-xs sm:text-sm leading-5 font-semibold rounded-md bg-gray-100 text-gray-800">
                                                        </span>
                                                    </template>
                                                </td>
                                            </tr>
                                        </template>


                                        <!-- <tr>
                            <td class="px-4 py-2  sm:px-6 sm:py-4 whitespace-nowrap">
                              <div class="text-sm font-medium text-gray-900">
                                3 October 2021
                              </div>
                              <div class="block sm:hidden text-sm font-medium text-gray-500">
                                08.00 - 09.00
                              </div>
                            </td>
                            <td class="hidden sm:table-cell px-4 py-2  sm:px-6 sm:py-4 whitespace-nowrap">
                              <div class="text-sm font-medium text-gray-900">
                                08.00 - 09.00
                              </div>
                            </td>

                            <td class="px-4 py-2  sm:px-6 sm:py-4 whitespace-nowrap">
                              <a href="virtual-booth-10.html" class="text-sm text-gray-900 hover:text-[#00B4BF]">PT Karya
                                Indonesia Cerdas</a>
                              <div class="text-sm text-gray-500">Hospital Informatics</div>
                            </td>
                            <td class="px-4 py-2  sm:px-6 sm:py-4 whitespace-nowrap">
                              <span
                                class="px-2 py-1 sm:px-4 sm:py-1.5 inline-flex text-xs sm:text-sm leading-5 font-semibold rounded-md bg-red-100 text-red-800">
                                Cancelled
                              </span>
                            </td>
                          </tr>

                          <tr>
                            <td class="px-4 py-2  sm:px-6 sm:py-4 whitespace-nowrap">
                              <div class="text-sm font-medium text-gray-900">
                                3 October 2021
                              </div>
                              <div class="block sm:hidden text-sm font-medium text-gray-500">
                                08.00 - 09.00
                              </div>
                            </td>
                            <td class="hidden sm:table-cell px-4 py-2  sm:px-6 sm:py-4 whitespace-nowrap">
                              <div class="text-sm font-medium text-gray-900">
                                11.00 - 11.30
                              </div>
                            </td>
                            <td class="px-4 py-2  sm:px-6 sm:py-4 whitespace-nowrap">
                              <a href="virtual-booth-10.html" class="text-sm text-gray-900 hover:text-[#00B4BF]">PT Karya
                                Indonesia Cerdas</a>
                              <div class="text-sm text-gray-500">Hospital Informatics</div>
                            </td>
                            <td class="px-4 py-2  sm:px-6 sm:py-4 whitespace-nowrap">
                              <button
                                class="px-2 py-1 sm:px-4 sm:py-1.5 inline-flex text-xs sm:text-sm leading-5 font-semibold rounded-md bg-blue-500 hover:bg-blue-600 transition text-white animate-bounce">
                                Join Zoom
                              </button>
                            </td>
                          </tr>

                          <tr>
                            <td class="px-4 py-2  sm:px-6 sm:py-4 whitespace-nowrap">
                              <div class="text-sm font-medium text-gray-900">
                                4 October 2021
                              </div>
                              <div class="block sm:hidden text-sm font-medium text-gray-500">
                                08.00 - 09.00
                              </div>
                            </td>
                            <td class="hidden sm:table-cell px-4 py-2  sm:px-6 sm:py-4 whitespace-nowrap">
                              <div class="text-sm font-medium text-gray-900">
                                11.00 - 11.30
                              </div>
                            </td>
                            <td class="px-4 py-2  sm:px-6 sm:py-4 whitespace-nowrap">
                              <a href="virtual-booth-10.html" class="text-sm text-gray-900 hover:text-[#00B4BF]">PT Karya
                                Indonesia Cerdas</a>
                              <div class="text-sm text-gray-500">Hospital Informatics</div>
                            </td>
                            <td class="px-4 py-2  sm:px-6 sm:py-4 whitespace-nowrap">
                              <span
                                class="px-2 py-1 sm:px-4 sm:py-1.5 inline-flex text-xs sm:text-sm leading-5 font-semibold rounded-md bg-gray-100 text-gray-800">
                                Upcoming
                              </span>
                            </td>
                          </tr> -->
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
            const consultations = [
      {
        date: "2 October 2021",
        time: "08.00 - 09.00",
        exhibitor: "PT Karya Indonesia Cerdas",
        link_booth: "virtual-booth-5.html",
        engineering_areas: ["Hospital Informatics", "Hospital Electrics"],
        status: "done",
        link_zoom: 'https://zoom.us'
      },
      {
        date: "3 October 2021",
        time: "08.00 - 09.00",
        exhibitor: "PT Karya Indonesia Cerdas",
        link_booth: "virtual-booth-5.html",
        engineering_areas: ["Hospital Informatics"],
        status: "cancelled",
        link_zoom: 'https://zoom.us'
      },
      {
        date: "3 October 2021",
        time: "11.00 - 11.30",
        exhibitor: "PT Karya Indonesia Cerdas",
        link_booth: "virtual-booth-5.html",
        engineering_areas: ["Hospital Informatics"],
        status: "current",
        link_zoom: 'https://zoom.us'
      },
      {
        date: "4 October 2021",
        time: "11.00 - 11.30",
        exhibitor: "PT Karya Indonesia Cerdas",
        link_booth: "virtual-booth-5.html",
        engineering_areas: ["Hospital Informatics", "Hospital Electrics"],
        status: "upcoming",
        link_zoom: 'https://zoom.us'
      },
    ];
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
