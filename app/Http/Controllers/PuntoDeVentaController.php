<?php

namespace App\Http\Controllers;

use App\Models\PuntoDeVenta;
use Illuminate\Http\Request;

class PuntoDeVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['puntos_de_venta']=PuntoDeVenta::orderBy('nombre')->sortable()->paginate(10);
        return view('puntoDeVenta.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('puntoDeVenta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosPuntoDeVenta = request()->except('_token');
        if($request->has('activo')) {
            $datosPuntoDeVenta['activo'] = true;
        }
        else {
            $datosPuntoDeVenta['activo'] = false;
        }
        PuntoDeVenta::insert($datosPuntoDeVenta);
        return redirect('puntoDeVenta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PuntoDeVenta  $puntoDeVenta
     * @return \Illuminate\Http\Response
     */
    public function show(PuntoDeVenta $puntoDeVenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PuntoDeVenta  $puntoDeVenta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $puntoDeVenta=PuntoDeVenta::findOrFail($id);
        return view('puntoDeVenta.edit', compact('puntoDeVenta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PuntoDeVenta  $puntoDeVenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosPuntoDeVenta = request()->except('_token', '_method');
        if($request->has('activo')) {
            $datosPuntoDeVenta['activo'] = true;
        }
        else {
            $datosPuntoDeVenta['activo'] = false;
        }
        PuntoDeVenta::where('id','=',$id)->update($datosPuntoDeVenta);
        $puntoDeVenta = PuntoDeVenta::findOrFail($id);
        return redirect('puntoDeVenta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PuntoDeVenta  $puntoDeVenta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PuntoDeVenta::destroy($id);
        return redirect('puntoDeVenta');
    }
}
