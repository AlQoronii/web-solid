@props(['name', 'label', 'required' => false, 'placeholder' => '********', 'value' => null])

<x-input-label for="{{ $name }}" :value="__($label)" :required="$required" />
<div class="relative w-full" x-data="{ type: 'password' }">
    <input id="{{ $name }}" name="{{ $name }}" type="password" :type="type" placeholder="{{ $placeholder }}" value="{{ $value }}"
        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        :required="$required">
    <div class="absolute inset-y-0 right-0 flex items-center pr-3 text-sm leading-5">
        <button type="button" x-on:click="type = type === 'password' ? 'text' : 'password'"
            class="text-gray-500 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            <x-heroicon-o-eye class="w-6 h-6" x-show="type === 'password'" style="display: none;" />
            <x-heroicon-o-eye-slash class="w-6 h-6" x-show="type === 'text'" style="display: none;" />
        </button>
    </div>
</div>
<x-input-error :messages="$errors->get($name)" class="mt-2" />
