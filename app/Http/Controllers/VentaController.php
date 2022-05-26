<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Periodo;
use App\Models\PuntoDeVenta;
use App\Models\Venta;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $datos['ventas']=Venta::sortable()->paginate(10);
        return view('venta.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
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
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_periodo' => 'required|numeric',
            'fecha_comprobante' => 'required|date',
            'id_punto_de_venta' => 'nullable|numeric',
            'numero_comprobante' => 'nullable|string|max:45',
            'id_cliente' => 'nullable|numeric',
            'no_gravado' => 'nullable|numeric',
            'gravado' => 'nullable|numeric',
            'iva_21' => 'nullable|numeric',
            'total' => 'nullable|numeric'
        ]);
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
     * @param $id
     * @return Application|Factory|View|Response
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
     * @param $id
     * @return Application|Factory|View|Response
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
     * @param Request $request
     * @param $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_periodo' => 'required|numeric',
            'fecha_comprobante' => 'required|date',
            'id_punto_de_venta' => 'nullable|numeric',
            'numero_comprobante' => 'nullable|string|max:45',
            'id_cliente' => 'nullable|numeric',
            'no_gravado' => 'nullable|numeric',
            'gravado' => 'nullable|numeric',
            'iva_21' => 'nullable|numeric',
            'total' => 'nullable|numeric'
        ]);
        $datosVenta = request()->except('_token', '_method');
        $datosVenta += ['updated_by' => Auth::user()->id];
        if($request->has('cobrada')) {
            $datosVenta['cobrada'] = true;
        }
        else {
            $datosVenta['cobrada'] = false;
        }
        Venta::where('id','=',$id)->update($datosVenta);
        //$venta=Venta::findOrFail($id);
        return redirect('venta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy($id)
    {
        Venta::destroy($id);
        return redirect('venta');
    }

    /**
     * @return Application|Factory|View
     */
    public function ventasSinCobrar() {
        $datos['ventas']=Venta::where('cobrada','=','0')->orderBy('id', 'DESC')->sortable()->paginate(10);
        return view('venta.index', $datos);
    }

    /**
     * @return Application|Factory|View
     */
    public function ventasDelMes() {
        $datos['ventas']=Venta::whereRaw('month(fecha_comprobante)=month(curdate())')->orderBy('id', 'DESC')->sortable()->paginate(10);
        return view('venta.index', $datos);
    }
}
