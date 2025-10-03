<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    private array $cols = [
        'ID_DATO_USUARIO', 'MAIL', 'USUARIO', 'USER_SUPERIOR', 'ID_SECTOR_INTERNO', 'CODIGO_SECTOR_INTERNO',
        'ES_SECRETARIO', 'SECRETARIO', 'APELLIDO_NOMBRE','ACEPTACION_TYC', 'NUMERO_CUIT', 'CARGO',
        'USUARIO_MODIFICACION', 'ID_LOCALIDAD', 'ID_PROVINCIA', 'VALIDAR_POLITICA','ES_EXTRANJERO',
         'ID_SECTOR_ORIGINAL', 'RESETEO_PASS', 'BLOQUEO_LUE', 'USUARIO_APLICACION', 'DEPURABLE',
    ];

    public function index(Request $request)
    {
        $usuario = trim($request->query('usuario', ''));
        $results = collect();

        if ($usuario !== '') {
            $rows = UserModel::query()
                ->select($this->cols) // pedimos todas las columnas
                ->whereRaw('UPPER(USUARIO) = UPPER(?)', [$usuario])
                ->get();

            // 🔧 Normalizamos las claves a MAYÚSCULAS para la vista
            $results = $rows->map(function ($m) {
                $arr  = $m->getAttributes(); // atributos tal cual vienen del driver
                $norm = [];
                foreach ($arr as $k => $v) {
                    // Formateo de fechas si llegan como DateTime
                    if ($v instanceof \DateTimeInterface) {
                        $v = $v->format('Y-m-d H:i:s');
                    }
                    // Cualquier objeto que “se pueda” convertir a string
                    if (is_object($v) && method_exists($v, '__toString')) {
                        $v = (string) $v;
                    }
                    $norm[strtoupper($k)] = $v;
                }
                return $norm; // ← devolvemos un array con claves en MAYÚSCULAS
            });
        }

        return view('User', [
            'usuario' => $usuario,
            'results' => $results,
            'cols'    => $this->cols,
        ]);
    }

    // (opcional) endpoint JSON para depurar rápido
    public function nombrePorUsuario(Request $request)
    {
        $usuario = trim($request->query('usuario', ''));
        if ($usuario === '') {
            return response()->json(['error' => 'Falta ?usuario=...'], 422);
        }

        $row = UserModel::query()
            ->select($this->cols)
            ->whereRaw('UPPER(USUARIO) = UPPER(?)', [$usuario])
            ->first();

        if (!$row) return response()->json(['usuario' => $usuario, 'data' => null]);

        // devolvemos los atributos con claves en MAYÚSCULAS
        $arr = [];
        foreach ($row->getAttributes() as $k => $v) {
            if ($v instanceof \DateTimeInterface) $v = $v->format('Y-m-d H:i:s');
            if (is_object($v) && method_exists($v, '__toString')) $v = (string)$v;
            $arr[strtoupper($k)] = $v;
        }

        return response()->json(['usuario' => $usuario, 'data' => $arr]);
    }
}
