<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class servicio
 * @package App\Models
 * @version January 17, 2021, 4:41 am UTC
 *
 * @property string $nombre
 * @property string $tipo
 * @property number $valor
 */
class servicio extends Model
{
    use SoftDeletes;

    public $table = 'servicios';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'id_servicio';

    public $fillable = [
        'nombre',
        'tipo',
        'valor'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_servicio' => 'integer',
        'nombre' => 'string',
        'tipo' => 'string',
        'valor' => 'double',
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
