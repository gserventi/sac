<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cobro;
use App\Models\FormaDePago;
use App\Models\ItemCobro;
use App\Models\Venta;
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

class CobroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $datos['cobros'] = Cobro::sortable()->paginate(10);
        return view('cobro.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
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
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fecha_cobro' => 'required|date',
            'id_cliente' => 'required|numeric',
            'id_forma_de_pago' => 'required|numeric',
            'total' => 'required|numeric'
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
     * @param $id
     * @return Application|Factory|View|Response
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
     * @param Cobro $cobro
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function edit(Cobro $cobro)
    {
        return redirect('cobro');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Cobro $cobro
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, Cobro $cobro)
    {
        return redirect('cobro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy($id)
    {
        Cobro::destroy($id);
        return redirect('cobro');
    }

    /**
     * Seleccionar el cliente para el cobro
     *
     * @return Application|Factory|View
     */
    public function selectCliente() {
        $datos['clientes'] = Cliente::where('activo', '=', true)->orderBy('nombre')->get();
        return view('cobro.selectCliente', $datos);
    }

    /**
     * Crear un nuevo cobro
     *
     * @param $idCliente
     * @return Application|Factory|View
     */
    public function crear($idCliente) {
        $datos['formas_de_pago']=FormaDePago::where('activo_ventas', '=', true)->orderBy('nombre')->get();
        $datos['cliente']=Cliente::findOrFail($idCliente);
        $datos['ventas']=Venta::where('id_cliente', '=', $idCliente)
            ->where('cobrada', '=', '0')
            ->select(['id', 'fecha_comprobante', 'id_punto_de_venta', 'numero_comprobante', 'total'])
            ->get();
        return view('cobro.crear', $datos);
    }
}
