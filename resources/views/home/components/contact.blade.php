<!-- Contact -->
<section class="bg-[#25243A]">
    <div class="max-w-7xl mx-auto pt-6 md:pt-20 md:pb-28 px-2 grid md:grid-cols-2 gap-6 items-center overflow-hidden">
        <div>
            <div class="text-[#00B4BF] uppercase font-medium text-lg tracking-widest">@lang('messages.CONTACT')</div>
            <h3 class="mt-2 text-3xl font-bold text-white">@lang('messages.CONTACT_US')</h3>
            <div class="mt-10 flex flex-col space-y-8">
                <div class="flex space-x-3 items-start">
                    <div class="border border-gray-600 rounded-full w-10 h-10 flex items-center justify-center">
                        <img class="w-4" src="{{ asset('assets/icons/address.svg') }}" alt="Address">
                    </div>
                    <span class="flex-1 max-w-[350px] text-sm md:text-md text-white mt-0.5">
                        @lang('messages.ADDRESS_US')
                    </span>
                </div>

                <div class="flex space-x-3 items-start">
                    <div class="border border-gray-600 rounded-full w-10 h-10 flex items-center justify-center">
                        <img class="w-4" src="{{ asset('assets/icons/phone.svg') }}" alt="Phone">
                    </div>
                    <div class="flex-1 max-w-[350px] text-sm md:text-md text-white mt-0.5 flex flex-col space-y-2">
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

                <img class="w-full h-full object-cover" src="{{ asset('assets/img/google-map.png') }}" alt="Google map">
            </div>
        </div>
    </div>
</section>
