<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de clases - GymTime</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-100 to-blue-200 min-h-screen flex items-center justify-center font-sans">

    <!-- Contenedor central -->
    <div class="w-full max-w-lg bg-black bg-opacity-30 backdrop-blur-md rounded-xl shadow-lg p-8">
        <!-- Título -->
        <h2 class="text-3xl font-bold text-center text-white mb-6">Reserva tu clase</h2>
             <img src="{{ asset('imagenes/gymtime.png') }}" alt="GymTime Logo" class="mx-auto mb-6 w-32 md:w-36">

        <!-- Mensaje de éxito -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulario -->
        <form action="{{ route('reserva.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-white font-semibold mb-2">Nombre completo</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white bg-opacity-80 focus:ring-2 focus:ring-blue-500">
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-white font-semibold mb-2">Correo electrónico</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white bg-opacity-80 focus:ring-2 focus:ring-blue-500">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-white font-semibold mb-2">Selecciona una clase</label>
                <select name="clase" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white bg-opacity-80 focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Selecciona una clase --</option>
                    <option value="yoga">Yoga</option>
                    <option value="spinning">Spinning</option>
                    <option value="crossfit">CrossFit</option>
                    <option value="zumba">Zumba</option>
                    <option value="pilates">Pilates</option>
                </select>
                @error('clase')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-white font-semibold mb-2">Fecha de la clase</label>
                <input type="date" name="fecha" value="{{ old('fecha') }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white bg-opacity-80 focus:ring-2 focus:ring-blue-500">
                @error('fecha')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 px-6 rounded-lg shadow-lg transition-colors duration-300">
                    Reservar clase
                </button>
            </div>
        </form>
    </div>

</body>
</html>
