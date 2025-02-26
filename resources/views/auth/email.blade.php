<x-auth-layout>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-input-text id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Send Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-auth-layout>