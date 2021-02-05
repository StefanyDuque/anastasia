<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class producto
 * @package App\Models
 * @version January 17, 2021, 5:12 am UTC
 *
 * @property string $nombre
 * @property string $marca
 * @property number $precio
 * @property integer $stock
 * @property integer $stock_anual
 */
class producto extends Model
{
    use SoftDeletes;

    public $table = 'productos';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'codigo';

    public $fillable = [
        'nombre',
        'marca',
        'precio',
        'stock',
        'stock_anual'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'codigo' => 'integer',
        'SKU' => 'string',
        'nombre' => 'string',
        'marca' => 'string',
        'precio' => 'double',
        'stock' => 'integer',
        'stock_anual' => 'integer',
        'categoria' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
