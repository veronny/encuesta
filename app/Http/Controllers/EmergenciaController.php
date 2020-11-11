<?php

namespace App\Http\Controllers;

use App\emergencia;
use Illuminate\Http\Request;

class EmergenciaController extends Controller
{
    public function index()
    {
        return view('emergencia');
    }

    public function store(request $request)
    {

        $guarda_emergencia = $request->except('_token');

        emergencia::insert($guarda_emergencia);

        return redirect()->route('home')->with('info', 'Encuesta enviada con éxito');
    }
}
