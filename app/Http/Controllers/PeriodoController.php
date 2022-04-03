<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use App\Models\ResumenPeriodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['periodos']=Periodo::orderBy('id', 'DESC')->sortable()->paginate(10);
        return view('periodo.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periodo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosPeriodo = request()->except('_token');
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
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function show(Periodo $periodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $periodo=Periodo::findOrFail($id);
        return view('periodo.edit', compact('periodo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosPeriodo = request()->except('_token', '_method');
        if($request->has('cerrado')) {
            $datosPeriodo['cerrado'] = true;
        }
        else {
            $datosPeriodo['cerrado'] = false;
        }
        Periodo::where('id','=',$id)->update($datosPeriodo);
        $periodo = Periodo::findOrFail($id);
        return redirect('periodo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Periodo::destroy($id);
        return redirect('periodo');
    }

    public function cerrar($id)
    {
        $periodo=Periodo::findOrFail($id);
        $curTime=new \DateTime('now', new \DateTimeZone('America/Argentina/Buenos_Aires'));
        if ($periodo->cerrado == 0) {
            Periodo::where('id','=',$id)->update([
                'cerrado' => 1,
                'fecha_cierre' => $curTime
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
                'diferencia' => $totalVentasPeriodo - $totalComprasPeriodo
            ]);
        }
        return redirect('periodo');
    }
}
