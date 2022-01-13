<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use Illuminate\Http\Request;

/**
 * Class CentroController
 * @package App\Http\Controllers
 */
class CentroController extends Controller
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
        $centro = Centro::paginate();

        /*return view('centro.index', compact('centros'))
            ->with('i', (request()->input('page', 1) - 1) * $centros->perPage());*/
        $this->ecjson=json_encode($centro);
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
        $centro = new Centro();
        return view('centro.create', compact('centro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*request()->validate(Centro::$rules);

        $centro = Centro::create($request->all());*/
        $centro = new Centro;
        $centro->nombre_centros=$request->input('nombre_centros');
        $centro->dir_centros=$request->input('dir_centros');
        $centro->tel_centros=$request->input('tel_centros');
        $centro->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $centro = Centro::find($id);

        $this->ecjson=json_encode($centro);
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
        $centro = Centro::find($id);

        return view('centro.edit', compact('centro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Centro $centro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Centro $centro)
    {
        request()->validate(Centro::$rules);

        $centro->update($request->all());

        return redirect()->route('centros.index')
            ->with('success', 'Centro updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $centro = Centro::find($id)->delete();

    }
}
