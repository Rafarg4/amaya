<?php

namespace App\Repositories;

use App\Models\Fuero;
use App\Repositories\BaseRepository;

/**
 * Class FueroRepository
 * @package App\Repositories
 * @version March 4, 2023, 3:52 pm -03
*/

class FueroRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre_fuero',
        'descripcion_fuero'
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
        return Fuero::class;
    }
}
