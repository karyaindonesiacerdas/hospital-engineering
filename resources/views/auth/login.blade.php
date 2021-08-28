@extends('auth.auth-app')
@section('title', 'Login | HEW')
@section('body')

<body class="min-h-screen min-w-screen bg-gradient-to-br from-blue-600 to-purple-600">
    <div class="sm:mx-auto sm:w-full sm:max-w-lg py-4 md:py-10 2xl:py-20 px-4">
        <div class="bg-white py-8 px-6 shadow-lg rounded-lg sm:px-10">
            <div class="flex flex-col items-center space-y-0.5 mb-10">
                <!-- <img style="width:80px" class="object-contain w-10 h-10" src="assets/ptpi.png" alt="logo ptpi"> -->
                <a href="#" class="text-2xl font-bold text-yellow-600">HEW 2021</a>
                <h2 class="text-4xl font-bold text-center">Login</h2>
            </div>

            <form action="{{ route('login') }}" class="space-y-4" method="POST">
                @csrf
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email address
                    </label>
                    <div class="mt-1">
                        <input required id="email" name="email" type="email"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <div class="mt-1">
                        <input required id="password" name="password" type="password"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm font-medium text-white transition-all bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                        Login
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
                        <a href="{{ route('register.exhibitor') }}"
                            class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span>Register as Exhibitor</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
@endsection
