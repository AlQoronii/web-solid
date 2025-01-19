@props(['type' => 'success', 'message'])

<div 
    x-data="{ showModal: true }" 
    x-init="setTimeout(() => showModal = false, 2000)" 
    x-show="showModal" 
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-800"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"
    x-cloak
    class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50"
>
    <div class="bg-white rounded-lg p-6 shadow-lg w-96">
        <!-- Icon and Title -->
        <div class="text-center">
            @if($type === 'success')
                <h2 class="text-lg font-semibold text-green-600 mb-2">Berhasil</h2>
            @else
                <h2 class="text-lg font-semibold text-red-600 mb-2">Terjadi Kesalahan</h2>
            @endif
        </div>

        <!-- Message -->
        <p class="text-gray-700 text-center mb-6">{{ $message }}</p>
    </div>
</div>
