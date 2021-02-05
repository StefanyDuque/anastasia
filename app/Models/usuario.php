<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class usuario
 * @package App\Models
 * @version January 17, 2021, 4:05 am UTC
 *
 * @property string $username
 * @property string $nombre
 * @property string $apellido
 * @property integer $rol
 */
class usuario extends Model
{
    use SoftDeletes;

    public $table = 'usuarios';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'id_usuario';

    public $fillable = [
        'username',
        'password',
        'nombre',
        'apellido',
        'identificacion',
        'telefono',
        'correo',
        'fecha_nacimiento',
        'estatus',
        'rol'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_usuario' => 'integer',
        'username' => 'string',
        'password' => 'string',
        'nombre' => 'string',
        'apellido' => 'string',
        'identificacion' => 'integer',
        'telefono' => 'integer',
        'correo' => 'string',
        'fecha_nacimiento' => 'date',
        'estatus' => 'integer',
        'rol' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
