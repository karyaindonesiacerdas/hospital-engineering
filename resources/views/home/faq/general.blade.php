@extends('layouts.app-home')
@section('content')
@include('home.components.header')
@include('home.components.navigation')
<!-- Content -->
<section class="max-w-4xl mx-auto py-10 px-2 bg-white mb-10">
    <div class="text-[#00B4BF] uppercase text-xl font-bold text-center">FAQ</div>
    <h3 class="mt-2 text-4xl font-bold text-gray-700 text-center mb-6">General and Technical
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
            question: "What is the Hospital Engineering Forum? ",
            answer: [
              { text: "The Hospital Engineering Forum will be the first virtual national forum and international fair by the Indonesian Association of Hospital Engineering (IAHE). This forum focuses on 6 hospital engineering areas: Hospital Building, Hospital Mechanic, Hospital Electric, Hospital Environment, Hospital Informatics, and Hospital Devices. More than 40 speakers from government, association, hospital and industries are invited. We also provide around 100 local and international exhibitors. This event will be co-organised with Karya Indonesia Cerdas" }
            ]
          },
          {
            question: "Who is participating at Hospital Engineering Forum 2021?",
            answer: [
              { text: "The event is open to the public. However, we will invite around 8000 members of IAHE and 3000 hospitals which will consist of people from the healthcare settings such as hospital management staff, hospital clinical staff, hospital engineering staff, biomedical engineer, medical doctor, government staff and university lecturers." }
            ]
          },
          {
            question: "Who is the organizer of this event?",
            answer: [
              { text: "The organizer of this event is the Indonesian Association of Hospital Engineering (IAHE) in partnership with PT. Karya Indonesia Cerdas (KIC). " },
              { text: "The Indonesian Hospital Engineering Association (IAHE) is a professional organization of technical experts and corporations engaged in the construction, operation, and maintenance of hospitals in Indonesia. The association was established on October 3, 2019 in Jakarta, and was ratified by the Ministry of Law and Human Rights with the number AHU-0011147.AH.01.07. The organization vision is to become the leading organization that encourages the realization of hospitals in Indonesia that are Safe, environMentally friendly, Affordable, secuRe, and worThwhile (SMART)." }
              ,
              { text: "PT. Karya Indonesia Cerdas is a partner company of IAHE since 2019 and has been collaborating with IAHE in organizing several seminars and workshops over the past year with a total of around 9000 participants ranging from medical, engineering and management staff of the hospitals." }
            ]
          },
          {
            question: "How do I login to my profile?",
            answer: [
              { text: "Once you have registered on our website, you can immediately login with your email and password that you input during the registration process here:" }
              , { text: "https://hospital-engineering-expo.com/login", link: "login.html" }
            ]
          },
          {
            question: "Who should I contact if I have any additional questions?",
            answer: [
              { "text": "If you have any further questions, we will be happy to assist you through our email at hospital.engineering.expo@gmail.com or you could visit the contact us page to get other means of contact details." }
            ]
          },
        ];

</script>
@endsection
