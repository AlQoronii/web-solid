<x-auth-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="flex items-center justify-start">
            <div class="w-20 md:w-24 flex items-center">
                <em class="text-black" style="font-size: 20pt">Library</em>
                <svg class="w-6 h-6 ml-2 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        </div>

        <div class="mt-6">
            <h1 class="font-bold text-2xl">Selamat Datang</h1>
            <p class="font-normal text-md text-gray-400">Ayo masuk Library sekarang!</p>
        </div>

        <div class="mt-8">
            <x-input-label for="email" :value="__('Email')" required="true" />
            <x-input-text id="email" class="block mt-1 w-full" type="text" name="email" placeholder="faa****@gmail.com" :value="old('email')" required autofocus autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-password name="password" label="Password" :required="true" />
        </div>

        <div class="flex items-center justify-end mt-6">
            @if (Route::has('password.request'))
                <a class="text-sm text-blue-600 hover:text-blue-900 rounded-md" href="{{ route('password.request') }}">
                    {{ __('Lupa Kata Sandi?') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-center mt-6">
            <x-primary-button class="w-full">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>
    </form>
</x-auth-layout>
