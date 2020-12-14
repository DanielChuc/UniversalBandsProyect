<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clientes';

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
    protected $fillable = ['nombre', 'email', 'direccion', 'pais', 'ciudad', 'codigoPostal', 'telefono'];

    public function pedido()
    {
        return $this->hasMany('App\Models\Pedido');
    }
    
}
