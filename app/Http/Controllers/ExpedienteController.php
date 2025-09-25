<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpedienteController extends Controller
{
    public function index()
    {
        // ejemplo: trae todos los registros de la tabla "expedientes"
        $expedientes = DB::table('expedientes')->get();

        return view('expedientes.index', compact('expedientes'));
    }
}
