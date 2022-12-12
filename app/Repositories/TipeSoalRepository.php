<?php

namespace App\Repositories;

use App\Models\TipeSoal;
use App\Repositories\BaseRepository;

/**
 * Class TipeSoalRepository
 * @package App\Repositories
 * @version December 11, 2022, 11:54 pm UTC
*/

class TipeSoalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama'
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
        return TipeSoal::class;
    }
}
