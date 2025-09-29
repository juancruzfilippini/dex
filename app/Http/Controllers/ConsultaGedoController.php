<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaGedoController extends Controller
{
    /**
     * Buscar GEDO por Número y Año
     */
    public function porNumeroAnio(Request $request)
    {
        $numero = $request->input('numero');
        $anio   = $request->input('anio');

        $sql = "
            SELECT ID, NUMERO, ANIO, ESTADO, CODIGO_REPARTICION_USUARIO, USUARIO_CREADOR, FECHA_CREACION
            FROM EE_GED.EE_EXPEDIENTE_ELECTRONICO
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
     * Buscar GEDOS por Repartición
     */
    public function porReparticion(Request $request)
    {
        $reparticion = $request->input('reparticion');

        $sql = "
            SELECT ID, NUMERO, ANIO, ESTADO, CODIGO_REPARTICION_USUARIO, USUARIO_CREADOR, FECHA_CREACION
            FROM EE_GED.EE_EXPEDIENTE_ELECTRONICO
            WHERE CODIGO_REPARTICION_USUARIO LIKE :codigo
        ";

        $resultados = DB::connection('oracle')->select($sql, [
            'codigo' => "%$reparticion%",
        ]);

        return view('gedos.resultados', compact('resultados'));
    }

    /**
     * Consultar GEDOS bloqueados
     */
    public function bloqueados(Request $request)
    {
        $usuario = $request->input('usuario');

        $sql = "
            SELECT ID, NUMERO, ANIO, ESTADO, BLOQUEADO, USUARIO_BLOQUEO, FECHA_CREACION
            FROM EE_GED.EE_EXPEDIENTE_ELECTRONICO
            WHERE BLOQUEADO = 1
        ";

        $params = [];

        if ($usuario) {
            $sql .= " AND USUARIO_BLOQUEO LIKE :usuario";
            $params['usuario'] = "%$usuario%";
        }

        $resultados = DB::connection('oracle')->select($sql, $params);

        return view('gedos.resultados', compact('resultados'));
    }

    /**
     * Consultar GEDOS por Estado
     */
    public function porEstado(Request $request)
    {
        $estado = $request->input('estado');

        $sql = "
            SELECT ID, NUMERO, ANIO, ESTADO, CODIGO_REPARTICION_USUARIO, USUARIO_CREADOR, FECHA_CREACION
            FROM EE_GED.EE_EXPEDIENTE_ELECTRONICO
            WHERE ESTADO = :estado
        ";

        $resultados = DB::connection('oracle')->select($sql, [
            'estado' => $estado,
        ]);

        return view('gedos.resultados', compact('resultados'));
    }
}
