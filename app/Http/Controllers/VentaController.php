<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Periodo;
use App\Models\PuntoDeVenta;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['ventas']=Venta::orderBy('id', 'DESC')->sortable()->paginate(10);
        return view('venta.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos['periodos']=Periodo::where('cerrado', '=', false)->orderBy('mes', 'DESC')->get();
        $datos['puntos_de_venta']=PuntoDeVenta::where('activo', '=', true)->orderBy('nombre')->get();
        $datos['clientes']=Cliente::where('activo', '=', true)->orderBy('nombre')->get();
        return view('venta.create', $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosVenta = request()->except('_token');
        $datosVenta += ['updated_by' => Auth::user()->id];
        if($request->has('cobrada')) {
            $datosVenta['cobrada'] = true;
        }
        else {
            $datosVenta['cobrada'] = false;
        }
        Venta::insert($datosVenta);
        $puntoDeVenta = PuntoDeVenta::findOrFail($datosVenta['id_punto_de_venta']);
        $puntoDeVenta->ultimo_numero = $puntoDeVenta->ultimo_numero + 1;
        PuntoDeVenta::where('id', '=', $datosVenta['id_punto_de_venta'])->update($puntoDeVenta);
        return redirect('venta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta=Venta::findOrFail($id);
        $periodos=Periodo::all();
        $puntos_de_venta=PuntoDeVenta::all();
        $clientes=Cliente::all();
        return view('venta.show')
            ->with(compact('venta'))
            ->with(compact('periodos'))
            ->with(compact('puntos_de_venta'))
            ->with(compact('clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venta=Venta::findOrFail($id);
        $periodos=Periodo::where('cerrado', '=', false)->orderBy('mes', 'DESC')->get();
        $puntos_de_venta=PuntoDeVenta::where('activo', '=', true)->orderBy('nombre')->get();
        $clientes=Cliente::where('activo', '=', true)->orderBy('nombre')->get();
        return view('venta.edit')
            ->with(compact('venta'))
            ->with(compact('periodos'))
            ->with(compact('puntos_de_venta'))
            ->with(compact('clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosVenta = request()->except('_token', '_method');
        $datosVenta += ['updated_by' => Auth::user()->id];
        if($request->has('cobrada')) {
            $datosVenta['cobrada'] = true;
        }
        else {
            $datosVenta['cobrada'] = false;
        }
        Venta::where('id','=',$id)->update($datosVenta);
        $venta=Venta::findOrFail($id);
        return redirect('venta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Venta::destroy($id);
        return redirect('venta');
    }

    public function ventasSinCobrar() {
        $datos['ventas']=Venta::where('pagada','=','0')->orderBy('id', 'DESC')->sortable()->paginate(10);
        return view('venta.index', $datos);
    }

    public function ventasDelMes() {
        $datos['ventas']=Venta::whereRaw('month(fecha_comprobante)=month(curdate())')->orderBy('id', 'DESC')->sortable()->paginate(10);
        return view('venta.index', $datos);
    }
}
