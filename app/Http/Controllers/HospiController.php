<?php

namespace App\Http\Controllers;

use App\hospi;
use Illuminate\Http\Request;

class HospiController extends Controller
{
    public function index()
    {
        return view('hospi');
    }

    public function store(request $request)
    {

        $guarda_hospi = $request->except('_token');

        hospi::insert($guarda_hospi);

        return redirect()->route('home')->with('info', 'Encuesta enviada con éxito');
    }
}
