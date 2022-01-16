<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * Class ConsultaController
 * @package App\Http\Controllers
 */
class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $ecjson;
    public $array= array();
    public function index()
    {
        $consultas = DB::select('select * from suc_quito.find_consultas ');

        $this->ecjson=json_encode($consultas);
        $this->array= (array)json_decode($this->ecjson);
        return $this->ecjson;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consulta = new Consulta();
        return view('consulta.create', compact('consulta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$consulta = new Consulta;
        $consulta->cod_centros=$request->input('cod_centros');
        $consulta->cod_emp=$request->input('cod_emp');
        $consulta->cod_esp=$request->input('cod_esp');
        $consulta->fecha_con=$request->input('fecha_con');
        $consulta->hora_con=$request->input('hora_con');
        $consulta->paciente_con=$request->input('paciente_con');
        $consulta->save();*/
        DB::select('SELECT save_consultas(?, ?, ?, ?, ?, ?)', [1, $request->input('cod_emp'), $request->input('cod_esp'), $request->input('fecha_con'), $request->input('hora_con'), $request->input('paciente_con'), ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$consulta = Consulta::find($id);
        $consulta = DB::select('select * from suc_quito.find_consultas where cod_con= ?',[$id]);
        $this->ecjson=json_encode($consulta);
        $this->array= (array)json_decode($this->ecjson);
        return $this->ecjson;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consulta = Consulta::find($id);

        return view('consulta.edit', compact('consulta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Consulta $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $consulta = DB::select('call update_consultas(?, ?, ?, ?, ?, ?, ?)',[1, $request->input('cod_emp'), $request->input('cod_esp'), $request->input('fecha_con'), $request->input('hora_con'), $request->input('paciente_con'), $request->input('cod_con')]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $consulta = DB::select('call suc_quito.delete_consultas(?)',[$id]);
    }
}
