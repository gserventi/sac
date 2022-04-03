<?php

namespace App\Http\Controllers;

use App\Models\FormaDePago;
use App\Models\ItemPago;
use App\Models\Pago;
use App\Models\Compra;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['pagos']=Pago::orderBy('id', 'DESC')->sortable()->paginate(10);
        return view('pago.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos['formas_de_pago']=FormaDePago::all();
        $datos['proveedores']=Proveedor::all();
        return view('pago.create', $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosPago = request()->except('_token');
        Pago::insert($datosPago);
        return redirect('pago');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Mostrar los items del pago
        $pago=Pago::findOrFail($id);
        $detallesPago=DB::table('items_pago')
            ->join('compras', 'items_pago.id_compra', '=','compras.id')
            ->join('tipos_de_comprobantes','compras.id_tipo_comprobante','=','tipos_de_comprobantes.id')
            ->select('compras.id','compras.fecha_comprobante', 'tipos_de_comprobantes.nombre', 'compras.numero_comprobante', 'compras.neto')
            ->get();
        return view('pago.show')
            ->with(compact('pago'))
            ->with(compact('detallesPago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pago=Pago::findOrFail($id);
        $formas_de_pago=FormaDePago::all()->sortBy('nombre');
        $detallesPago=DB::table('items_pago')
            ->join('compras', 'items_pago.id_compra', '=','compras.id')
            ->join('tipos_de_comprobantes','compras.id_tipo_comprobante','=','tipos_de_comprobantes.id')
            ->select('compras.id','compras.fecha_comprobante', 'tipos_de_comprobantes.nombre', 'compras.numero_comprobante', 'compras.neto')
            ->get();
        return view('pago.edit')
            ->with(compact('pago'))
            ->with(compact('formas_de_pago'))
            ->with(compact('detallesPago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pago=request()->except('_token', '_method');
        Pago::where('id','=',$id)->update($pago);
        $pago = Pago::findOrFail($id);
        return redirect('pago');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pago::destroy($id);
        return redirect('pago');
    }

    public function selectProveedor() {
        $datos['proveedores']=Proveedor::all();
        return view('pago.selectProveedor', $datos);
    }

    public function crear($idProveedor)
    {
        $datos['formas_de_pago']=FormaDePago::all();
        $datos['proveedor']=Proveedor::findOrFail($idProveedor);
        $datos['compras']=Compra::where('id_proveedor', '=', $idProveedor)
            ->where('pagada', '=', '0')
            ->select('id', 'fecha_comprobante', 'id_tipo_comprobante', 'numero_comprobante', 'neto')
            ->get();
        return view('pago.crear', $datos);
    }

}
