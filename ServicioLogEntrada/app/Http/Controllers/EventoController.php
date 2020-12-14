<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
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
            $evento = Evento::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('direccion', 'LIKE', "%$keyword%")
                ->orWhere('descripcion', 'LIKE', "%$keyword%")
                ->orWhere('pais', 'LIKE', "%$keyword%")
                ->orWhere('ciudad', 'LIKE', "%$keyword%")
                ->orWhere('fechas', 'LIKE', "%$keyword%")
                ->orWhere('capacidad_Lugares', 'LIKE', "%$keyword%")
                ->orWhere('lugares_Disponibles', 'LIKE', "%$keyword%")
                ->orWhere('categoria_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $evento = Evento::latest()->paginate($perPage);
        }

        return view('evento.index', compact('evento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('evento.create');
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
        $this->validate($request, [
			'nombre' => 'required|min:5',
			'direccion' => 'required|min:5',
			'pais' => 'required|min:5',
			'ciudad' => 'required|min:5',
			'direccion' => 'required|min:5'
		]);
        $requestData = $request->all();
        
        Evento::create($requestData);

        return redirect('evento')->with('flash_message', 'Evento added!');
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
        $evento = Evento::findOrFail($id);

        return view('evento.show', compact('evento'));
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
        $evento = Evento::findOrFail($id);

        return view('evento.edit', compact('evento'));
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
        $this->validate($request, [
			'nombre' => 'required|min:5',
			'direccion' => 'required|min:5',
			'pais' => 'required|min:5',
			'ciudad' => 'required|min:5',
			'direccion' => 'required|min:5'
		]);
        $requestData = $request->all();
        
        $evento = Evento::findOrFail($id);
        $evento->update($requestData);

        return redirect('evento')->with('flash_message', 'Evento updated!');
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
        Evento::destroy($id);

        return redirect('evento')->with('flash_message', 'Evento deleted!');
    }


      
  
}
