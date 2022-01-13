<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

/**
 * Class MedicoController
 * @package App\Http\Controllers
 */
class MedicoController extends Controller
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
        $medicos = Medico::paginate();

        $this->ecjson=json_encode($medicos);
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
        $medico = new Medico();
        return view('medico.create', compact('medico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medico = new Medico;
        $medico->cod_emp=$request->input('cod_emp');
        $medico->func_med=$request->input('func_med');
        $medico->exp_med=$request->input('exp_med');
        $medico->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medico = Medico::find($id);

        $this->ecjson=json_encode($medico);
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
        $medico = Medico::find($id);

        return view('medico.edit', compact('medico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Medico $medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medico $medico)
    {
        request()->validate(Medico::$rules);

        $medico->update($request->all());

        return redirect()->route('medicos.index')
            ->with('success', 'Medico updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $medico = Medico::find($id)->delete();
    }
}
