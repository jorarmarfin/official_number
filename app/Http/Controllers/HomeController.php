<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Year;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'asunto' => 'required|string|max:255',
            'cantidad_oficios' => 'required|integer|min:1',
            'email' => 'required|email|max:255',
        ], [
            'asunto.required' => 'El asunto es obligatorio.',
            'asunto.max' => 'El asunto no puede exceder 255 caracteres.',
            'cantidad_oficios.required' => 'La cantidad de oficios es obligatoria.',
            'cantidad_oficios.integer' => 'La cantidad debe ser un número entero.',
            'cantidad_oficios.min' => 'La cantidad debe ser al menos 1.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Ingrese un correo electrónico válido.',
        ]);

        /*
         *   "asunto" => "varios"
  "cantidad_oficios" => "10"
  "email" => "luis.mayta@gmail.com"
         * */
        $year_active = Year::where('active', true)->first();
        if (!$year_active) {
            return redirect()->back()->withErrors(['error' => 'No hay un año activo configurado.']);
        }
        $init_number = Document::where('year_id', $year_active->id)->max('end_number');
        if (!$init_number) {
            $init_number = 0;
        }
        $end_number = $init_number + $validated['cantidad_oficios'];
        $range = implode(', ', range($init_number + 1, $end_number));

        Document::create([
            'year_id' => $year_active->id,
            'subject' => $validated['asunto'],
            'quantity' => $validated['cantidad_oficios'],
            'start_number' => $init_number + 1,
            'end_number' => $end_number,
            'range' => $range,
            'recipient_email' => $validated['email'],
        ]);


        return redirect()->route('welcome')->with('success', 'Su solicitud ha sido recibida correctamente. Pronto recibirá una respuesta en su correo electrónico.');
    }
}
