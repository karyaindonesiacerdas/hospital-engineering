@extends('layouts.app-home')
@section('content')
@include('home.components.header')
@include('home.components.navigation')
<!-- Content -->
<section class="max-w-4xl mx-auto py-10 px-2 bg-white mb-10">
    <div class="text-[#00B4BF] uppercase text-xl font-bold text-center">FAQ</div>
    <h3 class="mt-2 text-4xl font-bold text-gray-700 text-center mb-6">Exhibitors and Sponsors
    </h3>

    <!-- Question -->
    <div class="my-10 space-y-4 lg:space-y-6" x-data="{ faq, faq_selected: null }">

        <template x-for="(item, index) in faq" :key="`item-${index}`">

            <div class="item bg-white hover:bg-gray-50 border-b border-gray-200 rounded-md p-3">
                <div class="flex items-center cursor-pointer"
                    @click="faq_selected !== index ? faq_selected = index : faq_selected = null">
                    <div
                        class="text-gray-700 w-8 h-8 md:w-10 md:h-10 rounded-md flex items-center justify-center font-medium text-lg font-display">
                        <span x-text="index + 1"></span>
                    </div>
                    <div class="ml-3 md:ml-4 lg:ml-6 md:text-lg text-gray-700">
                        <span x-text="item.question"></span>
                    </div>
                </div>
                <div class="relative overflow-hidden transition-all max-h-0 duration-500"
                    x-bind:style="faq_selected === index ? `max-height:  ${ $el.scrollHeight }px` : ``">
                    <div class="text-gray-700 ml-8 md:ml-10 pl-3 md:pl-4 lg:pl-6 py-2 space-y-3">

                        <template x-for="(ans, index) in item.answer" :key="`item-ans-${index}`">
                            <div>
                                <p x-show="!ans.link" x-text="ans.text"></p>
                                <a class="text-[#00B4BF] underline hover:text-[#116368] " x-show="ans.link"
                                    x-bind:href="ans.link" x-text="ans.text"></a>
                            </div>
                        </template>

                    </div>
                </div>
            </div>

        </template>

    </div>
</section>
@endsection
@section('script')
<script>
    // ======== Sticky Navigation =========
    window.addEventListener('scroll', (e) => {
        if (window.scrollY > 150) {
            navigation.classList.remove('static');
            navigation.classList.add('fixed')
            navigation.classList.add('overlay-nav')
        } else {
            navigation.classList.remove('fixed');
            navigation.classList.remove('overlay-nav')
            navigation.classList.add('static')
        }
    });
    // FAQ
    const faq = [
    {
        question: "I’m interested in sponsoring this event, who should I contact?",
        answer: [
        { text: "If you’re interested in sponsoring this event and would like to contact the person in charge, please contact our email at hospital.engineering.expo@gmail.com or whatsApp us in +62 858 9377 7283 (Adrian). We will get back to you as soon as possible." }
        ]
    },
    {
        question: "What’s the benefit of becoming HEF 2021 sponsors?",
        answer: [
        { text: "To see the list of benefits you can get as a sponsor of our event, please view the Packages page under the Exhibitor menu or click the link below" }, {
            text: "Packages", link: "packages.html"
        }
        ]
    },
    {
        question: "How do I register my company as one of the exhibitors?",
        answer: [
        { text: "If you want to register as an exhibitor, please go to the Register as Exhibitor page under the registration menu or click the link below" }, {
            text: "Register as Exhibitor", link: "register-exhibitor.html"
        }
        ]
    },
    {
        question: "Is there a pricing list for the exhibition stand?",
        answer: [
        { text: "If you’re interested in opening an exhibition stand and would like to know the pricing list, you can contact our email at hospital.engineering.expo@gmail.com or whatsApp us in +62 858 9377 7283 (Adrian) or visit the contact us page. We will get back to you as soon as possible." }
        ]
    },
    {
        question: "What’s the benefit of exhibiting at HEF 2021?",
        answer: [
        { "text": "To see the list of benefits you can get as an exhibitor, please visit Why Exhibit? page and Packages page under the Exhibitor menu or click the link below" }, {
            text: "Why Exhibit", link: "why-exhibit.html"
        }
        ]
    },
    ];
</script>
@endsection
