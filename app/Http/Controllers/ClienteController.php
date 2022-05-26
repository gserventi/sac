<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $datos['clientes']=Cliente::sortable()->paginate(10);
        return view('cliente.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('cliente.create');
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
            'nombre' => 'required|string|max:255',
            'cuit' => 'nullable|string|max:11',
            'dias_cobro' => 'nullable|numeric|max:365',
            'email' => 'nullable|email',
            'telefono' => 'nullable|string|max:100',
            'observaciones' => 'nullable|string|max:255'
        ]);
        $cliente = request()->except('_token');
        $cliente += ['updated_by' => Auth::user()->id];
        if($request->has('activo')) {
            $cliente['activo'] = true;
        }
        else {
            $cliente['activo'] = false;
        }
        Cliente::insert($cliente);

        return redirect('cliente');
    }

    /**
     * Display the specified resource.
     *
     * @param Cliente $cliente
     * @return Response
     */
/*    public function show(Cliente $cliente)
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
        $cliente=Cliente::findOrFail($id);
        return view('cliente.edit')
            ->with(compact('cliente'));
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
            'nombre' => 'required|string|max:255',
            'cuit' => 'nullable|string|max:11',
            'dias_cobro' => 'nullable|numeric|max:365',
            'email' => 'nullable|email',
            'telefono' => 'nullable|string|max:100',
            'observaciones' => 'nullable|string|max:255'
        ]);
        $cliente = request()->except('_token', '_method');
        if($request->has('activo')) {
            $cliente['activo'] = true;
        }
        else {
            $cliente['activo'] = false;
        }
        $cliente += ['updated_by' => Auth::user()->id];
        Cliente::where('id','=',$id)->update($cliente);
        //$cliente = Cliente::findOrFail($id);
        return redirect('cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy($id)
    {
        Cliente::destroy($id);
        return redirect('cliente');
    }
}
