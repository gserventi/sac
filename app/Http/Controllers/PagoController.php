<?php

namespace App\Http\Controllers;

use App\Models\FormaDePago;
use App\Models\ItemPago;
use App\Models\Pago;
use App\Models\Compra;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $this->validate($request, [
            'fecha_pago' => 'required',
            'id_proveedor' => 'required',
            'id_forma_de_pago' => 'required',
            'total' => 'required'
        ]);

        /* Grabar cabecera de pago */
        $fecha_pago = $request->fecha_pago;
        $id_proveedor = $request->id_proveedor;
        $id_forma_de_pago = $request->id_forma_de_pago;
        $total = $request->total;
        $id_pago = Pago::insertGetId([
            'fecha_pago' => $fecha_pago,
            'id_proveedor' => $id_proveedor,
            'id_forma_de_pago' => $id_forma_de_pago,
            'total' => $total,
            'updated_by' => Auth::user()->id
        ]);

        /* Grabar items de pago */
        $datosPago = request()->except('_token');
        $compras = array_intersect_key($datosPago, array_flip(preg_grep('/^checkPagar-\d/i', array_keys($datosPago))));
        foreach ($compras as $compra_key => $compra_value) {
            if ($compra_value = "on") {
                $id_compra = substr($compra_key, strpos($compra_key, "-")+1);
                ItemPago::insert([
                    'id_pago' => $id_pago,
                    'id_compra' => $id_compra,
                    'updated_by' => Auth::user()->id
                ]);
                Compra::where('id', '=', $id_compra)->update([
                    'pagada' => true,
                    'updated_by' => Auth::user()->id
                ]);

            }
        };

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
            ->where('id_pago', '=', $id)
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
            ->where('id_pago', '=', $id)
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
