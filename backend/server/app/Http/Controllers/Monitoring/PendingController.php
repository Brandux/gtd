<?php

namespace App\Http\Controllers\Monitoring;

use App\Http\Controllers\Controller;
use App\Http\Data\Monitoring\PendingData;
use Illuminate\Http\Request;
use Yajra\Pdo\Oci8\Exceptions\Oci8Exception;
use Yajra\Oci8\Query\OracleBuilder as Builder;
use DB;
use App\C_listTipoDocumento;
use App\login;

class PendingController extends Controller {
    
    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }

    public function C_listTipoDocumento(){
        $jResponse=[];            
        try{     
            $data = PendingData::listTipoDocumento();                
            $jResponse['success'] = true;
            if(count($data)>0){
                $jResponse['message'] = "Correcto";
                $jResponse['data'] = $data;
                $code = "200";
            }else{
                $jResponse['message'] = "The item does not exist";                        
                $jResponse['data'] = [];
                $code = "200";
            }
        }catch(Exception $e){
            $jResponse['success'] = false;
            $jResponse['message'] = $e->getMessage();
            $jResponse['data'] = [];
            $code = "202";
        } 
        return response()->json($jResponse,$code);
    }

    
}