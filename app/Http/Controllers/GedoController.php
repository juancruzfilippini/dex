<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GedoController extends Controller
{
    /**
     * Panel principal de GEDOS
     */
    public function index()
    {
        return view('gedos.index');
    }

    /**
     * Buscar GEDO por número y año
     */
    public function porNumeroAnio(Request $request)
    {
        $numero = $request->input('numero');
        $anio   = $request->input('anio');

        $sql = "
            SELECT NUMERO, ANIO, CODIGO_REPARTICION_USUARIO
            FROM EE_GED.EE_GEDO_DOCUMENTO
            WHERE NUMERO = :numero
              AND ANIO = :anio
        ";

        $resultados = DB::connection('oracle')->select($sql, [
            'numero' => $numero,
            'anio'   => $anio,
        ]);

        return view('gedos.resultados', compact('resultados'));
    }

    /**
     * Buscar GEDOS por código de repartición
     */
    public function porReparticion(Request $request)
    {
        $reparticion = $request->input('reparticion');

        $sql = "
            SELECT NUMERO, ANIO, CODIGO_REPARTICION_USUARIO
            FROM EE_GED.EE_GEDO_DOCUMENTO
            WHERE CODIGO_REPARTICION_USUARIO LIKE :codigo
        ";

        $resultados = DB::connection('oracle')->select($sql, [
            'codigo' => "%$reparticion%",
        ]);

        return view('gedos.resultados', compact('resultados'));
    }

    /**
     * Buscar documentos asociados a GEDO
     */
    public function conDocumentos(Request $request)
    {
        $id = $request->input('id');

        $sql = "
            SELECT g.NUMERO, g.ANIO, d.ID_DOCUMENTO, d.NOMBRE_DOCUMENTO
            FROM EE_GED.EE_GEDO_DOCUMENTO g
            JOIN EE_GED.EE_GEDO_DOCUMENTOS_ASOC d
              ON g.ID = d.ID_GEDO
            WHERE g.ID = :id
        ";

        $resultados = DB::connection('oracle')->select($sql, [
            'id' => $id,
        ]);

        return view('gedos.resultados', compact('resultados'));
    }
}
