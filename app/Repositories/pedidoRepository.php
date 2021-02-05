<?php

namespace App\Repositories;

use App\Models\pedido;
use App\Repositories\BaseRepository;

/**
 * Class pedidoRepository
 * @package App\Repositories
 * @version January 17, 2021, 5:18 am UTC
*/

class pedidoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha',
        'direccion',
        'fecha_envio',
        'comprador',
        'estatus',
        'items',
        'total'
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
        return pedido::class;
    }
}
