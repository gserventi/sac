<?php

namespace App\Http\Controllers;

use App\Models\PorcentajeIVA;
use Illuminate\Http\Request;

class PorcentajeIVAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['porcentajes_iva']=PorcentajeIVA::orderBy('porcentaje')->sortable()->paginate(10);
        return view('porcentajeIVA.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('porcentajeIVA.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosPorcentajeIVA = request()->except('_token');
        if($request->has('activo')) {
            $datosPorcentajeIVA['activo'] = true;
        }
        else {
            $datosPorcentajeIVA['activo'] = false;
        }
        PorcentajeIVA::insert($datosPorcentajeIVA);
        return redirect('porcentajeIVA');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PorcentajeIVA  $porcentajesIVA
     * @return \Illuminate\Http\Response
     */
    public function show(PorcentajeIVA $porcentajesIVA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PorcentajeIVA  $porcentajesIVA
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $porcentajeIVA=PorcentajeIVA::findOrFail($id);
        return view('porcentajeIVA.edit', compact('porcentajeIVA'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PorcentajeIVA  $porcentajesIVA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $porcentajeIVA = request()->except('_token', '_method');
        if($request->has('activo')) {
            $porcentajeIVA['activo'] = true;
        }
        else {
            $porcentajeIVA['activo'] = false;
        }
        PorcentajeIVA::where('id','=',$id)->update($porcentajeIVA);
        $porcentajeIVA = PorcentajeIVA::findOrFail($id);
        return redirect('porcentajeIVA');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PorcentajeIVA  $porcentajesIVA
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PorcentajeIVA::destroy($id);
        return redirect('porcentajeIVA');
    }
}
