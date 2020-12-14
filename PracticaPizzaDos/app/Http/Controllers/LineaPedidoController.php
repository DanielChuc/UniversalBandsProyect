<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\LineaPedido;
use Illuminate\Http\Request;

class LineaPedidoController extends Controller
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
            $lineapedido = LineaPedido::where('pizza_id', 'LIKE', "%$keyword%")
                ->orWhere('pedido_id', 'LIKE', "%$keyword%")
                ->orWhere('cantidad', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $lineapedido = LineaPedido::latest()->paginate($perPage);
        }

        return view('linea-pedido.index', compact('lineapedido'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('linea-pedido.create');
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
        
        LineaPedido::create($requestData);

        return redirect('linea-pedido')->with('flash_message', 'LineaPedido added!');
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
        $lineapedido = LineaPedido::findOrFail($id);

        return view('linea-pedido.show', compact('lineapedido'));
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
        $lineapedido = LineaPedido::findOrFail($id);

        return view('linea-pedido.edit', compact('lineapedido'));
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
        
        $lineapedido = LineaPedido::findOrFail($id);
        $lineapedido->update($requestData);

        return redirect('linea-pedido')->with('flash_message', 'LineaPedido updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        LineaPedido::destroy($id);

        return redirect('linea-pedido')->with('flash_message', 'LineaPedido deleted!');
    }
}
