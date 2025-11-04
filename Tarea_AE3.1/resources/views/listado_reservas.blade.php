<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de reservas - GymTime</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen flex flex-col items-center p-8">
    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-4xl">
        <h2 class="text-3xl font-bold text-center text-blue-800 mb-6">Listado de Reservas</h2>

        @if (count($reservas) > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="py-3 px-4 text-left">Nombre</th>
                            <th class="py-3 px-4 text-left">Email</th>
                            <th class="py-3 px-4 text-left">Clase</th>
                            <th class="py-3 px-4 text-left">Fecha</th>
                            <th class="py-3 px-4 text-left">Registrado en</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservas as $reserva)
                            <tr class="border-b hover:bg-blue-50">
                                <td class="py-2 px-4">{{ $reserva['nombre'] ?? '' }}</td>
                                <td class="py-2 px-4">{{ $reserva['email'] ?? '' }}</td>
                                <td class="py-2 px-4 capitalize">{{ $reserva['clase'] ?? '' }}</td>
                                <td class="py-2 px-4">{{ $reserva['fecha'] ?? '' }}</td>
                                <td class="py-2 px-4">{{ $reserva['creado_en'] ?? '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-600 text-center mt-6">No hay reservas registradas todavía.</p>
        @endif

        <div class="text-center mt-8">
            <a href="{{ route('principal') }}"
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg transition">
               Volver al inicio
            </a>
        </div>
    </div>
</body>
</html>
