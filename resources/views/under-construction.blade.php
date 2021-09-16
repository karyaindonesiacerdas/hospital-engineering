<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
        <title>Under Construction</title>
    </head>

    <body class="py-2 px-4 md:px-2">
        <header class="py-2 flex items-center justify-center space-x-2 sm:space-x-3">
            <img class="w-8 h-8 sm:w-10 sm:h-10" src="{{ asset('assets/img/ptpi.png') }}" alt="Logo PTPI">
            <div class="text-sm sm:text-lg xl:text-2xl uppercase font-bold text-gray-800 tracking-wider">Hospital
                Engineering Forum 2021
            </div>
        </header>
        <main>
            <div class="mt-10 mb-2">
                <h2 class="text-center text-[#1DBAC4] uppercase text-3xl font-bold animate-pulse">Coming Soon</h2>
                <h3 class="text-center text-gray-600 text-lg">Our website is under construction</h3>
            </div>
            <div class="flex justify-center py-6 mb-8">
                <img class="max-w-sm" src="{{ asset('assets/svg/under-construction.svg') }}" alt="Under Construction">
            </div>

            <div class="flex justify-center">
                <a href="index.html"
                    class="py-1.5 px-4 bg-[#1DBAC4] text-white text-sm font-semibold shadow hover:bg-opacity-80 rounded-md transition">Back
                    to Home</a>
            </div>

        </main>
        <footer class="mt-12">
            <p class="text-gray-400 text-sm text-center">Copyright &copy; Hospital
                Engineering Expo
                2021</p>
        </footer>
    </body>

</html>
