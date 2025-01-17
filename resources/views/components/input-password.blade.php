@props(['name', 'label', 'required' => false, 'placeholder' => '********', 'value' => null])

<x-input-label for="{{ $name }}" :value="__($label)" :required="$required" />
<div class="relative w-full" x-data="{ show: false }">
    <input id="{{ $name }}" name="{{ $name }}" :type="show ? 'text' : 'password'" placeholder="{{ $placeholder }}" value="{{ $value }}"
        class="block mt-1 w-full border border-gray-500 rounded-md p-1 text-lg"
        :required="$required">
    <div class="absolute inset-y-0 right-0 flex items-center pr-3 text-sm leading-5">
        <button type="button" x-on:click="show = !show"
            class="text-gray-500 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 2C5.58 2 1.73 5.11.29 9.5c1.44 4.39 5.29 7.5 9.71 7.5s8.27-3.11 9.71-7.5C18.27 5.11 14.42 2 10 2zm0 13c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
            </svg>
        </button>
    </div>
</div>
<x-input-error :messages="$errors->get($name)" class="mt-2" />
