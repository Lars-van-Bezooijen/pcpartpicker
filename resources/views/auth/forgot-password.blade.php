<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/pcpp_logo.png') }}">

    <title>PCPartPicker</title>
</head>
<body>
    <div class="bg-gray-900">
        {{-- 

                |    TO DO: ADD ROUTE TO HOME PAGE LINK WHEN DONE
                V
        --}}
        <a href="" class="text-white underline p-2 relative top-2">Homepage</a>

        {{-- Middle section --}}
        <div class="h-screen flex justify-center items-center flex-col">
            {{-- Logo --}}
            <img class="w-24 mb-8" src="{{ asset('img/pcpp_logo.png') }}" alt="">
            
            {{-- Card --}}
            <div class="bg-gray-800 p-4 rounded-md w-auto">
                {{-- Errors --}}
                @if ($errors->any())
                    <div class="bg-red-500 p-2 rounded-md mb-4">
                        <ul class="text-white list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                        
                {{-- Description --}}
                <p class="text-white text-sm max-w-xl mb-4 break-keep">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>

                {{-- Form --}}
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    {{-- Email --}}
                    <label for="email" class="block mb-2 text-sm font-medium text-white">Your Email</label>
                    <div class="relative mb-5">
                        <div>
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                            </div>
                            <input type="text" id="email" name="email" class="bg-gray-700 border border-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 placeholder-gray-400 text-white" placeholder="name@email.com" required autofocus>
                        </div>
                    </div>
                    
                    {{-- Submit --}}
                    <div class="text-right">
                        <button type="submit" class=" font-extrabold text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">EMAIL PASSWORD RESET LINK</button>
                    </div>
                </form>
            </div> {{-- End of Card --}}
        </div>
    </div>
</body>
</html>