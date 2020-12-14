<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Banda;
use Illuminate\Http\Request;
use App\Models\Cliente;

use DB;

class BandaController extends Controller
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
            $banda = Banda::where('cliente_id', 'LIKE', "%$keyword%")
                ->orWhere('codigo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $banda = Banda::latest()->paginate($perPage);
        }

        return view('banda.index', compact('banda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('banda.create');
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
			'codigo' => 'required|min:10'
		]);
        $requestData = $request->all();
        
        Banda::create($requestData);

        return redirect('banda')->with('flash_message', 'Banda added!');
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
        $banda = Banda::findOrFail($id);

        return view('banda.show', compact('banda'));
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
        $banda = Banda::findOrFail($id);

        return view('banda.edit', compact('banda'));
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
			'codigo' => 'required|min:10'
		]);
        $requestData = $request->all();
        
        $banda = Banda::findOrFail($id);
        $banda->update($requestData);

        return redirect('banda')->with('flash_message', 'Banda updated!');
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
        Banda::destroy($id);

        return redirect('banda')->with('flash_message', 'Banda deleted!');
    }


 


    

  /**
      * Regresa la vista para poder seleccionar los datos
      */

      public function nuevo()
      {
          $clientes = \App\Models\Cliente::all();
          $eventos = \App\Models\Evento::all();

          return view('verificarcodigo',compact('clientes','eventos'));
      }
  
  
      /**
       * Guarda los datos que vienen de la vista
  */
      public function guardar(Request $request)
  {
      $bandas = new \App\Models\Banda();
      $evpe = new \App\Models\EventoPermitido();

      $idCliente=$request->input('cliente_id');
      $evento_id=$request->input('evento_id');
      $banda_id=$request->input('codigo');

      $cliente=\App\Models\Cliente::findOrFail($idCliente);

      /**
       * Asignamos el cliente
       */
      $bandas->cliente_id=$idCliente;
      $bandas->codigo=$banda_id;
      $bandas->save();

      $evpe->banda_id=$bandas->id;
      $evpe->evento_id=$evento_id;
      $evpe->save();

 
          return redirect()->route('bandas',['id'=>$bandas->id,'id2'=>$evpe->evento_id]);

  }



   /**
    * Consultas de validacion 
    */
            public function validar($id)
            {
                $evento = \App\Models\Evento::findOrFail($id);
                $cliente = new Cliente();
                $codigo = "";
                $valido = 0;

             return view('pase', compact('cliente','codigo','valido','evento'));
            
            }
            public function analizar( $id, Request $request){

                $codigo=$request->input('codigo');
                $evento = \App\Models\Evento::findOrFail($id);


                $data= DB::table('evento_permitidos')
                ->join('bandas', 'evento_permitidos.banda_id', '=', 'bandas.id'
                    
                 )
                    ->where('bandas.codigo', '=', $codigo)
                    ->where('evento_permitidos.evento_id', '=', $id)
                 ->first();  
                 $valido = 1;

                 if ($data != null) {
                $banda = \App\Models\Banda::findOrFail($data->banda_id);
                $cliente = $banda->cliente;

                    $valido = 2;

                 }else{
                     $cliente = new Cliente();
                 }
                return view('pase', compact('cliente','codigo','valido','evento'));

                    
          
        }  

              

}
