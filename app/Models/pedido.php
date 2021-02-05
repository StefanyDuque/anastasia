<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class pedido
 * @package App\Models
 * @version January 17, 2021, 5:18 am UTC
 *
 * @property string $fecha
 * @property integer $items
 * @property number $total
 */
class pedido extends Model
{
    use SoftDeletes;

    public $table = 'pedidos';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'id_pedido';

    public $fillable = [
        'fecha',
        'items',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_pedido' => 'integer',
        'fecha' => 'datetime',
        'fecha_envio' => 'datetime',
        'comprador' => 'integer',
        'estatus' => 'integer',
        'items' => 'integer',
        'total' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
