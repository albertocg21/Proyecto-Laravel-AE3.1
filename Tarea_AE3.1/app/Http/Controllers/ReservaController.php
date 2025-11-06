<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Importamos el facade Storage para trabajar con archivos (leer, escribir, etc.)
use Illuminate\Support\Facades\Storage;
// Importamos el modelo Reserva para guardar los datos en la base de datos
use App\Models\Reserva;

class ReservaController extends Controller
{
    // Este método muestra la vista del formulario de reserva (reserva.blade.php)
    public function index()
    {
        return view('reserva');
    }

    // Este método se ejecuta cuando el usuario envía el formulario de reserva
    // Guarda los datos tanto en la base de datos como en un archivo CSV
    public function store(Request $request)
    {
        // Primero validamos los datos que vienen del formulario
        // Esto asegura que no lleguen datos vacíos o con formato incorrecto
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'email'  => 'required|email',
            'clase'  => 'required|string',
            'fecha'  => 'required|date',
        ]);

        // Guardamos los datos en la tabla de la base de datos usando el modelo Reserva
        Reserva::create($validated);

        // Creamos una línea de texto con los datos separados por comas (formato CSV)
        // También añadimos la fecha y hora en que se creó la reserva
        $linea = implode(',', [
            $validated['nombre'],
            $validated['email'],
            $validated['clase'],
            $validated['fecha'],
            now()->format('Y-m-d H:i:s')
        ]) . "\n";

        // Si el archivo CSV no existe todavía, lo creamos con la primera línea de encabezados
        // Esto sirve para que luego se entienda qué representa cada columna
        if (!Storage::exists('reservas.csv')) {
            Storage::put('reservas.csv', "nombre,email,clase,fecha,creado_en\n");
        }

        // Añadimos la nueva línea con los datos al final del archivo CSV
        Storage::append('reservas.csv', $linea);

        // Redirigimos al usuario a la página principal y mostramos un mensaje de éxito
        // El mensaje se guarda en la sesión y se muestra solo una vez
        return redirect()->route('principal')->with('success', 'Reserva registrada correctamente.');
    }

    // Este método muestra un listado de todas las reservas leyendo el archivo CSV
    public function listado()
    {
        // Creamos un array vacío donde guardaremos todas las reservas leídas del CSV
        $reservas = [];

        // Primero comprobamos si el archivo existe para evitar errores
        if (Storage::exists('reservas.csv')) {
            // Leemos el contenido del archivo completo
            $contenido = Storage::get('reservas.csv');

            // Separamos el contenido en líneas (cada línea es una reserva)
            $lineas = explode("\n", trim($contenido));

            // La primera línea del archivo contiene los nombres de las columnas (encabezados)
            $encabezados = str_getcsv(array_shift($lineas));

            // Recorremos todas las líneas restantes (cada una es una reserva)
            foreach ($lineas as $linea) {
                // Si la línea está vacía, la saltamos
                if (trim($linea) === '') continue;

                // Convertimos la línea CSV en un array con los valores
                $datos = str_getcsv($linea);

                // Asociamos los valores con los nombres de las columnas (como un array asociativo)
                $reservas[] = array_combine($encabezados, $datos);
            }
        }

        // Enviamos todas las reservas a la vista listado_reservas.blade.php para mostrarlas en una tabla o lista
        return view('listado_reservas', compact('reservas'));
    }
}

