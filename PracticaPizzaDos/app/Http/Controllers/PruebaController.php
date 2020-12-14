<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use App\Imports\InstrumentosImport;
use App\Models\Pizza;
use App\Models;





class PruebaController extends Controller
{
    //Funcion que regresa una vista
    //nombre de acceso, indicacion de que se trata de una funcion y el nombre de la funcion
     //Request es la libreria que toma informacion del navegador
        // Cuando se llame en el navegador en la url se llama asi= ?a=3&b=7
        
    public function hola(Request $r){
        $d=$this->suma($r->input('a'),$r->input('b')); 
        $clima_consultado=$this->consultar_el_clima();
        $humedad_consultado=$this->consultar_la_humedad();

        return view('hola', ['nombre'=>"Daniel",
        'edad'=>$d,
        'clima'=>$clima_consultado,
        'humedad'=>$humedad_consultado]);
    }

    public function consultar_el_clima(){
        $tiempo_de_retension=60;//minutos
        $clima = Cache::remember('clima', $tiempo_de_retension, function () {
            Log::info("Not from cache");
            $app_id = "a47d019eb812050ce9dc15aca360e5e3" ;
            $ciudad = "Mérida";
            $pais = "MX";
            $url = "https://api.openweathermap.org/data/2.5/weather?q=${ciudad},${pais},&appid=${app_id}&units=metric";
            Log::info($url);
            $client = new \GuzzleHttp\Client();
            $res = $client->get($url);
            if ($res->getStatusCode() == 200) {
                $j = $res->getBody();
                $obj = json_decode($j, true);

                $clima_actual = $obj["main"]["temp"];
            }else {
                return "error en el servicio";
            }
            return $clima_actual;
        });
        return $clima;
    }





    public function consultar_la_humedad(){
        $tiempo_de_retension=60;
        $humedad = Cache::remember('humedad', $tiempo_de_retension, function () {
            Log::info("Not from cache");
            $app_id = "a47d019eb812050ce9dc15aca360e5e3" ;
            $ciudad = "Mérida";
            $pais = "MX";
            $url = "https://api.openweathermap.org/data/2.5/weather?q=${ciudad},${pais},&appid=${app_id}&units=metric";
            Log::info($url);
            $client = new \GuzzleHttp\Client();
            $res = $client->get($url);
            if ($res->getStatusCode() == 200) {
                $j = $res->getBody();
                $obj = json_decode($j, true);

                $humedad_actual = $obj["main"]["humidity"];
            }else {
                return "error en el servicio";
            }
            return $humedad_actual;
        });
        return $humedad;
    }


    public function suma_api (Request $r){
        $a=$r->input('a');
        $b=$r->input('b');
        $resultado = $a + $b; 
        return response()->json($resultado);       
    }

    public function primerapizza (){
        $pizzaEncontrada=Pizza::findOrFail(1);
        return response()->json($pizzaEncontrada);       
    }
        // Para que se pueda llamar a un modelo se debe de hacer el uso de use App\Models\NOMBRE MODELO DEL USUARIO;


    //Suma de dos números
    // en el parentesis van las variables
    private function suma($a,$b)
    {
        return $a+$b;
    }
    //Tanto como en web como en el controlador se puede llamar desde url del navegador 
    public function parametros(Request $r,$nombre,$apellido)
    {   //Se llama la ruta en donde se le asigno el nombre por si tiene un nombre largo y complicado
       //return route()->(saludo)
         return 'Suma desde cotrolador con parametros '.$this->suma($nombre,$apellido);
    }
    
    public function pedido($id){
        $pedido= \App\Models\Pedido::findOrFail($id);// Se escribe en tinker para que pueda localizar ese objeto y para ingresar a su cliente se utiliza $pedido->cliente;
        //$pedido->cliente;
        //$pedido->lineapedido;
        return view('pedidos',  ['pedido'=>$pedido]);
    }      
   
}
