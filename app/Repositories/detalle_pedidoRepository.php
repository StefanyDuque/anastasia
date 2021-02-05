<?php

namespace App\Repositories;

use App\Models\detalle_pedido;
use App\Repositories\BaseRepository;

/**
 * Class detalle_pedidoRepository
 * @package App\Repositories
 * @version January 17, 2021, 5:25 am UTC
*/

class detalle_pedidoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_pedido',
        'codigo_producto',
        'cantidad',
        'fecha',
        'vendedor',
        'descuento',
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
        return detalle_pedido::class;
    }
}
