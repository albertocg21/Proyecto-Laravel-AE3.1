<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - GymTime</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-green-100 to-green-200 min-h-screen flex items-center justify-center">

    <div class="bg-white p-10 rounded-2xl shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-green-700 mb-6">Crear cuenta</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <input type="text" name="name" placeholder="Nombre completo" class="w-full border border-gray-300 rounded-lg p-3 mb-3" value="{{ old('name') }}">
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

            <input type="email" name="email" placeholder="Correo electrónico" class="w-full border border-gray-300 rounded-lg p-3 mb-3" value="{{ old('email') }}">
            @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

            <input type="password" name="password" placeholder="Contraseña" class="w-full border border-gray-300 rounded-lg p-3 mb-3">
            @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

            <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" class="w-full border border-gray-300 rounded-lg p-3 mb-3">

            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition-colors duration-300">
                Registrarse
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-4">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}" class="text-green-700 font-semibold hover:underline">Inicia sesión</a>
        </p>
    </div>

</body>
</html>
