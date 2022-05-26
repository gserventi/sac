<?php

namespace App\Http\Controllers;

use App\Models\FormaDePago;
use App\Models\PorcentajeIVA;
use App\Models\Proveedor;
use App\Models\Rubro;
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

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $datos['proveedores']=Proveedor::sortable()->paginate(10);
        return view('proveedor.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
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
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:200',
            'cuit' => 'nullable|string|max:11',
            'email' => 'nullable|email',
            'telefono' => 'nullable|string|max:100',
            'id_rubro' => 'numeric',
            'dias_pago' => 'nullable|numeric|max:365',
            'id_porcentaje_iva' => 'nullable|numeric',
            'id_forma_de_pago_default' => 'nullable|numeric',
            'id_tipo_comprobante' => 'nullable|numeric',
            'observaciones' => 'nullable|string|max:255'
        ]);
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
     * @param Proveedor $proveedor
     * @return Response
     */
/*    public function show(Proveedor $proveedor)
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
     * @param Request $request
     * @param $id
     * @return Application|RedirectResponse|Response|Redirector
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:200',
            'cuit' => 'nullable|string|max:11',
            'email' => 'nullable|email',
            'telefono' => 'nullable|string|max:100',
            'id_rubro' => 'numeric',
            'dias_pago' => 'nullable|numeric|max:365',
            'id_porcentaje_iva' => 'nullable|numeric',
            'id_forma_de_pago_default' => 'nullable|numeric',
            'id_tipo_comprobante' => 'nullable|numeric',
            'observaciones' => 'nullable|string|max:255'
        ]);
        $proveedor = request()->except('_token', '_method');
        $proveedor += ['updated_by' => Auth::user()->id];
        if($request->has('activo')) {
            $proveedor['activo'] = true;
        }
        else {
            $proveedor['activo'] = false;
        }
        Proveedor::where('id','=',$id)->update($proveedor);
        //$proveedor = Proveedor::findOrFail($id);
        return redirect('proveedor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy($id)
    {
        Proveedor::destroy($id);
        return redirect('proveedor');
    }
}
