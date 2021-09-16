<!-- Start Chat Modal/Dialog -->
<div x-cloak x-show="openChatModal" @keydown.window.escape="openChatModal = false"
    class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" x-ref="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pb-12 text-center lg:block lg:px-0 lg:py-2 overflow-hidden">

        <!-- Overlay -->
        <div x-show="openChatModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            x-description="Background overlay, show/hide based on modal state."
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true">
        </div>


        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden xl:inline-block xl:align-middle xl:h-screen" aria-hidden="true">​</span>

        <!-- Modal -->
        <div x-cloak x-show="openChatModal" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-description="Modal panel, show/hide based on modal state."
            class="inline-block align-bottom rounded-lg p-2 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-7xl sm:w-full sm:p-6 -translate-y-10"
            style="background: rgba( 255, 255, 255, 0.15 );
                              box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
                              backdrop-filter: blur( 6.5px );
                              -webkit-backdrop-filter: blur( 6.5px );
                              border-radius: 10px;
                              border: 1px solid rgba( 255, 255, 255, 0.18 );">

            <div class="grid grid-cols-3 w-full bg-white rounded-md">
                <div class="col-span-1 border-r border-gray-200">
                    <!-- Chat list header -->
                    <div class="py-2 px-4 border-b border-gray-200 h-12 flex items-center">
                        <h3 class="text-xl font-medium text-gray-600">HEF Chat</h3>
                    </div>

                    <!-- Search -->
                    <div class="w-full px-1 sm:px-4 py-2 border-b border-gray-200 h-14 bg-gray-100">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative">
                            <div
                                class="hidden sm:flex absolute inset-y-0 left-0 pl-3  items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input id="search" name="search"
                                class="block w-full px-2 sm:pl-10 sm:pr-3 py-2 border border-gray-300 rounded-md sm:rounded-full leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-[#00B4BF] focus:border-[#00B4BF] sm:text-sm"
                                placeholder="Search" type="search">
                        </div>
                    </div>

                    <!-- Chat list -->
                    <ul class="divide-y divide-gray-200 h-full max-h-[450px] overflow-auto">
                        <li class="group cursor-pointer">
                            <div class="flex space-x-3 px-0 pr-1 sm:px-4 group-hover:bg-gray-100 py-4">
                                <img class="hidden sm:block h-10 w-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=256&h=256&q=80"
                                    alt="John Doe">
                                <div class="flex-1 space-y-1">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-medium">John Doe</h3>
                                        <p class="text-sm text-gray-500">1h</p>
                                    </div>
                                    <p class="text-sm text-gray-500 line-clamp-2">Lorem ipsum dolor sit
                                        amet
                                        consectetur,
                                        adipisicing elit.
                                        Doloribus exercitationem libero aspernatur non. Quis, vitae iure
                                        quae
                                        reprehenderit
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="group cursor-pointer">
                            <div class="flex space-x-3 px-0 pr-1 sm:px-4 group-hover:bg-gray-100 py-4">
                                <img class="hidden sm:block h-10 w-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=256&h=256&q=80"
                                    alt="Jane Doe">
                                <div class="flex-1 space-y-1">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-medium">Jane Doe</h3>
                                        <p class="text-sm text-gray-500">1h</p>
                                    </div>
                                    <p class="text-sm text-gray-500 line-clamp-2">Lorem ipsum dolor sit
                                        amet
                                        consectetur,
                                        adipisicing elit.
                                        Doloribus exercitationem libero aspernatur non. Quis, vitae iure
                                        quae
                                        reprehenderit
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="group cursor-pointer">
                            <div class="flex space-x-3 px-0 pr-1 sm:px-4 group-hover:bg-gray-100 py-4">
                                <img class="hidden sm:block h-10 w-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1615813967515-e1838c1c5116?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=256&h=256&q=80"
                                    alt="Albert">
                                <div class="flex-1 space-y-1">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-medium">Albert</h3>
                                        <p class="text-sm text-gray-500">1h</p>
                                    </div>
                                    <p class="text-sm text-gray-500 line-clamp-2">Lorem ipsum dolor sit
                                        amet
                                        consectetur,
                                        adipisicing elit.
                                        Doloribus exercitationem libero aspernatur non. Quis, vitae iure
                                        quae
                                        reprehenderit
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="group cursor-pointer">
                            <div class="flex space-x-3 px-0 pr-1 sm:px-4 group-hover:bg-gray-100 py-4">
                                <img class="hidden sm:block h-10 w-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=256&h=256&q=80"
                                    alt="Emma">
                                <div class="flex-1 space-y-1">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-medium">Emma</h3>
                                        <p class="text-sm text-gray-500">1h</p>
                                    </div>
                                    <p class="text-sm text-gray-500 line-clamp-2">Lorem ipsum dolor sit
                                        amet
                                        consectetur,
                                        adipisicing elit.
                                        Doloribus exercitationem libero aspernatur non. Quis, vitae iure
                                        quae
                                        reprehenderit
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="group cursor-pointer">
                            <div class="flex space-x-3 px-0 pr-1 sm:px-4 group-hover:bg-gray-100 py-4">
                                <img class="hidden sm:block h-10 w-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1545167622-3a6ac756afa4?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=256&h=256&q=80"
                                    alt="Bob">
                                <div class="flex-1 space-y-1">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-medium">Bob</h3>
                                        <p class="text-sm text-gray-500">1h</p>
                                    </div>
                                    <p class="text-sm text-gray-500 line-clamp-2">Lorem ipsum dolor sit
                                        amet
                                        consectetur,
                                        adipisicing elit.
                                        Doloribus exercitationem libero aspernatur non. Quis, vitae iure
                                        quae
                                        reprehenderit
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="group cursor-pointer">
                            <div class="flex space-x-3 px-0 pr-1 sm:px-4 group-hover:bg-gray-100 py-4">
                                <img class="hidden sm:block h-10 w-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1546820389-44d77e1f3b31?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=256&h=256&q=80"
                                    alt="andrew">
                                <div class="flex-1 space-y-1">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-medium">Andrew</h3>
                                        <p class="text-sm text-gray-500">1h</p>
                                    </div>
                                    <p class="text-sm text-gray-500 line-clamp-2">Lorem ipsum dolor sit
                                        amet
                                        consectetur,
                                        adipisicing elit.
                                        Doloribus exercitationem libero aspernatur non. Quis, vitae iure
                                        quae
                                        reprehenderit
                                    </p>
                                </div>
                            </div>
                        </li>

                        <!-- More items... -->
                    </ul>
                </div>
                <div class="col-span-2">
                    <!-- Chat buddy name -->
                    <div class="py-2 px-4 border-b border-gray-200 h-12 flex justify-between items-center">
                        <div class="flex items-center space-x-3">
                            <img class="h-8 w-8 rounded-full"
                                src="https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=256&h=256&q=80"
                                alt="">
                            <h3 class="text-xl font-medium text-gray-600 mr-20">John Doe</h3>
                        </div>
                        <button @click="openChatModal = false" class="p-1 hover:bg-gray-100 rounded-md"><svg
                                class="w-8 h-8" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5" d="M17.25 6.75L6.75 17.25" />
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5" d="M6.75 6.75L17.25 17.25" />
                            </svg><span class="sr-only">Close Modal</span>
                        </button>
                    </div>

                    <!-- Message Area -->
                    <div class="chat-bg max-h-[450px] overflow-auto flex-shrink">
                        <ul class="pl-1.5 pr-1 sm:px-4 py-2 w-full flex flex-col space-y-2 items-start">
                            <!-- Chat buddy -->
                            <li class="group cursor-pointer max-w-[95%] sm:max-w-[60%]">
                                <div class="flex-1 space-y-0.5 bg-gray-100 rounded-md shadow px-3 py-2">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-medium">John Doe</h3>
                                        <p class="text-sm text-gray-500">1h</p>
                                    </div>
                                    <p class="text-sm text-gray-700">Lorem ipsum dolor sit amet
                                        consectetur,
                                        adipisicing elit.
                                        Doloribus exercitationem libero aspernatur non.
                                    </p>
                                </div>
                            </li>

                            <!-- You -->
                            <li class="group cursor-pointer max-w-[95%] sm:max-w-[60%] self-end">
                                <div class="flex-1 space-y-0.5 bg-[#C7FCFF] rounded-md shadow px-3 py-2">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-medium">You</h3>
                                        <p class="text-sm text-gray-500">1h</p>
                                    </div>
                                    <p class="text-sm text-gray-700">Lorem ipsum dolor sit amet
                                        consectetur,
                                        adipisicing elit.
                                        Doloribus exercitationem libero aspernatur non.
                                    </p>
                                </div>
                            </li>

                            <!-- Chat buddy -->
                            <li class="group cursor-pointer max-w-[95%] sm:max-w-[60%]">
                                <div class="flex-1 space-y-0.5 bg-gray-100 rounded-md shadow px-3 py-2">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-medium">John Doe</h3>
                                        <p class="text-sm text-gray-500">1h</p>
                                    </div>
                                    <p class="text-sm text-gray-700">Lorem ipsum dolor sit amet
                                        consectetur,
                                        adipisicing elit.
                                        Doloribus exercitationem libero aspernatur non.
                                    </p>
                                </div>
                            </li>

                            <!-- You -->
                            <li class="group cursor-pointer max-w-[95%] sm:max-w-[60%] self-end">
                                <div class="flex-1 space-y-0.5 bg-[#C7FCFF] rounded-md shadow px-3 py-2">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-medium">You</h3>
                                        <p class="text-sm text-gray-500">1h</p>
                                    </div>
                                    <p class="text-sm text-gray-700">Lorem ipsum dolor sit amet
                                        consectetur,
                                        adipisicing elit.
                                    </p>
                                </div>
                            </li>

                            <!-- Chat buddy -->
                            <li class="group cursor-pointer max-w-[95%] sm:max-w-[60%]">
                                <div class="flex-1 space-y-0.5 bg-gray-100 rounded-md shadow px-3 py-2">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-medium">John Doe</h3>
                                        <p class="text-sm text-gray-500">1h</p>
                                    </div>
                                    <p class="text-sm text-gray-700">Lorem ipsum dolor sit amet
                                        consectetur,
                                        adipisicing elit.
                                        Doloribus exercitationem libero aspernatur non.
                                    </p>
                                </div>
                            </li>

                            <!-- You -->
                            <li class="group cursor-pointer max-w-[95%] sm:max-w-[60%] self-end">
                                <div class="flex-1 space-y-0.5 bg-[#C7FCFF] rounded-md shadow px-3 py-2">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-medium">You</h3>
                                        <p class="text-sm text-gray-500">1h</p>
                                    </div>
                                    <p class="text-sm text-gray-700">Lorem ipsum dolor sit amet
                                        consectetur,
                                        adipisicing elit.
                                        Doloribus exercitationem libero aspernatur non. Quis, vitae iure
                                        quae
                                        reprehenderit
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Chat input -->
                    <form id="chat-form" class="px-1.5 sm:px-4 py-2 border-t border-gray-200 bg-gray-200"
                        onsubmit="console.log('hit')">
                        <!-- image preview -->
                        <div
                            class="mb-1 overflow-hidden flex justify-center w-52 rounded-md shadow relative group cursor-pointer">
                            <img id="previewImage">
                            <div onclick="document.getElementById('imageFile').value = ''; document.getElementById('previewImage').src='';"
                                class="hidden absolute inset-0  items-center justify-center group-hover:flex bg-black bg-opacity-30 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg><span class="sr-only">Delete</span>
                            </div>
                        </div>
                        <div class="flex space-x-2">

                            <div class="flex-1">
                                <label for="message" class="sr-only">Message</label>
                                <div>
                                    <div id="message"
                                        class="px-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-[#00B4BF] focus:border-[#00B4BF] sm:text-sm"
                                        role="textbox" contenteditable style="resize: none;">
                                    </div>
                                </div>
                            </div>

                            <div class="flex space-x-1 items-end pb-0.5">
                                <!-- Upload File -->
                                <div>
                                    <label for="imageFile"
                                        class="text-gray-500 p-1.5 rounded-full bg-white border border-gray-300 shadow flex items-center justify-center cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                        </svg>
                                    </label>
                                    <input class="hidden" type="file" id="imageFile"
                                        onchange="document.getElementById('previewImage').src = window.URL.createObjectURL(this.files[0])">

                                </div>
                                <!-- Send Message -->
                                <button class="text-white p-1.5 rounded-full bg-[#00B4BF] border border-gray-300 shadow flex items-center
                                        justify-center"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 rotate-45" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                                    </svg>
                                    <span class="sr-only">Send</span>
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Chat Modal/ Dialog -->
