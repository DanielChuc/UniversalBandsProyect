<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use App\Imports\InstrumentosImport;
use App\Models\Entrada;
use App\Models;





class PruebaController extends Controller
{
   

        public function banda ($id,$id2){
            $banda= \App\Models\Banda::findOrFail($id);
            $evento= \App\Models\Evento::findOrFail($id2);
            $evento->id;
            $banda->codigo;
            return view('permitidos',  ['banda'=>$banda,'evento'=>$evento]);
        }   


        public function Evento (){
           
            $evento= \App\Models\Evento::all();
            return view('elegirEvento' , ['evento'=>$evento]);
        } 

        
        
           
    }
