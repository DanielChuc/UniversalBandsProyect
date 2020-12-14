<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\LogEntrada;
use Illuminate\Http\Request;

class LogEntradaController extends Controller
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
            $logentrada = LogEntrada::where('cliente_id', 'LIKE', "%$keyword%")
                ->orWhere('evento_id', 'LIKE', "%$keyword%")
                ->orWhere('horaEntrada', 'LIKE', "%$keyword%")
                ->orWhere('fechaEntrada', 'LIKE', "%$keyword%")
                ->orWhere('codigoDeEntrada', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $logentrada = LogEntrada::latest()->paginate($perPage);
        }

        return view('log-entrada.index', compact('logentrada'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('log-entrada.create');
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
        
        LogEntrada::create($requestData);

        return redirect('log-entrada')->with('flash_message', 'LogEntrada added!');
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
        $logentrada = LogEntrada::findOrFail($id);

        return view('log-entrada.show', compact('logentrada'));
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
        $logentrada = LogEntrada::findOrFail($id);

        return view('log-entrada.edit', compact('logentrada'));
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
        
        $logentrada = LogEntrada::findOrFail($id);
        $logentrada->update($requestData);

        return redirect('log-entrada')->with('flash_message', 'LogEntrada updated!');
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
        LogEntrada::destroy($id);

        return redirect('log-entrada')->with('flash_message', 'LogEntrada deleted!');
    }
}
