<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\LoginGtdController;
use App\Http\Data\Auth\AuthData;
use Illuminate\Http\Request;
use Yajra\Pdo\Oci8\Exceptions\Oci8Exception;
use Yajra\Oci8\Query\OracleBuilder as Builder;
use DB;
use App\login;

class LoginGtdController extends Controller{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        // $this->middleware('guest')->except('logout');
    }

    // Logica del negocio

    public function login(){
        $jResponse=[];            
        $params = json_decode(file_get_contents("php://input"));
        $usuario = $params->usuario;
        $clave = $params->clave;
        try{ 
            $data = AuthData::login($usuario, $clave);            
            $jResponse['success'] = true;
            if(count($data)>0){
                $jResponse['message'] = "Succes" ;                    
                $jResponse['data'] = $data;
                $code = "200";
            }else{
                $jResponse['message'] = "The item does not exist";                        
                $jResponse['data'] = [];
                $code = "202";
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