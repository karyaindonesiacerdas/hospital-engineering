@extends('layouts.app-home')
@section('content')
@include('home.components.header')
@include('home.components.navigation')
<!-- Content -->
<section class="max-w-7xl mx-auto py-10 px-2 bg-white mb-10">
    <div class="mt-4 text-[#00B4BF] uppercase text-xl font-bold text-center lg:text-left">Guideline</div>
    <h3 class="mt-2 mb-10 text-4xl font-bold text-gray-700 text-center lg:text-left">Exhibitor Guideline
    </h3>
    <div class="grid lg:grid-cols-2 gap-10 lg:gap-14">
        <div class="space-y-2 shadow-xl p-4 rounded-xl">
            <div class="mb-4">
                <img src="{{ asset('assets/img/exhibitor-guideline-1.png') }}" alt="Guideline 1">
            </div>
            <div class="mb-4">
                <img src="{{ asset('assets/img/exhibitor-guideline-2.png') }}" alt="Guideline 2">
            </div>
            <div class="mb-4">
                <img src="{{ asset('assets/img/exhibitor-guideline-3.png') }}" alt="Guideline 3">
            </div>
        </div>

        <ol
            class="max-w-5xl mx-auto leading-relaxed lg:text-lg lg:leading-relaxed text-gray-700 list-decimal space-y-4 pl-6">
            <li>
                Go to the exhibitor’s registration page at <a href="register-exhibitor.html"
                    class="text-[#00B4BF] hover:text-[#116368]">https://docs.google.com/forms/d/e/1FAIpQLSeawVl6UT0m2DwsYryRt1Yf-NSFhSnIR-gE6Baq58qJYSxc_Q/viewform</a>
            <li>
                Enter your company’s representative information
            </li>
            <li>
                Enter an active email address. We will send information and notifications to your email.
            </li>
            <li>
                Enter a phone number that’s connected to WhatsApp
            </li>
            <li>
                Enter the representative full name and title.
            </li>
            <li>
                Select the representative job function. If you did not found a suitable one, you can select ‘Other’
            </li>
            <li>
                Enter a password and retype your password in “Confirm Password”
            </li>
            <li>
                Enter your company information
            </li>
            <li>
                Enter your company/ institution Name
            </li>
            <li>
                Enter your company’s website. If your company didn’t have a website, you can enter dash (-)
            </li>
            <li>
                Choose your company’s country of origin
            </li>
            <li>
                If you choose Indonesia, please select the province of your company
            </li>
            <li>
                Tick the field(s) that best describes your company
            </li>
            <li>
                Once you have finished filling in the registration form, click "Register". You'll be registered in our
                system.
                Next, you
                can choose your desired package. Further guidelines will be informed later.
            </li>
        </ol>
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
</script>
@endsection
