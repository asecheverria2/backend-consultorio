<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * Class EmpleadoController
 * @package App\Http\Controllers
 */
class EmpleadoController extends Controller
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
        $empleados = DB::select('select * from suc_quito.find_empleados ');

        $this->ecjson=json_encode($empleados);
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
        $empleado = new Empleado();
        return view('empleado.create', compact('empleado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$empleado = new Empleado;
        $empleado->nombre_emp=$request->input('nombre_emp');
        $empleado->dir_emp=$request->input('dir_emp');
        $empleado->salario_emp=$request->input('salario_emp');
        $empleado->fecha_ent_emp=$request->input('fecha_ent_emp');
        $empleado->cod_centros=$request->input('cod_centros');
        $empleado->save();*/
        DB::select('SELECT save_empleados(?, ?, ?, ?, ?)', [$request->input('nombre_emp'), $request->input('dir_emp'), $request->input('salario_emp'), $request->input('fecha_ent_emp'), 1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$empleado = Empleado::find($id);
        $empleado = DB::select('select * from find_empleados where cod_emp= ?',[$id]);
        $this->ecjson=json_encode($empleado);
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
        $empleado = Empleado::find($id);

        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Empleado $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        $empleado = DB::select('call update_empleados(?, ?, ?, ?, ?, ?)', [$request->input('nombre_emp'), $request->input('dir_emp'), $request->input('salario_emp'), $request->input('fecha_ent_emp'), 1, $request->input('cod_emp')]);

    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    /*public function destroy($id)
    {
        $empleado = DB::select('call delete_empleados(?)',[$id]);


    }*/
}
