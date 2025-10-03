<?php

namespace App\Models;

use Yajra\Oci8\Eloquent\OracleEloquent as Model;

class UserModel extends Model
{
    protected $connection = 'oracle';
    protected $table = 'CO_GED.DATOS_USUARIO';
    protected $primaryKey = 'ID_DATO_USUARIO';
    public $incrementing = false;
    public $timestamps = false;

    // Opcional: podés abrir todo con guarded vacío
    protected $guarded = [];
}

