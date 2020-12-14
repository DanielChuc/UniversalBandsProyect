<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventoPermitido extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'evento_permitidos';

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
    protected $fillable = ['evento_id', 'banda_id'];

    public function evento()
    {
        return $this->hasOne('App\Models\Evento');
    }
    public function banda()
    {
        return $this->hasOne('App\Models\Banda');
    }

 
   
    
}
