<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'eventos';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'direccion', 'descripcion', 'pais', 'ciudad', 'fechas', 'capacidad_Lugares', 'lugares_Disponibles', 'categoria_id'];

    public function eventoPermitido()
    {
        return $this->belongsTo('App\Models\EventoPermitido');
    }
    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }
    public function logentrada()
    {
        return $this->belongsTo('App\Models\LogEntrada');
    }
    
}
