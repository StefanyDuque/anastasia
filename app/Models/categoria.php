<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class categoria
 * @package App\Models
 * @version January 17, 2021, 5:01 am UTC
 *
 * @property string $nombre
 */
class categoria extends Model
{
    use SoftDeletes;

    public $table = 'categorias';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'id_categoria';

    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_categoria' => 'integer',
        'slug' => 'string',
        'nombre' => 'string',
        'categoria_padre' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
