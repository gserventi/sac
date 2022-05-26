<?php

namespace App\Http\Controllers;

use App\Models\PorcentajeIVA;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PorcentajeIVAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $datos['porcentajes_iva']=PorcentajeIVA::sortable()->paginate(10);
        return view('porcentajeIVA.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('porcentajeIVA.create');
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
            'porcentaje' => 'required|numeric'
        ]);
        $datosPorcentajeIVA = request()->except('_token');
        $datosPorcentajeIVA += ['updated_by' => Auth::user()->id];
        if($request->has('activo')) {
            $datosPorcentajeIVA['activo'] = true;
        }
        else {
            $datosPorcentajeIVA['activo'] = false;
        }
        PorcentajeIVA::insert($datosPorcentajeIVA);
        return redirect('porcentajeIVA');
    }

    /**
     * Display the specified resource.
     *
     * @param PorcentajeIVA $porcentajesIVA
     * @return Response
     */
/*    public function show(PorcentajeIVA $porcentajesIVA)
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
        $porcentajeIVA=PorcentajeIVA::findOrFail($id);
        return view('porcentajeIVA.edit', compact('porcentajeIVA'));
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
            'porcentaje' => 'required|numeric'
        ]);
        $porcentajeIVA = request()->except('_token', '_method');
        $porcentajeIVA += ['updated_by' => Auth::user()->id];
        if($request->has('activo')) {
            $porcentajeIVA['activo'] = true;
        }
        else {
            $porcentajeIVA['activo'] = false;
        }
        PorcentajeIVA::where('id','=',$id)->update($porcentajeIVA);
        //$porcentajeIVA = PorcentajeIVA::findOrFail($id);
        return redirect('porcentajeIVA');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy($id)
    {
        PorcentajeIVA::destroy($id);
        return redirect('porcentajeIVA');
    }
}
