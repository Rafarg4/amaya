<?php

namespace App\Repositories;

use App\Models\Seguiminto;
use App\Repositories\BaseRepository;

/**
 * Class SeguimintoRepository
 * @package App\Repositories
 * @version March 4, 2023, 4:12 pm -03
*/

class SeguimintoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
        'fecha'
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
        return Seguiminto::class;
    }
}
