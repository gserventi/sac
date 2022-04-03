<?php

namespace App\Http\Controllers;

use App\Models\Rubro;
use Illuminate\Http\Request;

class RubroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['rubros']=Rubro::orderBy('nombre')->sortable()->paginate(10);
        return view('rubro.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rubro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosRubro = request()->except('_token');
        if($request->has('activo')) {
            $datosRubro['activo'] = true;
        }
        else {
            $datosRubro['activo'] = false;
        }
        Rubro::insert($datosRubro);
        return redirect('rubro');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rubro  $rubro
     * @return \Illuminate\Http\Response
     */
    public function show(Rubro $rubro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rubro  $rubro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rubro=Rubro::findOrFail($id);
        return view('rubro.edit', compact('rubro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rubro  $rubro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosRubro = request()->except('_token', '_method');
        if($request->has('activo')) {
            $datosRubro['activo'] = true;
        }
        else {
            $datosRubro['activo'] = false;
        }
        Rubro::where('id','=',$id)->update($datosRubro);
        $rubro = Rubro::findOrFail($id);
        return redirect('rubro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rubro  $rubro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rubro::destroy($id);
        return redirect('rubro');
    }
}
