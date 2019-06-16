<?php

namespace App\Http\Data\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Pdo\Oci8\Exceptions\Oci8Exception;
use Yajra\Oci8\Query\OracleBuilder as Builder;
use DB;

class AuthData extends Controller{
    private $request;

    public function __construct(Request $request) {
        $this ->request = $request;
    }

    public static function login($usuario, $clave){                
        $query = "

        SELECT 
        usu.idgtd_persona AS ID_PERSONA, usu.usu_usuario AS USUARIO,
        rol.idgtd_rol AS ID_ROL , rol.rol_nombre AS ROL,
        ed.idgtd_entidad AS ID_ENTIDAD,  ed.ent_nombre AS ENTIDAD
        FROM GTD_USUARIO USU 
        INNER JOIN GTD_PERSONA PER ON per.idgtd_persona = usu.idgtd_persona
        INNER JOIN GTD_ENTIDAD ED ON ed.idgtd_entidad = per.idgtd_entidad
        INNER JOIN gtd_rol_usuario ro_u on ro_u.idgtd_persona =  usu.idgtd_persona
        INNER JOIN GTD_ROL ROL ON rol.idgtd_rol = ro_u.idgtd_rol
        WHERE USU.usu_usuario =   '" . $usuario ."'
        and usu.usu_password = '" . $clave ."'
        and usu.estado = '1'
        ";
        $oQuery = DB::select($query);        
        return $oQuery;
    }
}
