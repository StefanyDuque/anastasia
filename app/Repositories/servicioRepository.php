<?php

namespace App\Repositories;

use App\Models\servicio;
use App\Repositories\BaseRepository;

/**
 * Class servicioRepository
 * @package App\Repositories
 * @version January 17, 2021, 4:41 am UTC
*/

class servicioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion',
        'tipo',
        'valor',
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
        return servicio::class;
    }
}
