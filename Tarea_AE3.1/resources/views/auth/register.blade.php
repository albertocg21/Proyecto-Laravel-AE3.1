<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - GymTime</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-100 to-blue-200 min-h-screen flex items-center justify-center font-sans">

    <!-- Contenedor central -->
    <div class="w-full max-w-md bg-black bg-opacity-30 backdrop-blur-md rounded-xl shadow-lg p-10">
        <!-- Logo -->
        <img src="{{ asset('storage/gymtime.png') }}" alt="GymTime Logo" class="mx-auto mb-6 w-32 md:w-36">

        <!-- Título -->
        <h2 class="text-3xl font-bold text-center text-white mb-6">Crear cuenta</h2>

        <!-- Formulario -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <input type="text" name="name" placeholder="Nombre completo" 
                   class="w-full border border-gray-300 rounded-lg p-3 mb-3 bg-white bg-opacity-80" value="{{ old('name') }}">
            @error('name') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

            <input type="email" name="email" placeholder="Correo electrónico" 
                   class="w-full border border-gray-300 rounded-lg p-3 mb-3 bg-white bg-opacity-80" value="{{ old('email') }}">
            @error('email') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

            <input type="password" name="password" placeholder="Contraseña" 
                   class="w-full border border-gray-300 rounded-lg p-3 mb-3 bg-white bg-opacity-80">
            @error('password') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

            <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" 
                   class="w-full border border-gray-300 rounded-lg p-3 mb-3 bg-white bg-opacity-80">

            <button type="submit" 
                    class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 rounded-lg transition-colors duration-300 shadow-lg">
                Registrarse
            </button>
        </form>

        <p class="text-center text-white text-sm mt-4">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}" class="font-semibold hover:underline">Inicia sesión</a>
        </p>
    </div>

</body>
</html>
