<?php

namespace App\Repositories;

use App\Models\detalle_servicio;
use App\Repositories\BaseRepository;

/**
 * Class detalle_servicioRepository
 * @package App\Repositories
 * @version January 17, 2021, 4:55 am UTC
*/

class detalle_servicioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_servicio',
        'inicio',
        'fin',
        'asesor',
        'cliente',
        'estatus'
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
        return detalle_servicio::class;
    }
}
