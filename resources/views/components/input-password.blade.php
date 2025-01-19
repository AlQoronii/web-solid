@props(['name', 'label', 'required' => false, 'placeholder' => '********', 'value' => null])

<x-input-label for="{{ $name }}" :value="__($label)" :required="$required" />
<div class="relative w-full" x-data="{ show: false }">
    <input id="{{ $name }}" name="{{ $name }}" :type="show ? 'text' : 'password'" placeholder="{{ $placeholder }}" value="{{ $value }}"
        class="block mt-1 w-full border border-gray-500 rounded-md p-1 text-lg"
        :required="$required">
    <div class="absolute inset-y-0 right-0 flex items-center pr-3 text-sm leading-5">
        <button type="button" x-on:click="show = !show"
            class="text-gray-500 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            <svg :class="{'hidden': show, 'block': !show }" class="h-5 w-5 text-gray-500" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.274 1.057-.737 2.057-1.358 2.958M15 12a3 3 0 01-6 0m6 0a3 3 0 01-6 0m6 0a3 3 0 01-6 0" />
            </svg>
            <svg :class="{'block': show, 'hidden': !show }" class="h-5 w-5 text-gray-500" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.05 10.05 0 011.358-2.958m1.358-2.958A10.05 10.05 0 0112 5c4.477 0 8.268 2.943 9.542 7-.274 1.057-.737 2.057-1.358 2.958M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
            </svg>
        </button>
    </div>
</div>
<x-input-error :messages="$errors->get($name)" class="mt-2" />
