<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - GymTime</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-100 to-blue-200 min-h-screen flex items-center justify-center">

    <div class="bg-white p-10 rounded-2xl shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-blue-700 mb-6">Iniciar sesión</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <input type="email" name="email" placeholder="Correo electrónico" class="w-full border border-gray-300 rounded-lg p-3 mb-3" value="{{ old('email') }}">
            @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

            <input type="password" name="password" placeholder="Contraseña" class="w-full border border-gray-300 rounded-lg p-3 mb-3">
            @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

            <div class="flex items-center justify-between mb-4">
                <label class="flex items-center text-sm text-gray-600">
                    <input type="checkbox" name="remember" class="mr-2"> Recordarme
                </label>
                <a href="#" class="text-blue-700 text-sm hover:underline">¿Olvidaste tu contraseña?</a>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition-colors duration-300">
                Entrar
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-4">
            ¿No tienes cuenta?
            <a href="{{ route('register') }}" class="text-blue-700 font-semibold hover:underline">Regístrate</a>
        </p>
    </div>

</body>
</html>
