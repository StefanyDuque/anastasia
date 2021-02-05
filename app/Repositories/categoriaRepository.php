<?php

namespace App\Repositories;

use App\Models\categoria;
use App\Repositories\BaseRepository;

/**
 * Class categoriaRepository
 * @package App\Repositories
 * @version January 17, 2021, 5:01 am UTC
*/

class categoriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'slug',
        'nombre',
        'categoria_padre'
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
        return categoria::class;
    }
}
