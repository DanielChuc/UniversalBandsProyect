<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\EventoPermitido;
use Illuminate\Http\Request;

class EventoPermitidoController extends Controller
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
            $eventopermitido = EventoPermitido::where('evento_id', 'LIKE', "%$keyword%")
                ->orWhere('banda_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $eventopermitido = EventoPermitido::latest()->paginate($perPage);
        }

        return view('evento-permitido.index', compact('eventopermitido'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('evento-permitido.create');
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
        
        EventoPermitido::create($requestData);

        return redirect('evento-permitido')->with('flash_message', 'EventoPermitido added!');
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
        $eventopermitido = EventoPermitido::findOrFail($id);

        return view('evento-permitido.show', compact('eventopermitido'));
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
        $eventopermitido = EventoPermitido::findOrFail($id);

        return view('evento-permitido.edit', compact('eventopermitido'));
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
        
        $eventopermitido = EventoPermitido::findOrFail($id);
        $eventopermitido->update($requestData);

        return redirect('evento-permitido')->with('flash_message', 'EventoPermitido updated!');
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
        EventoPermitido::destroy($id);

        return redirect('evento-permitido')->with('flash_message', 'EventoPermitido deleted!');
    }


}
