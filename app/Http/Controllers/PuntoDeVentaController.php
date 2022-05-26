<?php

namespace App\Http\Controllers;

use App\Models\PuntoDeVenta;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PuntoDeVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $datos['puntos_de_venta']=PuntoDeVenta::sortable()->paginate(10);
        return view('puntoDeVenta.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('puntoDeVenta.create');
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
            'nombre' => 'required|string|max:10',
            'prefijo' => 'required|string|max:10',
            'ultimo_numero' => 'required|string|max:10'
        ]);
        $datosPuntoDeVenta = request()->except('_token');
        $datosPuntoDeVenta += ['updated_by' => Auth::user()->id];
        if($request->has('activo')) {
            $datosPuntoDeVenta['activo'] = true;
        }
        else {
            $datosPuntoDeVenta['activo'] = false;
        }
        PuntoDeVenta::insert($datosPuntoDeVenta);
        return redirect('puntoDeVenta');
    }

    /**
     * Display the specified resource.
     *
     * @param PuntoDeVenta $puntoDeVenta
     * @return Response
     */
/*    public function show(PuntoDeVenta $puntoDeVenta)
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
        $puntoDeVenta=PuntoDeVenta::findOrFail($id);
        return view('puntoDeVenta.edit', compact('puntoDeVenta'));
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
            'nombre' => 'required|string|max:10',
            'prefijo' => 'required|string|max:10',
            'ultimo_numero' => 'required|string|max:10'
        ]);
        $datosPuntoDeVenta = request()->except('_token', '_method');
        $datosPuntoDeVenta += ['updated_by' => Auth::user()->id];
        if($request->has('activo')) {
            $datosPuntoDeVenta['activo'] = true;
        }
        else {
            $datosPuntoDeVenta['activo'] = false;
        }
        PuntoDeVenta::where('id','=',$id)->update($datosPuntoDeVenta);
        //$puntoDeVenta = PuntoDeVenta::findOrFail($id);
        return redirect('puntoDeVenta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy($id)
    {
        PuntoDeVenta::destroy($id);
        return redirect('puntoDeVenta');
    }
}
