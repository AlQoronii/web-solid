<div class="mb-4">
    <label for="{{ $name }}" class="block text-gray-700 font-bold mb-2">{{ $label }}</label>
    <div class="flex items-center justify-center w-full">
        <label for="{{ $name }}" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-white hover:bg-gray-100">            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                @if ($src)
                    <img id="preview-{{ $name }}" src="{{ asset($src) }}" alt="Image Preview" class="mt-4 w-full h-48 object-cover rounded-lg">
                @else
                    <img id="preview-{{ $name }}" alt="Image Preview" class="hidden mt-4 w-full h-48 object-cover rounded-lg">
                    <div id="placeholder-{{ $name }}" class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $placeholderText }}</p>
                    </div>
                @endif
            </div>
            <input id="{{ $name }}" name="{{ $name }}" type="file" class="hidden" onchange="previewImage('{{ $name }}')" />
        </label>
    </div>
</div>

<script>
    function previewImage(inputId) {
        const fileInput = document.querySelector(`#${inputId}`);
        const imagePreview = document.querySelector(`#preview-${inputId}`);
        const placeholder = document.querySelector(`#placeholder-${inputId}`);

        if (fileInput.files && fileInput.files[0]) {
            const oFReader = new FileReader();
            oFReader.readAsDataURL(fileInput.files[0]);

            oFReader.onload = function(oFREvent) {
                imagePreview.src = oFREvent.target.result;
                imagePreview.classList.remove('hidden');
                if (placeholder) {
                    placeholder.classList.add('hidden');
                }
            };
        } else {
            // If no file is selected, reset to default state
            imagePreview.src = '';
            imagePreview.classList.add('hidden');
            if (placeholder) {
                placeholder.classList.remove('hidden');
            }
        }
    }
</script>

    