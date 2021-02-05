<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class sesion
 * @package App\Models
 * @version January 16, 2021, 2:17 am UTC
 *
 * @property string $fecha_inicio
 * @property string $fecha_final
 * @property integer $id_usuario
 */
class sesion extends Model
{
    use SoftDeletes;

    public $table = 'sesiones';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'id_sesion';

    public $fillable = [
        'fecha_inicio',
        'fecha_final',
        'id_usuario'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_sesion' => 'integer',
        'fecha_inicio' => 'datetime',
        'fecha_final' => 'datetime',
        'id_usuario' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
