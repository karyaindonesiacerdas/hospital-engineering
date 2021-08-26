@extends('auth.auth-app')
@section('title', 'Register | Exhibitor')
@section('body')

<body class="min-h-screen min-w-screen bg-gradient-to-br from-blue-600 to-purple-600">
    <div class="sm:mx-auto sm:w-full sm:max-w-4xl py-4 md:py-10 2xl:py-20 px-4">
        <div class="bg-white py-8 px-6 shadow-lg rounded-lg sm:px-10">
            <div class="flex flex-col items-center space-y-0.5 mb-8">
                <h2 class="text-4xl font-bold">Register</h2>
                <div class="text-gray-500">
                    as
                </div>
                <div class="text-xl font-extrabold text-indigo-600 uppercase tracking-wide">Exhibitor</div>
            </div>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <input type="hidden" name="role" id="exhibitor" value="exhibitor">
                <!-- 2 column grid for from input -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8 mb-6">
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email address
                        </label>
                        <div class="mt-1">
                            <input required id="email" name="email" type="email"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Password
                        </label>
                        <div class="mt-1">
                            <input required id="password" name="password" type="password"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <!-- Mobile (Whatsapp) -->
                    <div>
                        <label for="phone_number" class="block text-sm font-medium text-gray-700">
                            Mobile (WhatsApp)
                        </label>
                        <div class="mt-1">
                            <input required id="phone_number" name="phone_number"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <!-- Full Name (with title) -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Full Name (with title)
                        </label>
                        <div class="mt-1">
                            <input required id="name" name="name"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <!-- Job Function -->
                    <div>
                        <label for="job_function" class="block text-sm font-medium text-gray-700">
                            Job Function
                        </label>
                        <div class="mt-1">
                            <select required id="job_function" name="job_function"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Pilih</option>
                                <option value="Director">Director</option>
                                <option value="Architect">Architect</option>
                                <option value="Doctor">Doctor</option>
                            </select>
                        </div>
                    </div>

                    <!-- Company Name -->
                    <div>
                        <label for="company_name" class="block text-sm font-medium text-gray-700">
                            Company Name
                        </label>
                        <div class="mt-1">
                            <input required id="company_name" name="company_name"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <!-- Company Website -->
                    <div>
                        <label for="company_web" class="block text-sm font-medium text-gray-700">
                            Company Website
                        </label>
                        <div class="mt-1">
                            <input required id="company_web" name="company_web"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <!-- Country -->
                    <div>
                        <label for="country" class="block text-sm font-medium text-gray-700">
                            Country
                        </label>
                        <div class="mt-1">
                            <select required id="country" name="country"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Pilih</option>
                                @foreach ($countries as $country)
                                <option value="{{ $country['name'] }}">{{ $country['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Province -->
                    <div>
                        <label for="province" class="block text-sm font-medium text-gray-700">
                            Province
                        </label>
                        <div class="mt-1">
                            <select required id="province" name="province"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Pilih</option>
                                @foreach ($province as $item)
                                <option value="{{ $item['nama'] }}">{{ $item['nama'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Nature of Business -->
                    <div>
                        <label for="business_type" class="block text-sm font-medium text-gray-700">
                            Nature of Business
                        </label>
                        <div class="mt-1">
                            <select required id="business_type" name="business_type[]" multiple
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Pilih</option>
                                <option value="Hospital Building">Hospital Building</option>
                                <option value="Hospital Mechanic">Hospital Mechanic</option>
                                <option value="Hospital Electric">Hospital Electric</option>
                            </select>
                        </div>
                    </div>

                    <!-- Business Sector -->
                    <div>
                        <label for="business_sector" class="block text-sm font-medium text-gray-700">
                            What sectors best describes your products or services?
                        </label>
                        <div class="mt-1">
                            <select required id="business_sector" name="business_sector[]" multiple
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Pilih</option>
                                <option value="AC">AC</option>
                                <option value="Architecture">Architecture</option>
                                <option value="Artificial Intelligence">Artificial Intelligence</option>
                            </select>
                        </div>
                    </div>

                    <!-- Space in Website -->
                    <div>
                        <label for="web_ads_type" class="block text-sm font-medium text-gray-700">
                            Please reserve space for us in Website
                        </label>
                        <div class="mt-1">
                            <select required id="web_ads_type" name="web_ads_type[]" multiple
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Pilih</option>
                                <option value="Logo">Logo</option>
                                <option value="Running Text">Running Text</option>
                                <option value="News">News</option>
                                <option value="Video Advertisement">Video Advertisement</option>
                            </select>
                        </div>
                    </div>

                    <!-- Space in Mobile Apps -->
                    <div>
                        <label for="mobile_ads_type" class="block text-sm font-medium text-gray-700">
                            Please reserve space for us in Mobile
                        </label>
                        <div class="mt-1">
                            <select required id="mobile_ads_type" name="mobile_ads_type[]" multiple
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Pilih</option>
                                <option value="Logo">Logo</option>
                                <option value="Running Text">Running Text</option>
                                <option value="News">News</option>
                            </select>
                        </div>
                    </div>

                    <!-- Space in Opening -->
                    <div>
                        <label for="opening_ads_type" class="block text-sm font-medium text-gray-700">
                            Please reserve space for us in Opening
                        </label>
                        <div class="mt-1">
                            <select required id="opening_ads_type" name="opening_ads_type[]" multiple
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Pilih</option>
                                <option value="Logo at Poster">Logo at Poster</option>
                                <option value="Logo at Zoom Background">Logo at Zoom Background</option>
                                <option value="Ad Libs at Opening by MC">Ad Libs at Opening by MC</option>
                                <option value="Advertisement for 1 Minuters">Advertisement for 1 Minuters</option>
                            </select>
                        </div>
                    </div>

                    <!-- Space in Serial Seminar -->
                    <div>
                        <label for="seminar_ads_type" class="block text-sm font-medium text-gray-700">
                            Please reserve space for us in Serial Seminar
                        </label>
                        <div class="mt-1">
                            <select required id="seminar_ads_type" name="seminar_ads_type[]" multiple
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Pilih</option>
                                <option value="Logo at Poster">Logo at Poster</option>
                                <option value="Logo at Zoom Background">Logo at Zoom Background</option>
                                <option value="Ad Libs by Moderator">Ad Libs by Moderator</option>
                                <option value="Advertisement for 1 Minuters">Advertisement for 1 Minuters</option>
                                <option value="Presentation for 15 Minutes">Presentation for 15 Minutes</option>
                            </select>
                        </div>
                    </div>

                    <!-- Space in Product Exhibition -->
                    <div>
                        <label for="prouduct_exhibition_ads_type" class="block text-sm font-medium text-gray-700">
                            Please reserve space for us in Product Exhibition
                        </label>
                        <div class="mt-1">
                            <select required id="prouduct_exhibition_ads_type" name="prouduct_exhibition_ads_type[]"
                                multiple
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Pilih</option>
                                <option value="Basic (Website)">Basic (Website)</option>
                                <option value="Mobile Apps">Mobile Apps</option>
                                <option value="Poster">Poster</option>
                                <option value="Product Catalog">Product Catalog</option>
                            </select>
                        </div>
                    </div>

                    <!-- Space in Consultancy -->
                    <div>
                        <label for="consultancy_ads_type" class="block text-sm font-medium text-gray-700">
                            Please reserve space for us in Consultancy
                        </label>
                        <div class="mt-1">
                            <select required id="consultancy_ads_type" name="consultancy_ads_type[]" multiple
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Pilih</option>
                                <option value="Basic (Web Appointment and Zoom)">Basic (Web Appointment and Zoom)
                                </option>
                                <option value="Mobile Apps">Mobile Apps</option>
                                <option value="Poster">Poster</option>
                                <option value="Product Catalog">Product Catalog</option>
                            </select>
                        </div>
                    </div>

                    <!-- Space in Closing Ceremony -->
                    <div>
                        <label for="closing_ads_type" class="block text-sm font-medium text-gray-700">
                            Please reserve space for us in Closing Ceremony
                        </label>
                        <div class="mt-1">
                            <select required id="closing_ads_type" name="closing_ads_type[]" multiple
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Pilih</option>
                                <option value="Logo at Poster">Logo at Poster</option>
                                <option value="Logo at Zoom Background">Logo at Zoom Background</option>
                                <option value="Ad Libs by Moderator">Ad Libs by Moderator</option>
                                <option value="Advertisement for 1 Minuters">Advertisement for 1 Minuters</option>
                            </select>
                        </div>
                    </div>

                    <!-- Space in Addition Remarks -->
                    <div class="md:col-span-2">
                        <label for="additional_remaks" class="block text-sm font-medium text-gray-700">
                            Addition Remarks
                        </label>
                        <div class="mt-1">
                            <textarea rows="2" id="additional_remaks" name="additional_remaks" multiple
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                        </div>
                    </div>
                </div>


                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-br from-blue-600 to-purple-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Register
                    </button>
                </div>
            </form>

            <!-- Or -->
            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">
                            Or
                        </span>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-2 gap-3">
                    <div>
                        <a href="{{ route('register.visitor', ['id'=>1]) }}"
                            class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span>Register as Visitor</span>
                        </a>
                    </div>

                    <div>
                        <a href="{{ route('login') }}"
                            class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span>Login</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
@endsection
