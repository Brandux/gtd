<?php

namespace App\Http\Data\Monitoring;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Pdo\Oci8\Exceptions\Oci8Exception;
use Yajra\Oci8\Query\OracleBuilder as Builder;
use DB;

class PendingData extends Controller{
    private $request;

    public function __construct(Request $request) {
        $this ->request = $request;
    }

    public static function listTipoDocumento(){                
        $query = "SELECT idgtd_tipo_documento, tdo_nombre
                    FROM gtd_tipo_documento
                    ORDER BY tdo_nombre ";
        $oQuery = DB::select($query);        
        return $oQuery;
    }
}
