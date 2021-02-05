<?php

namespace App\Repositories;

use App\Models\sesion;
use App\Repositories\BaseRepository;

/**
 * Class sesionRepository
 * @package App\Repositories
 * @version January 16, 2021, 2:17 am UTC
*/

class sesionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha_inicio',
        'fecha_final',
        'id_usuario'
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
        return sesion::class;
    }
}
