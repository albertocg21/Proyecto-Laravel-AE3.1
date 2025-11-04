<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Reserva;

class ReservaController extends Controller
{

    //Muestra el formulario de reserva.

    public function index()
    {
        return view('reserva');
    }

    //Guarda la reserva en la base de datos y en un archivo CSV.
    public function store(Request $request)
    {
        //Valida los datos recibidos
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'email'  => 'required|email',
            'clase'  => 'required|string',
            'fecha'  => 'required|date',
        ]);

        //Lo guarda en la base de datos
        Reserva::create($validated);

        //Prepara la línea CSV
        $linea = implode(',', [
            $validated['nombre'],
            $validated['email'],
            $validated['clase'],
            $validated['fecha'],
            now()->format('Y-m-d H:i:s')
        ]) . "\n";

        //Si el archivo no existe, lo crear con encabezado
        if (!Storage::exists('reservas.csv')) {
            Storage::put('reservas.csv', "nombre,email,clase,fecha,creado_en\n");
        }

        //Añade la nueva reserva al CSV
        Storage::append('reservas.csv', $linea);

        //Mensaje de éxito
        return redirect()->route('principal')->with('success', 'Reserva registrada correctamente.');
    }

    //Muestra el listado de reservas leyendo el archivo CSV.
    public function listado()
    {
        $reservas = [];

        //Esto verifica si el archivo CSV existe
        if (Storage::exists('reservas.csv')) {
            $contenido = Storage::get('reservas.csv');
            $lineas = explode("\n", trim($contenido));

            //Extrae los encabezados
            $encabezados = str_getcsv(array_shift($lineas));

            //Procesa cada línea como un array asociativo
            foreach ($lineas as $linea) {
                if (trim($linea) === '') continue;
                $datos = str_getcsv($linea);
                $reservas[] = array_combine($encabezados, $datos);
            }
        }

        //Envia los datos a la vista
        return view('listado_reservas', compact('reservas'));
    }
}
