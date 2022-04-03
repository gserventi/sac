<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\ResumenPeriodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $comprasSinPagar = DB::table('compras')
            ->select('neto')
            ->where('pagada','=','0')
            ->sum('neto');
        $comprasDelMes = DB::table('compras')
            ->select('neto')
            ->whereRaw('month(fecha_comprobante)=month(curdate())')
            ->sum('neto');
        $ventasSinCobrar = DB::table('ventas')
            ->select('total')
            ->where('cobrada','=','0')
            ->sum('total');
        $ventasDelMes = DB::table('ventas')
            ->select('total')
            ->whereRaw('month(fecha_comprobante)=month(curdate())')
            ->sum('total');
        $resumenesPeriodos = DB::table('resumen_periodos')
            ->join('periodos', 'id_periodo', '=', 'periodos.id')
            ->select('periodos.nombre', 'resumen_periodos.total_iva_ventas', 'resumen_periodos.total_iva_compras', 'resumen_periodos.diferencia')
            ->whereRaw('periodos.anio=year(curdate())')
            ->orderBy('periodos.mes')
            ->get();
        return view('home')
            ->with(compact('comprasSinPagar'))
            ->with(compact('comprasDelMes'))
            ->with(compact('ventasSinCobrar'))
            ->with(compact('ventasDelMes'))
            ->with(compact('resumenesPeriodos'));
    }
}
