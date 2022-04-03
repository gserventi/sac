<?php

namespace App\Http\Controllers;

use App\Models\FormaDePago;
use Illuminate\Http\Request;

class FormaDePagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['formas_de_pago']=FormaDePago::orderBy('nombre')->sortable()->paginate(10);
        return view('formaDePago.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formaDePago.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosFormaDePago = request()->except('_token');
        if($request->has('activo_ventas')) {
            $datosFormaDePago['activo_ventas'] = true;
        }
        else {
            $datosFormaDePago['activo_ventas'] = false;
        }
        if($request->has('activo_compras')) {
            $datosFormaDePago['activo_compras'] = true;
        }
        else {
            $datosFormaDePago['activo_compras'] = false;
        }
        FormaDePago::insert($datosFormaDePago);
        return redirect('formaDePago');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormaDePago  $formaDePago
     * @return \Illuminate\Http\Response
     */
    public function show(FormaDePago $formaDePago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormaDePago  $formaDePago
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formaDePago=FormaDePago::findOrFail($id);
        return view('formaDePago.edit', compact('formaDePago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormaDePago  $formaDePago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosFormaDePago = request()->except('_token', '_method');
        if($request->has('activo_ventas')) {
            $datosFormaDePago['activo_ventas'] = true;
        }
        else {
            $datosFormaDePago['activo_ventas'] = false;
        }
        if($request->has('activo_compras')) {
            $datosFormaDePago['activo_compras'] = true;
        }
        else {
            $datosFormaDePago['activo_compras'] = false;
        }
        FormaDePago::where('id','=',$id)->update($datosFormaDePago);
        $formaDePago = FormaDePago::findOrFail($id);
        return redirect('formaDePago');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormaDePago  $formaDePago
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FormaDePago::destroy($id);
        return redirect('formaDePago');
    }
}
