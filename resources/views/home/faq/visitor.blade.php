@extends('layouts.app-home')
@section('content')
@include('home.components.header')
@include('home.components.navigation')
<!-- Content -->
<section class="max-w-4xl mx-auto py-10 px-2 bg-white mb-10">
    <div class="text-[#00B4BF] uppercase text-xl font-bold text-center">FAQ</div>
    <h3 class="mt-2 text-4xl font-bold text-gray-700 text-center mb-6">Visitors
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
    question: "I want to attend HEF 2021. How can I register?",
    answer: [
    { text: "If you are interested in attending HEF 2021, please fill your details in the registration form here:" },
    { text: "Register as Visitor", link: "https://docs.google.com/forms/d/e/1FAIpQLSeawVl6UT0m2DwsYryRt1Yf-NSFhSnIR-gE6Baq58qJYSxc_Q/viewform" },
    { text: "For further information, you can contact us in +62 858 9377 7283 (Adrian)." }
    ]
    },
    {
    question: "Is there a participation fee for HEF 2021?",
    answer: [
    { text: "No, it’s completely free of charge to participate as visitors in our event! You can share this good news to your colleagues that might be interested in joining this event as well!" },
    ]
    },
    {
    question: "What can I expect from this event?",
    answer: [
    { text: "In HEF 2021, you’ll be able to: " },
    { text: "1. Watch seminars and participate in live Q&A sessions with the speakers" },
    { text: "2. View a wide range of products from 6 hospital engineering areas exhibitors and engage with company representatives" },
    { text: "3. Consult with consultants or companies for free" },
    ]
    },
    {
    question: "What’s the benefit of attending HEF 2021?",
    answer: [
    { text: "To see the benefits of attending HEF 2021, please visit the Why Attend? page under Visitor Menu or click the link below" }, {
    text: "Why Attend", link: "{{ route('visitor.why-attend') }}"
    }
    ]
    },
    {
    question: "Can I talk to people on the stand?",
    answer: [
    { text: "You can communicate with exhibitors in several ways. One way of communicating with the exhibitors is to message them via live chat and leave a question about their products or services and the stand representative will reply back as soon as possible. Alternatively, you can book a 1 on 1 meeting session with the exhibitors." }
    ]
    },
    {
    question: "How do I make an enquiry about a product I’ve seen?",
    answer: [
    { "text": "If you’re interested in the products of a company, you can book a 1 on 1 meeting session to enquire about the products and negotiate with the company representative." }
    ]
    },
    ];
</script>
@endsection
