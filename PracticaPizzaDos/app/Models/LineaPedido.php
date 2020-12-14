<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LineaPedido extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'linea_pedidos';

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
    protected $fillable = ['pizza_id', 'pedido_id', 'cantidad'];

    public function pizza()
    {
        return $this->belongsTo('App\Models\Pizza');
    }
    public function pedido()
    {
        return $this->belongsTo('App\Models\Pedido');
    }
    
}
