<?php

namespace App\Repositories;

use App\Models\usuario;
use App\Repositories\BaseRepository;

/**
 * Class usuarioRepository
 * @package App\Repositories
 * @version January 17, 2021, 4:05 am UTC
*/

class usuarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'username',
        'nombre',
        'apellido',
        'identificacion',
        'telefono',
        'correo',
        'estatus',
        'rol',
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
        return usuario::class;
    }
}
