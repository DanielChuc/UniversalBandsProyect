<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogEntrada extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'log_entradas';

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
    protected $fillable = ['cliente_id', 'evento_id', 'horaEntrada', 'fechaEntrada', 'codigoDeEntrada'];

    public function evento()
    {
        return $this->hasOne('App\Models\Evento');
    }
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente');
    }
    
}
