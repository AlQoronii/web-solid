<x-auth-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="flex items-center justify-start">
            <div class="w-20 md:w-24 flex items-center">
                <em class="text-black" style="font-size: 20pt">Library</em>

            </div>
        </div>

        <div class="mt-6">
            <h1 class="font-bold text-2xl">Selamat Datang</h1>
            <p class="font-normal text-md text-gray-400">Ayo masuk Library sekarang!</p>
        </div>

        <div class="mt-8">
            <x-input-label for="email" :value="__('Email')" required="true" />
            <x-input-text id="email" class="block mt-1 w-full border border-gray-500 rounded-md p-1 text-lg" type="text" name="email" placeholder="faa****@gmail.com" :value="old('email')" required autofocus autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-password name="password" label="Password" :required="true" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- <div class="flex items-center justify-end mt-6">
            @if (Route::has('password.request'))
                <a class="text-sm text-blue-600 hover:text-blue-900 rounded-md" href="{{ route('password.request') }}">
                    {{ __('Lupa Kata Sandi?') }}
                </a>
            @endif
        </div> --}}

        <div class="flex items-center justify-center mt-6">
            <x-primary-button class="w-full">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>
    </form>
</x-auth-layout>
