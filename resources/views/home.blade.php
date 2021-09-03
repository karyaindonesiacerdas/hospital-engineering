@extends('layouts.app-home')
@section('content')
@include('home.components.header-landing')
@include('home.components.slider-banner')
@include('home.components.count-down')
@include('home.components.blog')
@endsection
@section('script')
<script>
    const swiper = new Swiper('.swiper', {
      // Optional parameters
      direction: 'horizontal',
      loop: true,
      autoplay:
      {
        delay: 4000,
      },
      speed: 1000,

      // If we need pagination
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },

      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

      // And if we need scrollbar
      scrollbar: {
        el: '.swiper-scrollbar',
      },
    });

    // ======== Sticky Navigation =========
    const navigation = document.getElementById('navigation');
    const header = document.getElementById('header');

    window.addEventListener('scroll', (e) => {
      if (window.scrollY > 150) {
        navigation.classList.remove('absolute');
        navigation.classList.add('fixed')
        navigation.classList.add('overlay-nav')
      } else {
        navigation.classList.remove('fixed');
        navigation.classList.remove('overlay-nav')
        navigation.classList.add('absolute')
      }
    })


    // ========== Countdown ===========
    const countDate = new Date('Oct 2, 2021 00:00:00').getTime();

    function countDown() {
      const now = new Date().getTime();
      const gap = countDate - now;

      const second = 1000;
      const minute = second * 60;
      const hour = minute * 60
      const day = hour * 24

      const d = Math.floor(gap / day);
      const h = Math.floor((gap % day) / hour);
      const m = Math.floor((gap % hour) / minute);
      const s = Math.floor((gap % minute) / second);

      document.getElementById('day').innerHTML = d;
      document.getElementById('hour').innerHTML = h;
      document.getElementById('minute').innerHTML = m;
      document.getElementById('second').innerHTML = s;
    }

    setInterval(() => {
      countDown()
    }, 1000);

</script>
@endsection
