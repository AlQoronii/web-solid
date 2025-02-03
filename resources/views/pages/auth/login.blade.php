<x-auth-layout>
    <form id="loginForm">
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
            <x-input-text id="email" class="block mt-1 w-full border border-gray-500 rounded-md p-1 text-lg" type="text" name="email" placeholder="faa****@gmail.com" required autofocus autocomplete="email" />
            <span id="emailError" class="text-red-500 mt-2"></span>
        </div>

        <div class="mt-4">
            <x-input-password name="password" label="Password" :required="true" />
            <span id="passwordError" class="text-red-500 mt-2"></span>
        </div>

        <div class="flex items-center justify-center mt-6">
            <x-primary-button type="submit" class="w-full">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault(); // Mencegah form submit secara default

            const email = document.getElementById('email').value;
            const password = document.querySelector('input[name="password"]').value;

            // Hapus pesan error sebelumnya
            document.getElementById('emailError').innerText = '';
            document.getElementById('passwordError').innerText = '';

            try {
                const response = await fetch('http://127.0.0.1:8000/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ email, password })
                });

                const result = await response.json();

                if (response.ok) {
                    // Jika login berhasil
                    alert(result.message);
                    // window.location.href = '/dashboard'; // Redirect ke endpoint dashboard dari API
                    window.location.href = '/dashboard';
                } else {
                    // Jika login gagal, tampilkan pesan error
                    if (result.message.includes('Email')) {
                        document.getElementById('emailError').innerText = result.message;
                    } else {
                        document.getElementById('passwordError').innerText = result.message;
                    }
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });
    </script>
</x-auth-layout>
