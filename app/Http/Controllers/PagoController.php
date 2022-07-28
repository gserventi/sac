<?php

namespace App\Http\Controllers;

use App\Models\FormaDePago;
use App\Models\FormaDePagoPorPago;
use App\Models\ItemPago;
use App\Models\Pago;
use App\Models\Compra;
use App\Models\Proveedor;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $datos['pagos']=Pago::sortable()->paginate(10);
        return view('pago.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $datos['formas_de_pago']=FormaDePago::where('activo_compras', '=', true)->orderBy('nombre')->get();
        $datos['proveedores']=Proveedor::where('activo', '=', true)->orderBy('nombre')->get();
        return view('pago.create', $datos);
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
            'fecha_pago' => 'required|date',
            'id_proveedor' => 'required|numeric',
            'pagoTotal' => 'required|numeric',
            'totalPagos' => 'required|numeric'
        ]);

        /* Grabar cabecera de pago */
        $fecha_pago = $request->fecha_pago;
        $id_proveedor = $request->id_proveedor;
        $total = $request->totalPagos;
        $id_pago = Pago::insertGetId([
            'fecha_pago' => $fecha_pago,
            'id_proveedor' => $id_proveedor,
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
        }

        /* Grabar formas de pago */
        $formas_de_pago = $request->formasDePago;
        foreach ($formas_de_pago as $forma_de_pago) {
            FormaDePagoPorPago::insert([
                'id_pago' => $id_pago,
                'id_forma_de_pago' => $forma_de_pago['id'],
                'importe' => $forma_de_pago['importe'],
                'updated_by' => Auth::user()->id
            ]);
        }

        return redirect('pago');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Application|Factory|View|Response
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
        $formasDePago=DB::table('formas_de_pago_por_pago')
            ->join('formas_de_pago', 'formas_de_pago_por_pago.id_forma_de_pago', '=', 'formas_de_pago.id')
            ->select('formas_de_pago.nombre','formas_de_pago_por_pago.importe')
            ->where('formas_de_pago_por_pago.id_pago', '=', $id)
            ->get();
        return view('pago.show')
            ->with(compact('pago'))
            ->with(compact('detallesPago'))
            ->with(compact('formasDePago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View|Response
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
     * @param Request $request
     * @param $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, $id)
    {
        return redirect('pago');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy($id)
    {
        Pago::destroy($id);
        return redirect('pago');
    }

    public function selectProveedor() {
        $datos['proveedores']=Proveedor::where('activo', '=', true)->orderBy('nombre')->get();
        return view('pago.selectProveedor', $datos);
    }

    public function crear($idProveedor)
    {
        $datos['formas_de_pago']=FormaDePago::where('activo_compras', '=', true)->orderBy('nombre')->get();
        $datos['proveedor']=Proveedor::findOrFail($idProveedor);
        $datos['compras']=Compra::where('id_proveedor', '=', $idProveedor)
            ->where('pagada', '=', '0')
            ->select(['id', 'fecha_comprobante', 'id_tipo_comprobante', 'numero_comprobante', 'neto'])
            ->get();
        return view('pago.crear', $datos);
    }

}
