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

    <!-- Flowbite JS -->
    <script src="../path/to/flowbite/dist/flowbite.js"></script>

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

                {{-- Form --}}
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    {{-- Name --}}
                    <label for="name" class="block mb-2 text-sm font-medium text-white">Your name</label>
                    <div class="relative mb-5">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 56 56" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><path d="M 27.9999 51.9063 C 41.0546 51.9063 51.9063 41.0781 51.9063 28 C 51.9063 14.9453 41.0312 4.0937 27.9765 4.0937 C 14.8983 4.0937 4.0937 14.9453 4.0937 28 C 4.0937 41.0781 14.9218 51.9063 27.9999 51.9063 Z M 27.9999 14.5 C 32.4765 14.5 36.0390 18.4375 36.0390 23.1719 C 36.0390 28.2109 32.4999 32.0547 27.9999 32.0078 C 23.4765 31.9609 19.9609 28.2109 19.9609 23.1719 C 19.9140 18.4375 23.4999 14.5 27.9999 14.5 Z M 42.2499 41.8750 L 42.3202 42.1797 C 38.7109 46.0234 33.3671 48.2266 27.9999 48.2266 C 22.6093 48.2266 17.2655 46.0234 13.6562 42.1797 L 13.7265 41.8750 C 15.7655 39.0625 20.7812 35.9922 27.9999 35.9922 C 35.1952 35.9922 40.2343 39.0625 42.2499 41.8750 Z"></path></svg>
                        </div>
                        <input type="text" id="name" name="name" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 placeholder-gray-400" placeholder="Jay Ferrell" required autofocus>
                    </div>

                    {{-- Email --}}
                    <label for="email" class="block mb-2 text-sm font-medium text-white">Your Email</label>
                    <div class="relative mb-5">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                        </div>
                        <input type="text" id="email" name="email" class="bg-gray-700 border border-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 placeholder-gray-400 text-white" placeholder="name@email.com" required>
                    </div>
    
                    {{-- Password --}}
                    <label for="password" class="block mb-2 text-sm font-medium text-white">Your password</label>
                    <div class="relative mb-5">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 56 56" viewBox="0 0 56 56" xmlns="http://www.w3.org/2000/svg" stroke="#000000"><path d="M 28.0000 4.2578 C 21.4609 4.2578 15.4844 8.9219 15.4844 18.5078 L 15.4844 24.1328 C 12.9531 24.4375 11.7109 25.9610 11.7109 28.9610 L 11.7109 46.8438 C 11.7109 50.2188 13.2578 51.7422 16.375 51.7422 L 39.625 51.7422 C 42.7422 51.7422 44.2891 50.2188 44.2891 46.8438 L 44.2891 28.9375 C 44.2891 25.9375 43.0469 24.3437 40.5156 24.0625 L 40.5156 18.5078 C 40.5156 8.9219 34.5391 4.2578 28.0000 4.2578 Z M 19.2578 17.9922 C 19.2578 11.4532 23.1484 7.8672 28.0000 7.8672 C 32.8515 7.8672 36.7422 11.4532 36.7422 17.9922 L 36.7422 24.0391 L 19.2578 24.0625 Z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input type="password" id="password" name="password" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 placeholder-gray-400" placeholder="********" required autocomplete="new-password">
                    </div>

                    {{-- Confirm Password --}}
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-white">Confirm password</label>
                    <div class="relative mb-5">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 56 56" viewBox="0 0 56 56" xmlns="http://www.w3.org/2000/svg" stroke="#000000"><path d="M 28.0000 4.2578 C 21.4609 4.2578 15.4844 8.9219 15.4844 18.5078 L 15.4844 24.1328 C 12.9531 24.4375 11.7109 25.9610 11.7109 28.9610 L 11.7109 46.8438 C 11.7109 50.2188 13.2578 51.7422 16.375 51.7422 L 39.625 51.7422 C 42.7422 51.7422 44.2891 50.2188 44.2891 46.8438 L 44.2891 28.9375 C 44.2891 25.9375 43.0469 24.3437 40.5156 24.0625 L 40.5156 18.5078 C 40.5156 8.9219 34.5391 4.2578 28.0000 4.2578 Z M 19.2578 17.9922 C 19.2578 11.4532 23.1484 7.8672 28.0000 7.8672 C 32.8515 7.8672 36.7422 11.4532 36.7422 17.9922 L 36.7422 24.0391 L 19.2578 24.0625 Z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 placeholder-gray-400" placeholder="********" required>
                    </div>

                    {{-- Avatar --}}
                    <label class="block mb-2 text-sm font-medium text-white" for="avatar">Upload avatar <span class="text-gray-400">(Can be done at a later time.)</span></label>
                    <div class="relative mb-5">
                        <input class=" mb-2 block w-full text-sm text-gray-400 border border-gray-600 rounded-lg cursor-pointer bg-gray-700  focus:outline-none placeholder-gray-400" id="avatar" name="avatar" type="file">
                        <p class="text-white text-sm">JPEG, JPG, PNG or SVG (MAX. 512x512)</p>
                    </div> 
                    
                    {{-- Login instead & Register --}}
                    <div class="text-right ml-32">
                        <a href="{{ route('login') }}" class="text-sm text-white mr-2 underline">Already have an account?</a>
                        <button type="submit" class="mt-2 font-extrabold text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">REGISTER</button>
                    </div>
                </form>
            </div> {{-- End of Card --}}
        </div>
    </div>
</body>
</html>