<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="shortcut icon" href="{{ asset('iconoweb.ico') }}">
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
        <source src="{{ asset('videos/fondo.mp4') }}" type="video/mp4">
        Tu navegador no soporta videos.
    </video>

    <!-- Overlay oscuro -->
    <div class="overlay"></div>

    <!-- Menú de navegación superior -->
    <nav class="fixed top-0 left-0 w-full flex items-center justify-between px-8 py-4 bg-black bg-opacity-50 backdrop-blur-sm z-10">
        <!-- Logo -->
        <a href="{{ route('principal') }}">
            <img src="{{ asset('imagenes/gymtime.png') }}" alt="GymTime Logo" class="w-28 md:w-36">
        </a>
        <!-- Botones de navegación -->
        <div class="flex gap-4">
            @guest
                <a href="{{ route('login') }}" 
                   class="text-white font-semibold px-4 py-2 rounded hover:bg-blue-600 transition">Iniciar sesión</a>
                <a href="{{ route('register') }}" 
                   class="text-white font-semibold px-4 py-2 rounded hover:bg-green-600 transition">Registrarse</a>
            @endguest

            @auth
                <p class="text-white font-semibold flex items-center">{{ Auth::user()->name }}</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="text-white font-semibold px-4 py-2 rounded hover:bg-red-600 transition">Cerrar sesión</button>
                </form>
                <a href="{{ route('admin.index') }}" 
                   class="text-white font-semibold px-4 py-2 rounded hover:bg-green-600 transition">Panel</a>
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


    <!-- Sección: Características -->
    <section class="py-16 relative z-10">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-extrabold text-white text-center mb-8">Características destacadas</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-black bg-opacity-40 p-6 rounded-lg shadow-md">
                    <img src="{{ asset('imagenes/gymtime.png') }}" alt="icon" class="w-12 h-12 mb-4">
                    <h3 class="text-xl font-semibold text-white mb-2">Reservas fáciles</h3>
                    <p class="text-gray-200">Reserva clases o espacios en segundos desde el calendario interactivo.</p>
                </div>
                <div class="bg-black bg-opacity-40 p-6 rounded-lg shadow-md">
                    <img src="{{ asset('imagenes/gymtime.png') }}" alt="icon" class="w-12 h-12 mb-4">
                    <h3 class="text-xl font-semibold text-white mb-2">Confirmaciones automáticas</h3>
                    <p class="text-gray-200">Recibe confirmaciones y notificaciones para evitar confusiones.</p>
                </div>
                <div class="bg-black bg-opacity-40 p-6 rounded-lg shadow-md">
                    <img src="{{ asset('imagenes/gymtime.png') }}" alt="icon" class="w-12 h-12 mb-4">
                    <h3 class="text-xl font-semibold text-white mb-2">Control de aforo</h3>
                    <p class="text-gray-200">Gestiona el aforo por franjas horarias y evita sobre-reservas.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección: Cómo funciona -->
    <section class="py-16 relative z-10">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6">Cómo funciona</h2>
            <p class="text-gray-200 mb-8">Tres pasos sencillos para reservar tu próxima sesión.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 bg-black bg-opacity-30 rounded-lg">
                    <div class="w-16 h-16 rounded-full bg-white/10 mx-auto flex items-center justify-center mb-4">1</div>
                    <h4 class="text-white font-semibold mb-2">Elige</h4>
                    <p class="text-gray-300">Selecciona la clase, hora y pista que desees en el calendario.</p>
                </div>
                <div class="p-6 bg-black bg-opacity-30 rounded-lg">
                    <div class="w-16 h-16 rounded-full bg-white/10 mx-auto flex items-center justify-center mb-4">2</div>
                    <h4 class="text-white font-semibold mb-2">Reserva</h4>
                    <p class="text-gray-300">Confirma tu reserva con un clic y recibe la confirmación inmediata.</p>
                </div>
                <div class="p-6 bg-black bg-opacity-30 rounded-lg">
                    <div class="w-16 h-16 rounded-full bg-white/10 mx-auto flex items-center justify-center mb-4">3</div>
                    <h4 class="text-white font-semibold mb-2">Asiste</h4>
                    <p class="text-gray-300">Acude a tu sesión y disfruta. Gestiona tus reservas desde tu perfil.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección: Testimonios -->
    <section class="py-12 relative z-10">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-6">Testimonios</h2>
            <div class="space-y-6">
                <blockquote class="bg-black bg-opacity-30 p-6 rounded-lg text-gray-200">"GymTime hizo que reservar clases sea increíblemente sencillo. ¡Me encanta!" <span class="block mt-3 text-sm text-gray-400">— María, socia</span></blockquote>
                <blockquote class="bg-black bg-opacity-30 p-6 rounded-lg text-gray-200">"Como administrador, puedo controlar aforos y evitar conflictos de horario." <span class="block mt-3 text-sm text-gray-400">— Carlos, administrador</span></blockquote>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-12 relative z-10">
        <div class="max-w-3xl mx-auto px-6 text-center">
            <h3 class="text-2xl font-extrabold text-white mb-4">¿Listo para reservar tu próxima sesión?</h3>
            <p class="text-gray-200 mb-6">Regístrate o inicia sesión y comienza a reservar en segundos.</p>
            <div class="flex items-center justify-center gap-4">
                <a href="{{ route('reserva.index') }}" class="bg-yellow-400 text-black font-semibold px-6 py-3 rounded-lg shadow hover:opacity-90 transition">Reservar ahora</a>
                @guest
                <a href="{{ route('register') }}" class="border border-white text-white px-6 py-3 rounded-lg hover:bg-white/10 transition">Crear cuenta</a>
                @endguest
            </div>
        </div>
    </section>

    <!-- Pie de página -->
    <footer class="py-8 text-center relative z-10">
        <div class="max-w-6xl mx-auto px-6 text-gray-300">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('imagenes/gymtime.png') }}" alt="GymTime" class="w-10">
                    <span class="font-semibold text-white">GymTime</span>
                </div>
                <div class="text-sm">© {{ date('Y') }} GymTime. Todos los derechos reservados.</div>
            </div>
        </div>
    </footer>

    <!-- Animaciones y estilos adicionales -->
    <style>
        .animate-fadeIn { animation: fadeIn 1.5s ease forwards; opacity: 0; }
        .animate-fadeInUp { animation: fadeInUp 1.5s ease forwards; opacity: 0; }
        .animate-fadeInDown { animation: fadeInDown 1.5s ease forwards; opacity: 0; }

        @keyframes fadeIn { to { opacity: 1; } }
        @keyframes fadeInUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        @keyframes fadeInDown { from { transform: translateY(-20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }

        /* Ajustes para que las tarjetas se lean mejor sobre el video */
        .backdrop-blur-md { backdrop-filter: blur(6px); }
    </style>

</body>
</html>
