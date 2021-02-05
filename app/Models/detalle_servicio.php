<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class detalle_servicio
 * @package App\Models
 * @version January 17, 2021, 4:55 am UTC
 *
 * @property string $inicio
 * @property string $fin
 */
class detalle_servicio extends Model
{
    use SoftDeletes;

    public $table = 'detalle_servicios';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'id_detalle_servicio';

    public $fillable = [
        'inicio',
        'fin'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_detalle_servicio' => 'integer',
        'id_servicio' => 'integer',
        'inicio' => 'datetime',
        'fin' => 'datetime',
        'asesor' => 'integer',
        'cliente' => 'integer',
        'estatus' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
