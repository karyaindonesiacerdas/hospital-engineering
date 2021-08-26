@extends('auth.auth-app')
@section('title', 'Virtual Exhibition')
@section('body')

<body>
    <div class="grid grid-cols-3 gap-6 p-10">
        <div class="border-2 border-blue-600 text-blue-600 flex items-center justify-center py-10">
            <a href="{{ route('register.visitor') }}">Register Visitor Page</a>
        </div>
        <div class="border-2 border-blue-600 text-blue-600 flex items-center justify-center py-10">
            <a href="{{ route('register.exhibitor') }}">Register Exhibitor Page</a>
        </div>
        <div class="border-2 border-blue-600 text-blue-600 flex items-center justify-center py-10">
            <a href="{{ route('login') }}">Login Page</a>
        </div>
    </div>
</body>
@endsection
