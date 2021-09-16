<!-- Script -->
<script src="https://cdn.plyr.io/3.6.8/plyr.js"></script>
<script>
    const player = new Plyr('#player');
</script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper', {
      // Optional parameters
      direction: 'horizontal',
      loop: true,
      autoplay:
      {
        delay: 8000,
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
</script>

<script>
    let filterExhibitorCategories = function () {
      const filters = [
        {
          id: 'hospital-buildings',
          name: "Hopital Buildings"
        },
        {
          id: 'hospital-mechanics',
          name: "Hopital Mechanics"
        },
        {
          id: 'hospital-electric',
          name: "Hopital Electric"
        },
        {
          id: 'hospital-environtment',
          name: "Hopital Environtment"
        },
        {
          id: 'hospital-informatics',
          name: "Hopital Informatics"
        },
        {
          id: 'hospital-devices',
          name: "Hopital Devices"
        },
        {
          id: "covid-19-products",
          name: "Covid-19 Products"
        },
      ]

      const allFilter = filters.map(filter => filter.id).sort().join(',');

      const getFilter = () => {
        return new URLSearchParams(location.search)?.get('filter')?.split(',')?.sort()?.join(',') || '';
      }

      return {
        selectAll: allFilter === getFilter(),
        handleSelectAll() {
          const self = this;
          const params = new URLSearchParams(location.search);
          if (self.selectAll) {
            params.set('filter', allFilter);
          } else {
            params.delete('filter');
          }
          window.location.search = params.toString()
        },
        filtersSelected: new URLSearchParams(location.search).get('filter')?.split(',') || [],
        filters,
        handleChange() {
          const self = this;
          const params = new URLSearchParams(location.search)
          if (getFilter() === allFilter) {
            params.set('filter', allFilter);
          }
          if (self.filtersSelected.length) {
            params.set('filter', self.filtersSelected.join(','));
          } else {
            params.delete('filter');
          }
          window.location.search = params.toString()
        }
      }
    }
</script>

<script>
    const posters = [
      "{{ asset('assets/img/brosur1.jpg') }}",
      "{{ asset('assets/img/brosur2.jpg') }}",
      "{{ asset('assets/img/brosur3.jpg') }}",
      "{{ asset('assets/img/brosur4.jpg') }}",
      "{{ asset('assets/img/brosur5.jpg') }}",
    ];

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
