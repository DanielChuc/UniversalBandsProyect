<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pedidos';

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
    protected $fillable = ['cliente_id', 'direccion_Envio'];

    public function lineas_Pedidos()
    {
        return $this->hasMany('App\Models\LineaPedido');
    }
    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }
    
}
