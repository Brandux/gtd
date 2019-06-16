<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Pdo\Oci8\Exceptions\Oci8Exception;
use Yajra\Oci8\Query\OracleBuilder as Builder;
use DB;
use App\test;
class TramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=DB::select('SELECT doc.doc_nombre
        FROM gtd_tipo_documento tdoc 
        inner join gtd_documento doc on doc.idgtd_tipo_documento = tdoc.idgtd_tipo_documento
        where tdoc.idgtd_tipo_documento=1
        order by doc.doc_nombre');
        //var_dump($user);
        return response()->json($user);
        //return view('welcome',compact('user'));

        // $records = test::all();
        // return response()->json($records);

        //return test::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
