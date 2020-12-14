<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models;


class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $pedido = Pedido::where('cliente_id', 'LIKE', "%$keyword%")
                ->orWhere('direccion_Envio', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pedido = Pedido::latest()->paginate($perPage);
        }

        return view('pedido.index', compact('pedido'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pedido.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Pedido::create($requestData);

        return redirect('pedido')->with('flash_message', 'Pedido added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $pedido = Pedido::findOrFail($id);

        return view('pedido.show', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);

        return view('pedido.edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $pedido = Pedido::findOrFail($id);
        $pedido->update($requestData);

        return redirect('pedido')->with('flash_message', 'Pedido updated!');
    }

    

    /**
     * compac 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Pedido::destroy($id);

        return redirect('pedido')->with('flash_message', 'Pedido deleted!');
 
    }

    public function nuevo()
    {
        $clientes =\App\Models\Cliente::all();
        $pizzas = \App\Models\Pizza::all();
        return view('nuevo_pedido',compact('clientes','pizzas'));
    }     
/**
 * Guarda los datos que vienen de la vista
 */
    public function guardar(Request $request )
    {
        $pedido =new Pedido();
        $idCliente=$request->input('cliente_id');
        $pizza_id =$request->input('pizza_id');
        $cantidad =$request->input('cantidad');
        //Buscamos el cliente
        $cliente=\App\Models\Cliente::findOrFail($idCliente);
        //asignamos el cliente
        $pedido->cliente_id=$idCliente;
        //$pedido->cliente()->associate($cliente);
        //asignando Direccionde envio
        $pedido->direccion_Envio=$cliente->direccion;

        //  $lp=new Linea_Pedido();
        //  $lp->pizza_id=$pizza_id;
        // $lp->cantidad=$cantidad;

        // $pedido->lineas_Pedidos()->attach($lp);
        $pedido->save();
         $pedido->lineas_Pedidos()->create(
            ["pizza_id"=>$pizza_id,
            "cantidad"=>$cantidad,
            ]
         )->save();

        //$pedido->save();

        return redirect()->route("pedidos",['id'=>$pedido->id]);
        
    }  
}
