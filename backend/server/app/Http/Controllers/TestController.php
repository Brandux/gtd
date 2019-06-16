<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Pdo\Oci8\Exceptions\Oci8Exception;
use Yajra\Oci8\Query\OracleBuilder as Builder;
use DB;
use App\test;
class TestController extends Controller
{
    //
    public function test(){
        $user=DB::select('SELECT idgtd_tipo_documento, tdo_nombre
        FROM gtd_tipo_documento
        ORDER BY tdo_nombre');
        //var_dump($user);
        return response()->json($user);
        //return view('welcome',compact('user'));

        // $records = test::all();
        // return response()->json($records);

        //return test::all();
    }
    public function add(Request $request){
        //return test::create($request->all());
        $topic = $request->input('topic');
        $seq = $request->input('seq');
        $info = $request->input('info');

        // $test = new test();

        // $test->topic = $topic;
        // $test->seq = $seq;
        // $test->info = $info;

        // $test->save();

        // return response()->json($test);
        // $dataset = array('column_id' => 1, 'name' => 'Dayle');
        // $column_id = DB::table('users')->insertGetId($dataset,'column_id');

        DB::insert('insert into help (topic, seq, info) values(?, ?, ?)',[$topic, $seq, $info]);
        echo "Record inserted successfully.<br/>";
    }
}
