@extends('auth.auth-app')
@section('title', 'Register | Exhibitor')
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
                <div class="flex flex-col items-center space-y-0.5 mb-8">
                    <img style="width:80px" class="object-contain w-10 h-10" src="{{ asset('assets/img/ptpi.png') }}"
                        alt="logo ptpi">
                    <a href="#" class="text-2xl font-bold text-[#00B4BF]">HEF 2021</a>
                    <h2 class="text-3xl font-bold">Register as Exhibitor</h2>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <input type="hidden" name="role" value="exhibitor">
                    <div class="mb-6">
                        <!-- Account Information -->
                        <div>
                            <div class="relative my-4">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-300"></div>
                                </div>
                                <div class="relative flex justify-center text-sm">
                                    <span class="px-2 bg-white text-gray-500">
                                        Account Information
                                    </span>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-6">
                                <!-- Email -->
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">
                                        Email address
                                    </label>
                                    <div class="mt-1">
                                        <input required id="email"  value="{{ old('email') }}" name="email" type="email"
                                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-[#00B4BF] focus:border-[#00B4BF] sm:text-sm">
                                            <!-- Error Text -->
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
                                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-[#00B4BF] focus:border-[#00B4BF] sm:text-sm">
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
                                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-[#00B4BF] focus:border-[#00B4BF] sm:text-sm">
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
                                            <option {{ old('job_function') == 'Architect' ? 'selected' : null }} value="Architect">Architect</option>
                                            <option {{ old('job_function') == 'Director' ? 'selected' : null }} value="Director">Director</option>
                                            <option {{ old('job_function') == 'Doctor' ? 'selected' : null }} value="Doctor">
                                                Doctor</option>
                                            <option {{ old('job_function') == 'Engineer' ? 'selected' : null }} value="Engineer">Engineer</option>
                                            <option {{ old('job_function') == 'Lecturer' ? 'selected' : null }} value="Lecturer">Lecturer</option>
                                            <option {{ old('job_function') == 'Manager' ? 'selected' : null }} value="Manager">
                                                Manager</option>
                                            <option {{ old('job_function') == 'Nurse' ? 'selected' : null }} value="Nurse">Nurse
                                            </option>
                                            <option {{ old('job_function') == 'Pharmacist' ? 'selected' : null }} value="Pharmacist">Pharmacist</option>
                                            <option {{ old('job_function') == 'Programmer' ? 'selected' : null }} value="Programmer">Programmer</option>
                                            <option {{ old('job_function') == 'Technician' ? 'selected' : null }} value="Technician">Technician</option>
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
                                        <input required id="password" value="{{ old('password') }}" name="password" type="password"
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
                            </div>


                        </div>

                        <!-- Company Information -->
                        <div>
                            <div class="relative mb-4 mt-8">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-300"></div>
                                </div>
                                <div class="relative flex justify-center text-sm">
                                    <span class="px-2 bg-white text-gray-500">
                                        Company Information
                                    </span>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-6">
                                <!-- Company Name -->
                                <div>
                                    <label for="company_name" class="block text-sm font-medium text-gray-700">
                                        Company Name
                                    </label>
                                    <div class="mt-1">
                                        <input required id="company_name" value="{{ old('company_name') }}" name="company_name"
                                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-[#00B4BF] focus:border-[#00B4BF] sm:text-sm">
                                            @error('company_name')
                                            <span class="text-sm text-red-500">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>

                                <!-- Company Website -->
                                <div>
                                    <label for="company_website" class="block text-sm font-medium text-gray-700">
                                        Company Website
                                    </label>
                                    <div class="mt-1">
                                        <input required id="company_website" value="{{ old('company_website') }}" name="company_website"
                                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-[#00B4BF] focus:border-[#00B4BF] sm:text-sm">
                                            @error('company_website')
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
                                            <option value="{{ $country['name'] }}" {{ old("country") == $country['name'] ? "selected": ""}}>
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
                                            <option value="{{ $item['nama'] }}" {{ old("province") == $item['nama'] ? "selected": ""}}>
                                                {{ $item['nama'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('province')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Nature of Business -->
                                <div class="md:col-span-2">
                                    <label for="business_nature" class="block text-sm font-medium text-gray-700">
                                        Nature of Business
                                    </label>
                                    <div class="mt-1 grid grid-cols-3 gap-2 py-2">
                                        <div class="flex items-center text-sm">
                                            <input type="checkbox" name="business_nature[]" value="Hospital Building"
                                                class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                            <span id="pricing-plans-0-label" class="text-gray-900 ml-3">Hospital
                                                Building</span>
                                        </div>
                                        <div class="flex items-center text-sm">
                                            <input type="checkbox" name="business_nature[]" value="Hospital Mechanic"
                                                class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                            <span id="pricing-plans-0-label" class="text-gray-900 ml-3">Hospital
                                                Mechanic</span>
                                        </div>
                                        <div class="flex items-center text-sm">
                                            <input type="checkbox" name="business_nature[]" value="Hospital Electric"
                                                class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                            <span id="pricing-plans-0-label" class="text-gray-900 ml-3">Hospital
                                                Electric</span>
                                        </div>
                                        <div class="flex items-center text-sm">
                                            <input type="checkbox" name="business_nature[]" value="Hospital Environment"
                                                class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                            <span id="pricing-plans-0-label" class="text-gray-900 ml-3">Hospital
                                                Environment</span>
                                        </div>
                                        <div class="flex items-center text-sm">
                                            <input type="checkbox" name="business_nature[]" value="Hospital Informatics"
                                                class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                            <span id="pricing-plans-0-label" class="text-gray-900 ml-3">Hospital
                                                Informatics</span>
                                        </div>
                                        <div class="flex items-center text-sm">
                                            <input type="checkbox" name="business_nature[]" value="Hospital Devices"
                                                class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                            <span id="pricing-plans-0-label" class="text-gray-900 ml-3">Hospital
                                                Devices</span>
                                        </div>
                                        <div class="flex items-center text-sm">
                                            <input type="checkbox" name="business_nature[]"
                                                value="COVID-19 Related Products"
                                                class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                            <span id="pricing-plans-0-label" class="text-gray-900 ml-3">COVID-19 Related
                                                Products</span>
                                        </div>
                                        <div class="flex items-center text-sm">
                                            <input type="checkbox" name="business_nature[]" value="Other"
                                                class="h-4 w-4 text-[#00B4BF] border-gray-300 focus:ring-[#00B4BF]">
                                            <span id="pricing-plans-0-label" class="text-gray-900 ml-3">Other</span>
                                        </div>
                                    </div>
                                    @error('business_nature')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
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
                            <a href="{{ route('register.visitor') }}"
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
    </div>
</body>
@endsection
