<?php

namespace App\Http\Controllers;

use App\Models\FormaDePago;
use App\Models\PorcentajeIVA;
use App\Models\Proveedor;
use App\Models\Rubro;
use App\Models\TipoDeComprobante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $datos['rubros']=Rubro::where('activo', '=', true)->orderBy('nombre')->get();
        $datos['porcentajes_iva']=PorcentajeIVA::where('activo', '=', true)->orderBy('porcentaje')->get();
        $datos['formas_de_pago']=FormaDePago::where('activo_ventas', '=', true)->orderBy('nombre')->get();
        $datos['tipos_de_comprobantes']=TipoDeComprobante::where('activo', '=', true)->orderBy('nombre')->get();
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
        $proveedor += ['updated_by' => Auth::user()->id];
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
        $rubros=Rubro::where('activo', '=', true)->orderBy('nombre')->get();
        $porcentajes_iva=PorcentajeIVA::where('activo', '=', true)->orderBy('porcentaje')->get();
        $formas_de_pago=FormaDePago::where('activo_ventas', '=', true)->orderBy('nombre')->get();
        $tipos_de_comprobantes=TipoDeComprobante::where('activo', '=', true)->orderBy('nombre')->get();
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
        $proveedor += ['updated_by' => Auth::user()->id];
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
