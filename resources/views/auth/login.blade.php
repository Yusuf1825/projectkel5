<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Akun</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            width: 100vw;
        }

        .tab-active {
            border-bottom-width: 2px;
            border-color: #4f46e5;
            /* Indigo-600 */
            color: #4f46e5;
        }
    </style>
</head>

<body>
    <div class="flex h-screen w-screen">
        <!-- Gambar Kiri -->
        <div class="hidden md:block w-1/2 h-full">
            <img src="{{ asset('images/login.jpg') }}" alt="Gambar" class="w-full h-full object-cover">
        </div>

        <!-- Form Kanan -->
        <div class="w-full md:w-1/2 h-full flex flex-col justify-center items-center bg-white">
            <div class="w-full max-w-md px-6">
                <!-- Tabs -->
                <div class="flex mb-6 border-b">
                    <button id="loginTab" onclick="showTab('login')"
                        class="flex-1 text-center py-2 font-semibold tab-active">Login</button>
                    <button id="registerTab" onclick="showTab('register')"
                        class="flex-1 text-center py-2 text-gray-500 hover:text-gray-700 ">Register</button>
                </div>

                <!-- Login Form -->
                <div id="loginForm">
                    <h2 class="text-2xl font-bold mb-4">Login Akun Antarkota</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium">Email</label>
                            <input id="email" type="email" name="email" required autofocus
                                class="mt-1 w-full border rounded px-3 py-2">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium">Password</label>
                            <input id="password" type="password" name="password" required
                                class="mt-1 w-full border rounded px-3 py-2">
                        </div>
                        <button type="submit" class="w-full py-2 bg-[#0f172a] text-white rounded hover:bg-[#0f172a]">
                            Login
                        </button>
                    </form>
                </div>

                <!-- Register Form -->
                <div id="registerForm" class="hidden">
                    <h2 class="text-2xl font-bold mb-4">Daftar Akun Antarkota</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium">Name</label>
                            <input id="name" type="text" name="name" required
                                class="mt-1 w-full border rounded px-3 py-2">
                        </div>
                        <div class="mb-4">
                            <label for="email_reg" class="block text-sm font-medium">Email</label>
                            <input id="email_reg" type="email" name="email" required
                                class="mt-1 w-full border rounded px-3 py-2">
                        </div>
                        <div class="mb-4">
                            <label for="password_reg" class="block text-sm font-medium">Password</label>
                            <input id="password_reg" type="password" name="password" required
                                class="mt-1 w-full border rounded px-3 py-2">
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-sm font-medium">Confirm
                                Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                class="mt-1 w-full border rounded px-3 py-2">
                        </div>
                        <button type="submit" class="w-full py-2 bg-[#0f172a] text-white rounded hover:bg-[#0f172a]">
                            Register
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showTab(tab) {
            document.getElementById('loginForm').classList.add('hidden');
            document.getElementById('registerForm').classList.add('hidden');
            document.getElementById('loginTab').classList.remove('tab-active');
            document.getElementById('registerTab').classList.remove('tab-active');

            if (tab === 'login') {
                document.getElementById('loginForm').classList.remove('hidden');
                document.getElementById('loginTab').classList.add('tab-active');
            } else {
                document.getElementById('registerForm').classList.remove('hidden');
                document.getElementById('registerTab').classList.add('tab-active');
            }
        }
    </script>
</body>

</html>
