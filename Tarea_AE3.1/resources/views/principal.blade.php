<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Bienvenido a GymTime</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Video de fondo */
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -2;
            filter: blur(8px) brightness(0.5);
        }

        /* Overlay semitransparente */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.35);
            z-index: -1;
        }
    </style>
</head>
<body class="relative min-h-screen font-sans text-gray-800">

    <!-- Video de fondo -->
    <video autoplay muted loop class="video-background">
        <source src="{{ asset('storage/fondo.mp4') }}" type="video/mp4">
        Tu navegador no soporta videos.
    </video>

    <!-- Overlay oscuro -->
    <div class="overlay"></div>

    <!-- Menú de navegación superior -->
    <nav class="fixed top-0 left-0 w-full flex items-center justify-between px-8 py-4 bg-black bg-opacity-50 backdrop-blur-sm z-10">
        <!-- Logo -->
        <img src="{{ asset('storage/gymtime.png') }}" alt="GymTime Logo" class="w-28 md:w-36">

        <!-- Botones de navegación -->
        <div class="flex gap-4">
            @guest
                <a href="{{ route('login') }}" 
                   class="text-white font-semibold px-4 py-2 rounded hover:bg-blue-600 transition">Iniciar sesión</a>
                <a href="{{ route('register') }}" 
                   class="text-white font-semibold px-4 py-2 rounded hover:bg-green-600 transition">Registrarse</a>
            @endguest

            @auth
                <p class="text-white font-semibold flex items-center">👋 {{ Auth::user()->name }}</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="text-white font-semibold px-4 py-2 rounded hover:bg-red-600 transition">Cerrar sesión</button>
                </form>
            @endauth

            <a href="{{ route('reserva.index') }}" 
               class="text-white font-semibold px-4 py-2 rounded hover:bg-yellow-600 transition">Reservar</a>
        </div>
    </nav>

    <!-- Contenido central -->
    <div class="flex flex-col items-center justify-center text-center min-h-screen px-4">
    <div class="max-w-4xl bg-black bg-opacity-30 p-10 rounded-xl backdrop-blur-md mt-28 shadow-md">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6 animate-fadeInDown">Bienvenido a GymTime</h1>
        <p class="text-gray-200 text-lg md:text-xl mb-8 leading-relaxed animate-fadeIn">
            GymTime es una aplicación web pensada para usuarios de gimnasios que desean reservar clases, 
            sesiones de entrenamiento o instalaciones específicas en horarios determinados. 
            Gestiona tus reservas de manera sencilla y evita conflictos de horarios. 
            Ideal tanto para clientes como para administradores del gimnasio, con calendario interactivo, 
            confirmaciones automáticas y control del aforo por franja horaria.
        </p>

    
    </div>
</div>


    <!-- Animaciones -->
    <style>
        .animate-fadeIn { animation: fadeIn 1.5s ease forwards; opacity: 0; }
        .animate-fadeInUp { animation: fadeInUp 1.5s ease forwards; opacity: 0; }
        .animate-fadeInDown { animation: fadeInDown 1.5s ease forwards; opacity: 0; }

        @keyframes fadeIn { to { opacity: 1; } }
        @keyframes fadeInUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        @keyframes fadeInDown { from { transform: translateY(-20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    </style>

</body>
</html>
