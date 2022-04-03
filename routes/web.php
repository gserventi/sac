<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['middleware' => ['auth']], function() {
    Route::get('pago/crear/{id}', [\App\Http\Controllers\PagoController::class, 'crear'])->name('pago.crear');
    Route::get('pago/selectProveedor', [\App\Http\Controllers\PagoController::class, 'selectProveedor'])->name('pago.selectProveedor');

    Route::get('compra/comprasSinPagar', [\App\Http\Controllers\CompraController::class, 'comprasSinPagar'])->name('compra.comprasSinPagar');
    Route::get('compra/comprasDelMes', [\App\Http\Controllers\CompraController::class, 'comprasDelMes'])->name('compra.comprasDelMes');

    Route::get('venta/ventasSinCobrar', [\App\Http\Controllers\VentaController::class, 'ventasSinCobrar'])->name('venta.ventasSinCobrar');
    Route::get('venta/ventasDelMes',[\App\Http\Controllers\VentaController::class, 'ventasDelMes'])->name('venta.ventasDelMes');

    Route::resource('rubro',\App\Http\Controllers\RubroController::class);
    Route::resource('porcentajeIVA', \App\Http\Controllers\PorcentajeIVAController::class);
    Route::resource('tipoDeComprobante', \App\Http\Controllers\TipoDeComprobanteController::class);
    Route::resource('formaDePago',\App\Http\Controllers\FormaDePagoController::class);
    Route::resource('proveedor',\App\Http\Controllers\ProveedorController::class);
    Route::resource('periodo',\App\Http\Controllers\PeriodoController::class);
    Route::resource('compra',\App\Http\Controllers\CompraController::class);
    Route::resource('pago', \App\Http\Controllers\PagoController::class);
    Route::resource('puntoDeVenta', \App\Http\Controllers\PuntoDeVentaController::class);
    Route::resource('cliente', \App\Http\Controllers\ClienteController::class);
    Route::resource('resumenPeriodo', \App\Http\Controllers\ResumenPeriodoController::class);

    Route::get('periodo/cerrar/{id}',[\App\Http\Controllers\PeriodoController::class, 'cerrar'])->name('periodo.cerrar');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

