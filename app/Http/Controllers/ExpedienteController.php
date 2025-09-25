<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpedienteController extends Controller
{
    public function index()
    {
        // ⚠️ Sin conexión a BD, solo carga la vista
        return view('expedientes.index');
    }
}
