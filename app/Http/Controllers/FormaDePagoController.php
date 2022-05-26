<?php

namespace App\Http\Controllers;

use App\Models\FormaDePago;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class FormaDePagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $datos['formas_de_pago']=FormaDePago::sortable()->paginate(10);
        return view('formaDePago.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('formaDePago.create');
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
            'nombre' => 'required|string|max:45'
        ]);
        $datosFormaDePago = request()->except('_token');
        $datosFormaDePago += ['updated_by' => Auth::user()->id];
        if($request->has('activo_ventas')) {
            $datosFormaDePago['activo_ventas'] = true;
        }
        else {
            $datosFormaDePago['activo_ventas'] = false;
        }
        if($request->has('activo_compras')) {
            $datosFormaDePago['activo_compras'] = true;
        }
        else {
            $datosFormaDePago['activo_compras'] = false;
        }
        FormaDePago::insert($datosFormaDePago);
        return redirect('formaDePago');
    }

    /**
     * Display the specified resource.
     *
     * @param FormaDePago $formaDePago
     * @return Response
     */
/*    public function show(FormaDePago $formaDePago)
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
        $formaDePago=FormaDePago::findOrFail($id);
        return view('formaDePago.edit', compact('formaDePago'));
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
            'nombre' => 'required|string|max:45'
        ]);
        $datosFormaDePago = request()->except('_token', '_method');
        $datosFormaDePago += ['updated_by' => Auth::user()->id];
        if($request->has('activo_ventas')) {
            $datosFormaDePago['activo_ventas'] = true;
        }
        else {
            $datosFormaDePago['activo_ventas'] = false;
        }
        if($request->has('activo_compras')) {
            $datosFormaDePago['activo_compras'] = true;
        }
        else {
            $datosFormaDePago['activo_compras'] = false;
        }
        FormaDePago::where('id','=',$id)->update($datosFormaDePago);
        //$formaDePago = FormaDePago::findOrFail($id);
        return redirect('formaDePago');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy($id)
    {
        FormaDePago::destroy($id);
        return redirect('formaDePago');
    }
}
