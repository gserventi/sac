<?php

namespace App\Http\Controllers;

use App\Models\Rubro;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RubroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $datos['rubros']=Rubro::sortable()->paginate(10);
        return view('rubro.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('rubro.create');
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
        $datosRubro = request()->except('_token');
        $datosRubro += ['updated_by' => Auth::user()->id];
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
     * @param Rubro $rubro
     * @return Response
     */
/*    public function show(Rubro $rubro)
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
        $rubro=Rubro::findOrFail($id);
        return view('rubro.edit', compact('rubro'));
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
        $datosRubro = request()->except('_token', '_method');
        $datosRubro += ['updated_by' => Auth::user()->id];
        if($request->has('activo')) {
            $datosRubro['activo'] = true;
        }
        else {
            $datosRubro['activo'] = false;
        }
        Rubro::where('id','=',$id)->update($datosRubro);
        //$rubro = Rubro::findOrFail($id);
        return redirect('rubro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy($id)
    {
        Rubro::destroy($id);
        return redirect('rubro');
    }
}
