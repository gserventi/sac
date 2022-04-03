<?php

namespace App\Http\Controllers;

use App\Models\TipoDeComprobante;
use Illuminate\Http\Request;

class TipoDeComprobanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['tipos_de_comprobantes']=TipoDeComprobante::orderBy('nombre')->sortable()->paginate(10);
        return view('tipoDeComprobante.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoDeComprobante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosTipoDeComprobante = request()->except('_token');
        if($request->has('activo')) {
            $datosTipoDeComprobante['activo'] = true;
        }
        else {
            $datosTipoDeComprobante['activo'] = false;
        }
        if($request->has('iva_compras')) {
            $datosTipoDeComprobante['iva_compras'] = true;
        }
        else {
            $datosTipoDeComprobante['iva_compras'] = false;
        }
        TipoDeComprobante::insert($datosTipoDeComprobante);
        return redirect('tipoDeComprobante');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoDeComprobante  $tiposDeComprobantes
     * @return \Illuminate\Http\Response
     */
    public function show(TipoDeComprobante $tiposDeComprobantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoDeComprobante  $tiposDeComprobantes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoDeComprobante=TipoDeComprobante::findOrFail($id);
        return view('tipoDeComprobante.edit', compact('tipoDeComprobante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoDeComprobante  $tiposDeComprobantes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosTipoDeComprobante = request()->except('_token', '_method');
        if($request->has('activo')) {
            $datosTipoDeComprobante['activo'] = true;
        }
        else {
            $datosTipoDeComprobante['activo'] = false;
        }
        if($request->has('iva_compras')) {
            $datosTipoDeComprobante['iva_compras'] = true;
        }
        else {
            $datosTipoDeComprobante['iva_compras'] = false;
        }
        TipoDeComprobante::where('id','=',$id)->update($datosTipoDeComprobante);
        $tipoDeComprobante = TipoDeComprobante::findOrFail($id);
        return redirect('tipoDeComprobante');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoDeComprobante  $tiposDeComprobantes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoDeComprobante::destroy($id);
        return redirect('tipoDeComprobante');
    }
}
