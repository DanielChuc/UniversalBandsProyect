<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banda extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bandas';

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
    protected $fillable = ['cliente_id', 'codigo'];

    public function eventoPermitido()
    {
        return $this->belongsTo('App\Models\EventoPermitido');
    }
    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }
    
}
