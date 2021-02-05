<?php

namespace App\Repositories;

use App\Models\producto;
use App\Repositories\BaseRepository;

/**
 * Class productoRepository
 * @package App\Repositories
 * @version January 17, 2021, 5:12 am UTC
*/

class productoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'SKU',
        'nombre',
        'marca',
        'precio',
        'descripcion',
        'stock',
        'stock_anual',
        'categoria',
        'created_at',
        'updated_at'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return producto::class;
    }
}
