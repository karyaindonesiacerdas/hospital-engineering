@extends('auth.auth-app')
@section('title', 'Register | Visitor')
@section('body')

<body class="min-h-screen h-full flex items-center min-w-screen bg-gradient-to-b from-[#1DBAC4] to-white">
    <div class="grid grid-cols-2 gap-6 max-w-7xl mx-auto py-4 md:py-10 2xl:py-20 ">
        <div class="hidden lg:block px-4 py-6">
            <div class="pl-16 flex items-center space-x-3">
                <img class="block h-14 w-14" src="{{ asset('assets/img/ptpi.png') }}" alt="Workflow">
                <div class="text-2xl font-bold text-[#063C40] uppercase">Hospital Engineering Forum 2021</div>
            </div>
            <div class="p-20">
                <h2 class="ml-2 mb-6 text-2xl font-bold text-[#063C40]">Highlight</h2>
                <ul class="space-y-6">
                    <li class="flex items-start space-x-3 text-[#063C40]">
                        <svg class="w-8 h-8" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75" />
                        </svg>
                        <span class="max-w-sm text-[#063C40] text-lg">More than 40 speakers from goverment, association,
                            hospital,
                            and industries</span>
                    </li>
                    <li class="flex items-start space-x-3 text-[#063C40]">
                        <svg class="w-8 h-8" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75" />
                        </svg>
                        <span class="max-w-sm text-[#063C40] text-lg">More than 100 local and international
                            exhibitors</span>
                    </li>
                    <li class="flex items-start space-x-3 text-[#063C40]">
                        <svg class="w-8 h-8" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75" />
                        </svg>
                        <span class="max-w-sm text-[#063C40] text-lg">More than 8000 PTPI registered members (healthcare
                            professionals)</span>
                    </li>
                    <li class="flex items-start space-x-3 text-[#063C40]">
                        <svg class="w-8 h-8" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M4.75 12C4.75 7.99594 7.99594 4.75 12 4.75V4.75C16.0041 4.75 19.25 7.99594 19.25 12V12C19.25 16.0041 16.0041 19.25 12 19.25V19.25C7.99594 19.25 4.75 16.0041 4.75 12V12Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M9.75 12.75L10.1837 13.6744C10.5275 14.407 11.5536 14.4492 11.9564 13.7473L14.25 9.75" />
                        </svg>
                        <span class="max-w-sm text-[#063C40] text-lg">Hospital engineering in covid-19 and industry 4.0
                            era</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-span-2 lg:col-span-1 px-4">
            <div class="bg-white py-8 px-6 shadow-lg rounded-lg sm:px-10">
                <div class="flex flex-col items-center space-y-0.5 mb-10">
                    <a href="#" class="mb-1 flex flex-col items-center space-y-1">
                        <img style="width:80px" class="object-contain w-12 h-12"
                            src="{{ asset('assets/img/ptpi.png') }}" alt="logo ptpi">
                        <span class="text-2xl font-bold text-[#00B4BF]">HEF 2021</span>
                    </a>
                    <h2 class="text-3xl text-gray-800 font-bold">Register as Visitor</h2>
                </div>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <input type="hidden" name="role" value="visitor">

                    <!-- 2 column grid for from input -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-6 mb-6">
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                Email address
                            </label>
                            <div class="mt-1">
                                <input required id="email" value="{{ old('email') }}" name="email" type="email"
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#00B4BF] focus:border-[#00B4BF] sm:text-sm is-invalid">
                                @error('email')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Mobile (Whatsapp) -->
                        <div>
                            <label for="mobile" class="block text-sm font-medium text-gray-700">
                                Mobile (WhatsApp)
                            </label>
                            <div class="mt-1">
                                <input required id="mobile" value="{{ old('mobile') }}" name="mobile"
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#00B4BF] focus:border-[#00B4BF] sm:text-sm">
                                @error('mobile')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Full Name (with title) -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                Full Name (with title)
                            </label>
                            <div class="mt-1">
                                <input required id="name" value="{{ old('name') }}" name="name"
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#00B4BF] focus:border-[#00B4BF] sm:text-sm">
                                @error('name')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Job Function -->
                        <div>
                            <label for="job_function" class="block text-sm font-medium text-gray-700">
                                Job Function
                            </label>
                            <div class="mt-1">
                                <select required id="job_function" value="{{ old('job_function') }}" name="job_function"
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#00B4BF] focus:border-[#00B4BF] sm:text-sm">
                                    <option value="">Pilih</option>
                                    <option {{ old('job_function') == 'Architect' ? 'selected' : null }}
                                        value="Architect">Architect</option>
                                    <option {{ old('job_function') == 'Director' ? 'selected' : null }}
                                        value="Director">Director</option>
                                    <option {{ old('job_function') == 'Doctor' ? 'selected' : null }} value="Doctor">
                                        Doctor</option>
                                    <option {{ old('job_function') == 'Engineer' ? 'selected' : null }}
                                        value="Engineer">Engineer</option>
                                    <option {{ old('job_function') == 'Lecturer' ? 'selected' : null }}
                                        value="Lecturer">Lecturer</option>
                                    <option {{ old('job_function') == 'Manager' ? 'selected' : null }} value="Manager">
                                        Manager</option>
                                    <option {{ old('job_function') == 'Nurse' ? 'selected' : null }} value="Nurse">Nurse
                                    </option>
                                    <option {{ old('job_function') == 'Pharmacist' ? 'selected' : null }}
                                        value="Pharmacist">Pharmacist</option>
                                    <option {{ old('job_function') == 'Programmer' ? 'selected' : null }}
                                        value="Programmer">Programmer</option>
                                    <option {{ old('job_function') == 'Technician' ? 'selected' : null }}
                                        value="Technician">Technician</option>
                                    <option {{ old('job_function') == 'Other' ? 'selected' : null }} value="Other">Other
                                    </option>
                                </select>
                                @error('job_function')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">
                                Password
                            </label>
                            <div class="mt-1">
                                <input required id="password" value="{{ old('password') }}" name="password"
                                    type="password"
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#00B4BF] focus:border-[#00B4BF] sm:text-sm">
                                @error('password')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                                Confirm Password
                            </label>
                            <div class="mt-1">
                                <input required id="password_confirmation" value="{{ old('password_confirmation') }}"
                                    name="password_confirmation" type="password"
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#00B4BF] focus:border-[#00B4BF] sm:text-sm">
                                @error('password_confirmation')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                        <!-- Institution Name -->
                        <div>
                            <label for="institution_name" class="block text-sm font-medium text-gray-700">
                                Institution Name
                            </label>
                            <div class="mt-1">
                                <input required id="institution_name" value="{{ old('institution_name') }}"
                                    name="institution_name"
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#00B4BF] focus:border-[#00B4BF] sm:text-sm">
                                @error('institution_name')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Type of Institution -->
                        <div>
                            <label for="institution_type" class="block text-sm font-medium text-gray-700">
                                Type of Institution
                            </label>
                            <div class="mt-1">
                                <select required id="institution_type" name="institution_type"
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#00B4BF] focus:border-[#00B4BF] sm:text-sm">
                                    <option value="">Pilih</option>
                                    <option value="Comunity Health Services"
                                        {{ old('institution_type') == 'Comunity Health Services' ? 'selected' : null }}>
                                        Comunity Health Services</option>
                                    <option value="Consultancy Services" {{ old('institution_type') == 'Consultancy
                                        Services' ? 'selected' : null }}>Consultancy
                                        Services</option>
                                    <option value="Contractor (Hospital)" {{ old('institution_type') == 'Contractor
                                        (Hospital)' ? 'selected' : null }}>Contractor
                                        (Hospital)</option>
                                    <option value="Dealers & Distributors" {{ old('institution_type') == 'Dealers &
                                        Distributors' ? 'selected' : null }}>Dealers &
                                        Distributors</option>
                                    <option value="Educational Institute (Medical)" {{ old('institution_type') == 'Educational
                                        Institute (Medical)' ? 'selected' : null }}>Educational
                                        Institute (Medical)
                                    </option>
                                    <option value="Educational Institute (Non-Medical)" {{ old('institution_type') == 'Educational
                                        Institute
                                        (Non-Medical)' ? 'selected' : null }}>Educational
                                        Institute
                                        (Non-Medical)</option>
                                    <option value="Government (Ministry of Health)" {{ old('institution_type') == 'Government
                                        (Ministry of Health)' ? 'selected' : null }}>Government
                                        (Ministry of Health)
                                    </option>
                                    <option value="Hospital (Private)" {{ old('institution_type') == 'Hospital
                                        (Private)' ? 'selected' : null }}>Hospital
                                        (Private)</option>
                                    <option value="Hospital (Public)"
                                        {{ old('institution_type') == 'Hospital (Public)' ? 'selected' : null }}>
                                        Hospital (Public)
                                    </option>
                                    <option value="Import & Export (Healthcare)" {{ old('institution_type') == 'Import & Export
                                        (Healthcare)' ? 'selected' : null }}>Import & Export
                                        (Healthcare)</option>
                                    <option value="Information Technology/ Software (Healthcare)"
                                        {{ old('institution_type') == 'Information Technology/ Software (Healthcare)' ? 'selected' : null }}>
                                        Information
                                        Technology/ Software
                                        (Healthcare)</option>
                                    <option value="Investor (Healthcare)"
                                        {{ old('institution_type') == 'Investor (Healthcare)' ? 'selected' : null }}>
                                        Investor (Healthcare)</option>
                                    <option value="Laboratories (Medical)"
                                        {{ old('institution_type') == 'Laboratories (Medical)' ? 'selected' : null }}>
                                        Laboratories (Medical)</option>
                                    <option value="Laboratory"
                                        {{ old('institution_type') == 'Laboratory' ? 'selected' : null }}>Laboratory
                                    </option>
                                    <option value="Manufacturer (Medical)"
                                        {{ old('institution_type') == 'Manufacturer (Medical)' ? 'selected' : null }}>
                                        Manufacturer (Medical)</option>
                                    <option value="Medical Practice"
                                        {{ old('institution_type') == 'Medical Practice' ? 'selected' : null }}>Medical
                                        Practice</option>
                                    <option value="Medical Travel"
                                        {{ old('institution_type') == 'Medical Travel' ? 'selected' : null }}>Medical
                                        Travel</option>
                                    <option value="Technology (Medical)"
                                        {{ old('institution_type') == 'Technology (Medical)' ? 'selected' : null }}>
                                        Technology (Medical)</option>
                                    <option value="Other" {{ old('institution_type') == 'Other' ? 'selected' : null }}>
                                        Other</option>
                                </select>
                                @error('institution_type')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Country -->
                        <div>
                            <label for="country" class="block text-sm font-medium text-gray-700">
                                Country
                            </label>
                            <div class="mt-1">
                                <select required id="country" value="{{ old('country') }}" name="country"
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#00B4BF] focus:border-[#00B4BF] sm:text-sm">
                                    <option value="">Pilih</option>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country['name'] }}"
                                        {{ old("country") == $country['name'] ? "selected": ""}}>
                                        {{ $country['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('country')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Province -->
                        <div>
                            <label for="province" class="block text-sm font-medium text-gray-700">
                                Province
                            </label>
                            <div class="mt-1">
                                <select required id="province" value="{{ old('province') }}" name="province"
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#00B4BF] focus:border-[#00B4BF] sm:text-sm">
                                    <option value="">Pilih</option>
                                    <option value="Non-Indonesian">Non-Indonesian</option>
                                    @foreach ($province as $item)
                                    <option value="{{ $item['nama'] }}"
                                        {{ old("province") == $item['nama'] ? "selected": ""}}>
                                        {{ $item['nama'] }}</option>
                                    @endforeach
                                </select>
                                @error('province')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Visitor Type -->
                        <div>
                            <label for="visitor_type" class="block text-sm font-medium text-gray-700">
                                Visitor Type
                            </label>
                            <div class="mt-1">
                                <select required id="visitor_type" value="{{ old('visitor_type') }}" name="visitor_type"
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#00B4BF] focus:border-[#00B4BF] sm:text-sm">
                                    <option value="">Pilih</option>
                                    <option value="Hospital Management Staff"
                                        {{ old('visitor_type') == 'Hospital Management Staff' ? 'selected' : null }}>
                                        Hospital Management Staff</option>
                                    <option value="Hospital Clinical Staff"
                                        {{ old('visitor_type') == 'Hospital Clinical Staff' ? 'selected' : null }}>
                                        Hospital Clinical Staff</option>
                                    <option value="Hospital Engineering Staff"
                                        {{ old('visitor_type') == 'Hospital Engineering Staff' ? 'selected' : null }}>
                                        Hospital Engineering Staff</option>
                                    <option value="Biomedical Engineering"
                                        {{ old('visitor_type') == 'Biomedical Engineering' ? 'selected' : null }}>
                                        Biomedical Engineering</option>
                                    <option value="Medical Doctor"
                                        {{ old('visitor_type') == 'Medical Doctor' ? 'selected' : null }}>Medical Doctor
                                    </option>
                                    <option value="Government Staff"
                                        {{ old('visitor_type') == 'Government Staff' ? 'selected' : null }}>Government
                                        Staff</option>
                                    <option value="University Lecturer"
                                        {{ old('visitor_type') == 'University Lecturer' ? 'selected' : null }}>
                                        University
                                        Lecturer</option>
                                </select>
                                @error('visitor_type')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                        <!-- Which product are you interested in? -->
                        <div class="md:col-span-2">
                            <label for="product_interest" class="block text-sm font-medium text-gray-700">
                                Which product are you interested in?
                            </label>
                            <div class="mt-1 grid grid-cols-3 gap-2 py-2">
                                <div class="flex items-center text-sm">
                                    <input type="checkbox" name="product_interest[]" value="Hospital Building"
                                        class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                    <span id="pricing-plans-0-label" class="text-gray-900 ml-3">Hospital Building</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <input type="checkbox" name="product_interest[]" value="Hospital Mechanic"
                                        class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                    <span id="pricing-plans-0-label" class="text-gray-900 ml-3">Hospital Mechanic</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <input type="checkbox" name="product_interest[]" value="Hospital Electric"
                                        class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                    <span id="pricing-plans-0-label" class="text-gray-900 ml-3">Hospital Electric</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <input type="checkbox" name="product_interest[]" value="Hospital Environment"
                                        class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                    <span id="pricing-plans-0-label" class="text-gray-900 ml-3">Hospital
                                        Environment</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <input type="checkbox" name="product_interest[]" value="Hospital Informatics"
                                        class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                    <span id="pricing-plans-0-label" class="text-gray-900 ml-3">Hospital
                                        Informatics</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <input type="checkbox" name="product_interest[]" value="Hospital Devices"
                                        class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                    <span id="pricing-plans-0-label" class="text-gray-900 ml-3">Hospital Devices</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <input type="checkbox" name="product_interest[]" value="COVID-19 Related Products"
                                        class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                    <span id="pricing-plans-0-label" class="text-gray-900 ml-3">COVID-19 Related
                                        Products</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <input type="checkbox" name="product_interest[]" value="Other"
                                        class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                    <span id="pricing-plans-0-label" class="text-gray-900 ml-3">Other</span>
                                </div>
                            </div>
                            @error('product_interest')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Purpose of Visiting -->
                        <div class="md:col-span-2">
                            <label for="visit_purpose" class="block text-sm font-medium text-gray-700">
                                Purpose of Visiting
                            </label>
                            <div class="mt-1 grid grid-cols-3 gap-2 py-2">
                                <div class="flex items-center text-sm">
                                    <input type="checkbox" name="visit_purpose[]" value="Buying"
                                        class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                    <span id="pricing-plans-0-label" class="text-gray-900 ml-3">Buying</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <input type="checkbox" name="visit_purpose[]" value="Networking"
                                        class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                    <span id="pricing-plans-0-label" class="text-gray-900 ml-3">Networking</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <input type="checkbox" name="visit_purpose[]" value="Information Gathering"
                                        class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                    <span id="pricing-plans-0-label" class="text-gray-900 ml-3">Information
                                        Gathering</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <input type="checkbox" name="visit_purpose[]" value="Join Webinar"
                                        class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                    <span id="pricing-plans-0-label" class="text-gray-900 ml-3">Join Webinar</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <input type="checkbox" name="visit_purpose[]" value="Consultaion"
                                        class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                    <span id="pricing-plans-0-label" class="text-gray-900 ml-3">Consultaion</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <input type="checkbox" name="visit_purpose[]" value="Other"
                                        class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                    <span id="pricing-plans-0-label" class="text-gray-900 ml-3">Other</span>
                                </div>
                            </div>
                            @error('visit_purpose')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Have registered in SEHAT-RI -->
                        <div>
                            <label for="member_sehat_ri" class="block text-sm font-medium text-gray-700">
                                Have you registered in SEHAT-RI?
                            </label>
                            <div class="mt-1 grid grid-cols-3 gap-2 py-2">
                                <div class="flex items-center text-sm">
                                    <input type="radio" name="member_sehat_ri" value="Yes"
                                        class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                    <span id="pricing-plans-0-label" class="text-gray-900 ml-3">Yes</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <input type="radio" name="member_sehat_ri" value="No"
                                        class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                    <span id="pricing-plans-0-label" class="text-gray-900 ml-3">No</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <input type="radio" name="member_sehat_ri" value="I Forget"
                                        class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                    <span id="pricing-plans-0-label" class="text-gray-900 ml-3">I Forget</span>
                                </div>
                            </div>
                            @error('member_sehat_ri')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="md:col-span-2">
                            <div class="mb-1 text-sm text-gray-700">By registering for HEF 2021, you will automatically
                                become a
                                sehat-RI member and we will send you a
                                referal code to your
                                email later. This referal code is used to utilize the sehat-RI application.</div>
                            <div class="flex items-center space-x-1">
                                <input type="checkbox" required
                                    class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                <span class="text-sm text-gray-700">I
                                    understand
                                    and accept the condition</span>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <div class="mb-1 text-sm text-gray-700">In order to qualify for HEF 2021 door prize, Do you
                                agree to share
                                these information to our exhibitors for marketing purpose?</div>
                            <div class="flex items-center space-x-4">
                                <div>
                                    <input id="yes" name="allow_share_info" type="radio" value="true"
                                        class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]" checked>
                                    <label for="yes" class="text-sm text-gray-700">Yes</label>
                                </div>
                                <div>
                                    <input id="no" name="allow_share_info" type="radio" value="false"
                                        class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]"> <label
                                        for="no" class="text-sm text-gray-700">No</label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm font-medium text-white transition-all bg-[#00B4BF] hover:bg-[#063C40] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#00B4BF]">
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
                            <a href="{{ route('register.exhibitor') }}"
                                class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span>Register as Exhibitor</span>
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
    </div>
</body>

@endsection
