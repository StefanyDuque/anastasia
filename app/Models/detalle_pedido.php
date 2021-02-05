<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class detalle_pedido
 * @package App\Models
 * @version January 17, 2021, 5:25 am UTC
 *
 * @property integer $codigo_producto
 * @property integer $cantidad
 * @property string $fecha
 */
class detalle_pedido extends Model
{
    use SoftDeletes;

    public $table = 'detalle_pedidos';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'id_detalle_pedido';

    public $fillable = [
        'codigo_producto',
        'cantidad',
        'fecha'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_detalle_pedido' => 'integer',
        'id_pedido' => 'integer',
        'codigo_producto' => 'integer',
        'cantidad' => 'integer',
        'fecha' => 'datetime',
        'vendedor' => 'integer',
        'descuento' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
