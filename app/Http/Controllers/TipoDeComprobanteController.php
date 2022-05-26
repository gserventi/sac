<?php

namespace App\Http\Controllers;

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

class TipoDeComprobanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $datos['tipos_de_comprobantes']=TipoDeComprobante::sortable()->paginate(10);
        return view('tipoDeComprobante.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('tipoDeComprobante.create');
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
            'nombre' => 'required|string|max:100'
        ]);
        $datosTipoDeComprobante = request()->except('_token');
        $datosTipoDeComprobante += ['updated_by' => Auth::user()->id];
        if($request->has('activo')) {
            $datosTipoDeComprobante['activo'] = true;
        }
        else {
            $datosTipoDeComprobante['activo'] = false;
        }
        if($request->has('iva_compras')) {
            $datosTipoDeComprobante['iva_compras'] = true;
        }
        else {
            $datosTipoDeComprobante['iva_compras'] = false;
        }
        TipoDeComprobante::insert($datosTipoDeComprobante);
        return redirect('tipoDeComprobante');
    }

    /**
     * Display the specified resource.
     *
     * @param TipoDeComprobante $tiposDeComprobantes
     * @return Response
     */
/*    public function show(TipoDeComprobante $tiposDeComprobantes)
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
        $tipoDeComprobante=TipoDeComprobante::findOrFail($id);
        return view('tipoDeComprobante.edit', compact('tipoDeComprobante'));
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
            'nombre' => 'required|string|max:100'
        ]);
        $datosTipoDeComprobante = request()->except('_token', '_method');
        $datosTipoDeComprobante += ['updated_by' => Auth::user()->id];
        if($request->has('activo')) {
            $datosTipoDeComprobante['activo'] = true;
        }
        else {
            $datosTipoDeComprobante['activo'] = false;
        }
        if($request->has('iva_compras')) {
            $datosTipoDeComprobante['iva_compras'] = true;
        }
        else {
            $datosTipoDeComprobante['iva_compras'] = false;
        }
        TipoDeComprobante::where('id','=',$id)->update($datosTipoDeComprobante);
        //$tipoDeComprobante = TipoDeComprobante::findOrFail($id);
        return redirect('tipoDeComprobante');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy($id)
    {
        TipoDeComprobante::destroy($id);
        return redirect('tipoDeComprobante');
    }
}
