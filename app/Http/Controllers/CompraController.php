<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Periodo;
use App\Models\Proveedor;
use App\Models\TipoDeComprobante;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['compras']=Compra::orderBy('id', 'DESC')->sortable()->paginate(10);
        return view('compra.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos['periodos']=Periodo::all();
        $datos['tipos_de_comprobantes']=TipoDeComprobante::all();
        $datos['proveedores']=Proveedor::all();
        return view('compra.create', $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosCompra = request()->except('_token');
        if($request->has('pagada')) {
            $datosCompra['pagada'] = true;
        }
        else {
            $datosCompra['pagada'] = false;
        }
        Compra::insert($datosCompra);
        return redirect('compra');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compra=Compra::findOrFail($id);
        $periodos=Periodo::all();
        $tipos_de_comprobantes=TipoDeComprobante::all();
        $proveedores=Proveedor::all();
        return view('compra.edit')
            ->with(compact('compra'))
            ->with(compact('periodos'))
            ->with(compact('tipos_de_comprobantes'))
            ->with(compact('proveedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosCompra = request()->except('_token', '_method');
        if($request->has('pagada')) {
            $datosCompra['pagada'] = true;
        }
        else {
            $datosCompra['pagada'] = false;
        }
        Compra::where('id','=',$id)->update($datosCompra);
        $compra = Compra::findOrFail($id);
        return redirect('compra');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Compra::destroy($id);
        return redirect('compra');
    }

    public function comprasSinPagar()
    {
        $datos['compras']=Compra::where('pagada','=','0')->orderBy('id', 'DESC')->sortable()->paginate(10);
        return view('compra.index', $datos);
    }

    public function comprasDelMes() {
        $datos['compras']=Compra::whereRaw('month(fecha_comprobante)=month(curdate())')->orderBy('id', 'DESC')->sortable()->paginate(10);
        return view('compra.index', $datos);
    }
}
