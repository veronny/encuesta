<?php

namespace App\Http\Controllers;

use App\ce;
use Illuminate\Http\Request;


class ceController extends Controller
{
    public function index()
    {
        return view('consulta');
    }

    public function store(request $request)
    {

        //$guarda_consulta = $request->all();

        $guarda_consulta = $request->except('_token');

        ce::insert($guarda_consulta);

        return redirect()->route('home')->with('info', 'Encuesta enviada con éxito');
    }

}
