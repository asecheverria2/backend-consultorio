<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;

/**
 * Class EspecialidadController
 * @package App\Http\Controllers
 */
class EspecialidadController extends Controller
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
        $especialidads = Especialidad::paginate();
        $this->ecjson=json_encode($especialidads);
        $this->array= (array)json_decode($this->ecjson);
        return $this->ecjson;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        $especialidad = new Especialidad();
        return view('especialidad.create', compact('especialidad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        $especialidad = new Especialidad;
        $especialidad->nombre_esp=$request->input('nombre_esp');
        $especialidad->descrip_esp=$request->input('descrip_esp');
        $especialidad->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $especialidad = Especialidad::find($id);

        $this->ecjson=json_encode($especialidad);
        $this->array= (array)json_decode($this->ecjson);
        return $this->ecjson;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        $especialidad = Especialidad::find($id);

        return view('especialidad.edit', compact('especialidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Especialidad $especialidad
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, Especialidad $especialidad)
    {
        request()->validate(Especialidad::$rules);

        $especialidad->update($request->all());

        return redirect()->route('especialidads.index')
            ->with('success', 'Especialidad updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    /*public function destroy($id)
    {
        $especialidad = Especialidad::find($id)->delete();

    }*/
}
