<div x-data="{ showModal: false }" class="inline-block">
    <button 
        @click.prevent="showModal = true" 
        type="button" 
        class="{{ $buttonClass ?? ' text-red-400 hover:text-red-700 px-2 py-1 rounded  inline-block text-center' }}"
    >
        {{ $buttonText ?? '' }}

        @if($svgIcon ?? false)
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="size-6">
                <path strokeLinecap="round" strokeLinejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>
        @endif

    </button>

    <!-- Modal -->
    <div 
        x-show="showModal" 
        class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50" 
        x-cloak
    >
        <div class="bg-white rounded-lg p-6 shadow-lg w-96">
            <h2 class="text-lg font-semibold mb-4">{{ $title ?? 'Konfirmasi' }}</h2>
            <p class="mb-6">{{ $message ?? 'Apakah Anda yakin ingin melanjutkan?' }}</p>
            <div class="flex justify-end space-x-4">
                <button 
                    @click.prevent="showModal = false" 
                    type="button"
                    class="{{ $cancelButtonClass ?? 'bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400' }}"
                >
                    {{ $cancelText ?? 'Batal' }}
                </button>
                <form
                    x-ref="modalForm" 
                    action="{{ $action ?? '#' }}"
                    method="POST"
                >
                    @csrf
                    @if (in_array($method, ['PUT', 'PATCH', 'DELETE']))
                        @method($method)
                    @endif
                    {{ $slot }}
                    <button 
                        type="submit" 
                        class="{{ 
                            $confirmButtonClass 
                            ?? ($method === 'DELETE' 
                                ? 'bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600' 
                                : 'bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600') 
                        }}"
                    >
                        {{ $confirmText ?? 'Konfirmasi' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>