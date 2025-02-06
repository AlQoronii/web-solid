<div x-data="{ showModal: false }" class="inline-block">
    <button 
        @click.prevent="showModal = true" 
        type="button" 
        class="{{ $buttonClass ?? 'bg-red-400 text-red-900 px-2 py-1 rounded hover:bg-red-500 inline-block text-center' }}"
    >
        {{ $buttonText ?? 'Open' }}
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