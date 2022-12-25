{{-- Header --}}
@include('layouts.header')

<div class="bg-gray-900 w-screen">
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
            <form method="POST" action="{{ route('login') }}">
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

                {{-- Password --}}
                <label for="password" class="block mb-2 text-sm font-medium text-white">Your password</label>
                <div class="relative mb-5">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 56 56" viewBox="0 0 56 56" xmlns="http://www.w3.org/2000/svg" stroke="#000000"><path d="M 28.0000 4.2578 C 21.4609 4.2578 15.4844 8.9219 15.4844 18.5078 L 15.4844 24.1328 C 12.9531 24.4375 11.7109 25.9610 11.7109 28.9610 L 11.7109 46.8438 C 11.7109 50.2188 13.2578 51.7422 16.375 51.7422 L 39.625 51.7422 C 42.7422 51.7422 44.2891 50.2188 44.2891 46.8438 L 44.2891 28.9375 C 44.2891 25.9375 43.0469 24.3437 40.5156 24.0625 L 40.5156 18.5078 C 40.5156 8.9219 34.5391 4.2578 28.0000 4.2578 Z M 19.2578 17.9922 C 19.2578 11.4532 23.1484 7.8672 28.0000 7.8672 C 32.8515 7.8672 36.7422 11.4532 36.7422 17.9922 L 36.7422 24.0391 L 19.2578 24.0625 Z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="password" id="password" name="password" class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 placeholder-gray-400" placeholder="********" required autocomplete="current-password">
                    
                </div>

                {{-- Remember me --}}
                <div class="flex items-start mb-2">
                    <div class="flex items-center h-5">
                        <label for="remember_me"></label>
                        <input id="remember_me" type="checkbox" value="" name="remember" class="w-4 h-4 bg-gray-700 rounded border border-gray-600 focus:ring-3 focus:ring-blue-600 ring-offset-gray-800">
                </div>

                <label for="remember" class="ml-2 text-sm font-medium text-gray-300">Remember me</label>
                
                </div>
                
                {{-- Forgot password & Login --}}
                <div class="text-left flex justify-between items-center">
                    <div class="mr-16">
                        <a href="{{ route('register') }}" class="text-sm text-white mr-2 underline">No account?</a>
                    </div>
                    <div>
                        <a href="{{ route('password.request') }}" class="text-sm text-white mr-2 underline">Forgot your password?</a>
                        <button type="submit" class=" font-extrabold text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">LOG IN</button>
                    </div>
                </div>
            </form>
        </div> {{-- End of Card --}}
    </div>
</div>