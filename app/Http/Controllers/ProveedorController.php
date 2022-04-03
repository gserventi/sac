<?php

namespace App\Http\Controllers;

use App\Models\FormaDePago;
use App\Models\PorcentajeIVA;
use App\Models\Proveedor;
use App\Models\Rubro;
use App\Models\TipoDeComprobante;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['proveedores']=Proveedor::orderBy('nombre')->sortable()->paginate(10);
        return view('proveedor.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos['rubros']=Rubro::all();
        $datos['porcentajes_iva']=PorcentajeIVA::all();
        $datos['formas_de_pago']=FormaDePago::all();
        $datos['tipos_de_comprobantes']=TipoDeComprobante::all();
        return view('proveedor.create',$datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedor = request()->except('_token');
        if($request->has('activo')) {
            $proveedor['activo'] = true;
        }
        else {
            $proveedor['activo'] = false;
        }
        Proveedor::insert($proveedor);
        return redirect('proveedor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor=Proveedor::findOrFail($id);
        $rubros=Rubro::all()->sortBy('nombre');
        $porcentajes_iva=PorcentajeIVA::all()->sortBy('porcentaje');
        $formas_de_pago=FormaDePago::all()->sortBy('nombre');
        $tipos_de_comprobantes=TipoDeComprobante::all()->sortBy('nombre');
        return view('proveedor.edit')
            ->with(compact('proveedor'))
            ->with(compact('rubros'))
            ->with(compact('porcentajes_iva'))
            ->with(compact('formas_de_pago'))
            ->with(compact('tipos_de_comprobantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proveedor = request()->except('_token', '_method');
        if($request->has('activo')) {
            $proveedor['activo'] = true;
        }
        else {
            $proveedor['activo'] = false;
        }
        Proveedor::where('id','=',$id)->update($proveedor);
        $proveedor = Proveedor::findOrFail($id);
        return redirect('proveedor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proveedor::destroy($id);
        return redirect('proveedor');
    }
}
