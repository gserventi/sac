<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Periodo;
use App\Models\Proveedor;
use App\Models\TipoDeComprobante;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $datos['compras']=Compra::sortable()->paginate(10);
        return view('compra.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $datos['periodos']=Periodo::where('cerrado', '=', false)->orderBy('mes', 'DESC')->get();
        $datos['tipos_de_comprobantes']=TipoDeComprobante::where('activo', '=', true)->orderBy('nombre')->get();
        $datos['proveedores']=Proveedor::where('activo', '=', true)->orderBy('nombre')->get();
        return view('compra.create', $datos);
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
            'id_tipo_comprobante' => 'required|numeric',
            'numero_comprobante' => 'required|string|max:255',
            'id_proveedor' => 'required|numeric',
            'exento' => 'nullable|numeric',
            'no_gravado' => 'nullable|numeric',
            'gravado' => 'nullable|numeric',
            'iva_21' => 'nullable|numeric',
            'iva_27' => 'nullable|numeric',
            'iva_105' => 'nullable|numeric',
            'percepcion_iva_RG3337_3' => 'nullable|numeric',
            'percepcion_iva_RG3337_105' => 'nullable|numeric',
            'percepcion_iibb_caba_15' => 'nullable|numeric',
            'percepcion_iibb_ba_01' => 'nullable|numeric',
            'neto' => 'nullable|numeric'
        ]);
        $datosCompra = request()->except('_token');
        $datosCompra += ['updated_by' => Auth::user()->id];
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
     * @param Compra $compra
     * @return Response
     */
/*    public function show(Compra $compra)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View|Response
     */
    public function edit($id)
    {
        $compra=Compra::findOrFail($id);
        $periodos=Periodo::where('cerrado', '=', false)->orderBy('mes', 'DESC')->get();
        $tipos_de_comprobantes=TipoDeComprobante::where('activo', '=', true)->orderBy('nombre')->get();
        $proveedores=Proveedor::where('activo', '=', true)->orderBy('nombre')->get();
        return view('compra.edit')
            ->with(compact('compra'))
            ->with(compact('periodos'))
            ->with(compact('tipos_de_comprobantes'))
            ->with(compact('proveedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Application|RedirectResponse|Response|Redirector
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_periodo' => 'required|numeric',
            'fecha_comprobante' => 'required|date',
            'id_tipo_comprobante' => 'required|numeric',
            'numero_comprobante' => 'required|string|max:255',
            'id_proveedor' => 'required|numeric',
            'exento' => 'nullable|numeric',
            'no_gravado' => 'nullable|numeric',
            'gravado' => 'nullable|numeric',
            'iva_21' => 'nullable|numeric',
            'iva_27' => 'nullable|numeric',
            'iva_105' => 'nullable|numeric',
            'percepcion_iva_RG3337_3' => 'nullable|numeric',
            'percepcion_iva_RG3337_105' => 'nullable|numeric',
            'percepcion_iibb_caba_15' => 'nullable|numeric',
            'percepcion_iibb_ba_01' => 'nullable|numeric',
            'neto' => 'nullable|numeric'
        ]);
        $datosCompra = request()->except('_token', '_method');
        $datosCompra += ['updated_by' => Auth::user()->id];
        if($request->has('pagada')) {
            $datosCompra['pagada'] = true;
        }
        else {
            $datosCompra['pagada'] = false;
        }
        Compra::where('id','=',$id)->update($datosCompra);
        //$compra = Compra::findOrFail($id);
        return redirect('compra');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy($id)
    {
        Compra::destroy($id);
        return redirect('compra');
    }

    /**
     * Detalle de compras sin pagar
     *
     * @return Application|Factory|View
     */
    public function comprasSinPagar()
    {
        $datos['compras']=Compra::where('pagada','=','0')->orderBy('id', 'DESC')->sortable()->paginate(10);
        return view('compra.index', $datos);
    }

    /**
     * Detalle de compras del mes actual
     *
     * @return Application|Factory|View
     */
    public function comprasDelMes() {
        $datos['compras']=Compra::whereRaw('month(fecha_comprobante)=month(curdate())')->orderBy('id', 'DESC')->sortable()->paginate(10);
        return view('compra.index', $datos);
    }
}
