<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use App\Models\ResumenPeriodo;
use DateTime;
use DateTimeZone;
use Exception;
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

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $datos['periodos']=Periodo::sortable()->paginate(10);
        return view('periodo.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('periodo.create');
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
            'mes' => 'required|numeric',
            'anio' => 'required|numeric',
            'nombre' => 'required|string|max:45'
        ]);
        $datosPeriodo = request()->except('_token');
        $datosPeriodo += ['updated_by' => Auth::user()->id];
        if($request->has('cerrado')) {
            $datosPeriodo['cerrado'] = true;
        }
        else {
            $datosPeriodo['cerrado'] = false;
        }
        setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
        $datosPeriodo['mes']=date('m',strtotime($datosPeriodo['nombre']));
        $datosPeriodo['anio']=date('Y',strtotime($datosPeriodo['nombre']));
        $datosPeriodo['nombre']=ucfirst(strftime('%B',strtotime($datosPeriodo['nombre']))) . ' ' . $datosPeriodo['anio'];
        Periodo::insert($datosPeriodo);
        return redirect('periodo');
    }

    /**
     * Display the specified resource.
     *
     * @param Periodo $periodo
     * @return Response
     */
/*    public function show(Periodo $periodo)
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
        $periodo=Periodo::findOrFail($id);
        return view('periodo.edit', compact('periodo'));
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
        $this->validate($request, [
            'mes' => 'required|numeric',
            'anio' => 'required|numeric',
            'nombre' => 'required|string|max:45'
        ]);
        $datosPeriodo = request()->except('_token', '_method');
        $datosPeriodo += ['updated_by' => Auth::user()->id];
        if($request->has('cerrado')) {
            $datosPeriodo['cerrado'] = true;
        }
        else {
            $datosPeriodo['cerrado'] = false;
        }
        Periodo::where('id','=',$id)->update($datosPeriodo);
        //$periodo = Periodo::findOrFail($id);
        return redirect('periodo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy($id)
    {
        Periodo::destroy($id);
        return redirect('periodo');
    }

    /**
     * Cerrar un periodo para que no se puedan ingresar mas comprobantes
     *
     * @param $id
     * @return Application|RedirectResponse|Redirector
     * @throws Exception
     */
    public function cerrar($id)
    {
        $periodo=Periodo::findOrFail($id);
        $curTime=new DateTime('now', new DateTimeZone('America/Argentina/Buenos_Aires'));
        if ($periodo->cerrado == 0) {
            Periodo::where('id','=',$id)->update([
                'cerrado' => 1,
                'fecha_cierre' => $curTime,
                'updated_by' => Auth::user()->id
            ]);
            $totalVentasPeriodo = DB::table('ventas')
                ->select('total')
                ->where('id_periodo', '=', $id)
                ->sum('total');
            $totalComprasPeriodo = DB::table('compras')
                ->select('neto')
                ->where('id_periodo', '=', $id)
                ->sum('neto');
            ResumenPeriodo::insert([
                'id_periodo' => $id,
                'total_iva_ventas' => $totalVentasPeriodo,
                'total_iva_compras' => $totalComprasPeriodo,
                'diferencia' => $totalVentasPeriodo - $totalComprasPeriodo,
                'updated_by' => Auth::user()->id
            ]);
        }
        return redirect('periodo');
    }
}
