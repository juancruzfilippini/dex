<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaExpedientesController extends Controller
{
    /**
     * Buscar expediente por número y año
     */
    public function porNumeroAnio(Request $request)
    {
        $numero = $request->input('numero');
        $anio   = $request->input('anio');
        $perPage = 10; // cantidad de filas por página

        $sql = "
            SELECT NUMERO, ANIO, CODIGO_REPARTICION_USUARIO
            FROM EE_GED.EE_EXPEDIENTE_ELECTRONICO
            WHERE NUMERO = :numero
              AND ANIO = :anio
        ";

        $resultados = DB::connection('oracle')->select($sql, [
            'numero' => $numero,
            'anio'   => $anio,
        ]);

        return view('expedientes.resultados', [
            'resultados' => $resultados,
            'perPage'    => $perPage
        ]);
    }

    /**
     * Buscar expedientes por código de repartición
     */
    public function porReparticion(Request $request)
    {
        $reparticion = $request->input('reparticion');
        $perPage = 10;

        $sql = "
            SELECT NUMERO, ANIO, CODIGO_REPARTICION_USUARIO
            FROM EE_GED.EE_EXPEDIENTE_ELECTRONICO
            WHERE CODIGO_REPARTICION_USUARIO LIKE :codigo
        ";

        $resultados = DB::connection('oracle')->select($sql, [
            'codigo' => "%$reparticion%",
        ]);

        return view('expedientes.resultados', [
            'resultados' => $resultados,
            'perPage'    => $perPage
        ]);
    }

    /**
     * Consultar expedientes con documentos asociados
     */
    public function conDocumentos(Request $request)
    {
        $expedienteId = $request->input('expediente_id');
        $perPage = 10;

        $sql = "
            SELECT e.NUMERO, e.ANIO, d.ID_DOCUMENTO, d.POSICION
            FROM EE_GED.EE_EXPEDIENTE_DOCUMENTOS d
            JOIN EE_GED.EE_EXPEDIENTE_ELECTRONICO e
              ON d.ID_EE_DOC = e.ID
            WHERE e.ID = :id
        ";

        $resultados = DB::connection('oracle')->select($sql, [
            'id' => $expedienteId,
        ]);

        return view('expedientes.resultados', [
            'resultados' => $resultados,
            'perPage'    => $perPage
        ]);
    }

    /**
     * Consultar expedientes bloqueados
     */
    public function bloqueados(Request $request)
    {
        $usuario = $request->input('usuario');
        $perPage = 10;

        $sql = "
            SELECT NUMERO, ANIO, BLOQUEADO, USUARIO_BLOQUEO
            FROM EE_GED.EE_EXPEDIENTE_ELECTRONICO
            WHERE BLOQUEADO = 1
        ";

        $params = [];

        if ($usuario) {
            $sql .= " AND USUARIO_BLOQUEO LIKE :usuario";
            $params['usuario'] = "%$usuario%";
        }

        $resultados = DB::connection('oracle')->select($sql, $params);

        return view('expedientes.resultados', [
            'resultados' => $resultados,
            'perPage'    => $perPage
        ]);
    }

    /**
     * Consultar expedientes por solicitante (CUIL/CUIT)
     */
    public function porSolicitante(Request $request)
    {
        $cuil = $request->input('cuil');
        $perPage = 10;

        $sql = "
            SELECT e.NUMERO, e.ANIO, s.NOMBRE, s.CUIT_CUIL
            FROM EE_GED.EE_EXPEDIENTE_ELECTRONICO e
            JOIN EE_GED.EE_SOLICITANTE s
              ON e.SOLICITANTE_ID = s.ID
            WHERE s.CUIT_CUIL = :cuil
        ";

        $resultados = DB::connection('oracle')->select($sql, [
            'cuil' => $cuil,
        ]);

        return view('expedientes.resultados', [
            'resultados' => $resultados,
            'perPage'    => $perPage
        ]);
    }
}
