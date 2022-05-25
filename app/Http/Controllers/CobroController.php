<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cobro;
use App\Models\FormaDePago;
use App\Models\ItemCobro;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CobroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['cobros'] = Cobro::orderBy('id', 'DESC')->sortable()->paginate(10);
        return view('cobro.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos['formas_de_pago']=FormaDePago::all();
        $datos['clientes']=Cliente::all();
        return view('cobro.create', $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fecha_cobro' => 'required',
            'id_cliente' => 'required',
            'id_forma_de_pago' => 'required',
            'total' => 'required'
        ]);

        /* Grabar cabecera de cobro */
        $fecha_cobro = $request->fecha_cobro;
        $id_cliente = $request->id_cliente;
        $id_forma_de_pago = $request->id_forma_de_pago;
        $total = $request->total;
        $id_cobro = Cobro::insertGetId([
            'fecha_cobro' => $fecha_cobro,
            'id_cliente' => $id_cliente,
            'id_forma_de_pago' => $id_forma_de_pago,
            'total' => $total,
            'updated_by' => Auth::user()->id
        ]);

        /* Grabar items de cobro */
        $datosCobro = request()->except('_token');
        $ventas = array_intersect_key($datosCobro, array_flip(preg_grep('/^checkCobrar-\d/i', array_keys($datosCobro))));
        foreach ($ventas as $venta_key => $venta_value) {
            if ($venta_value = "on") {
                $id_venta = substr($venta_key, strpos($venta_key, "-")+1);
                ItemCobro::insert([
                    'id_cobro' => $id_cobro,
                    'id_venta' => $id_venta,
                    'updated_by' => Auth::user()->id
                ]);
                Venta::where('id', '=', $id_venta)->update([
                    'cobrada' => true,
                    'updated_by' => Auth::user()->id
                ]);
            }
        }
        return redirect('cobro');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cobro = Cobro::findOrFail($id);
        $detallesCobro = DB::table('items_cobro')
            ->join('ventas', 'items_cobro.id_venta', '=', 'ventas.id')
            ->select('ventas.id', 'ventas.fecha_comprobante', 'ventas.numero_comprobante', 'ventas.total')
            ->where('id_cobro', '=', $id)
            ->get();
        return view('cobro.show')
            ->with(compact('cobro'))
            ->with(compact('detallesCobro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function edit(Cobro $cobro)
    {
        return redirect('cobro');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cobro $cobro)
    {
        return redirect('cobro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cobro::destroy($id);
        return redirect('cobro');
    }

    public function selectCliente() {
        $datos['clientes'] = Cliente::all();
        return view('cobro.selectCliente', $datos);
    }

    public function crear($idCliente) {
        $datos['formas_de_pago']=FormaDePago::all();
        $datos['cliente']=Cliente::findOrFail($idCliente);
        $datos['ventas']=Venta::where('id_cliente', '=', $idCliente)
            ->where('cobrada', '=', '0')
            ->select('id', 'fecha_comprobante', 'id_punto_de_venta', 'numero_comprobante', 'total')
            ->get();
        return view('cobro.crear', $datos);
    }
}
