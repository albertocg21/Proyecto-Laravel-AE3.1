<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Bienvenido a GymTime</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-100 to-blue-200 min-h-screen flex items-center justify-center">
    <div class="max-w-3xl bg-white p-10 rounded-2xl shadow-lg text-center">
        <h1 class="text-4xl font-bold text-blue-800 mb-6">Bienvenido a GymTime</h1>
        <p class="text-gray-700 mb-8 leading-relaxed">
            GymTime es una aplicación web dirigida a usuarios de gimnasios que desean reservar clases, 
            sesiones de entrenamiento o el uso de instalaciones específicas en horarios determinados. 
            Permite gestionar de manera sencilla las reservas, evitando sobrecargas y conflictos de horarios. 
            La aplicación está pensada tanto para clientes como para administradores del gimnasio, ofreciendo un calendario interactivo, 
            confirmaciones automáticas y control del aforo por franja horaria.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4">

            @guest
                <a href="{{ route('login') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300">
                    Iniciar sesión
                </a>

                <a href="{{ route('register') }}" 
                   class="bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300">
                    Registrarse
                </a>
            @endguest

            @auth
                <p class="text-gray-800 font-semibold flex items-center justify-center">
                    👋 Bienvenido, {{ Auth::user()->name }}
                </p>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300">
                        Cerrar sesión
                    </button>
                </form>
            @endauth

            <a href="{{ route('reserva') }}" 
               class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300">
                Reservar
            </a>
        </div>
    </div>
</body>
</html>
