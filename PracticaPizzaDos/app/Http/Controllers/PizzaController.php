<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
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
            $pizza = Pizza::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('precio', 'LIKE', "%$keyword%")
                ->orWhere('descripcion', 'LIKE', "%$keyword%")
                ->orWhere('ingredientes', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pizza = Pizza::latest()->paginate($perPage);
        }

        return view('pizza.index', compact('pizza'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pizza.create');
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
			
		]);
        $requestData = $request->all();
        
        Pizza::create($requestData);

        return redirect('pizza')->with('flash_message', 'Pizza added!');
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
        $pizza = Pizza::findOrFail($id);

        return view('pizza.show', compact('pizza'));
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
        $pizza = Pizza::findOrFail($id);

        return view('pizza.edit', compact('pizza'));
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
			'direccion' => 'required|min:5'
		]);
        $requestData = $request->all();
        
        $pizza = Pizza::findOrFail($id);
        $pizza->update($requestData);

        return redirect('pizza')->with('flash_message', 'Pizza updated!');
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
        Pizza::destroy($id);

        return redirect('pizza')->with('flash_message', 'Pizza deleted!');
    }
}
