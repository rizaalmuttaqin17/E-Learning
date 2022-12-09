<?php

namespace App\Repositories;

use App\Models\Fakultas;
use App\Repositories\BaseRepository;

/**
 * Class FakultasRepository
 * @package App\Repositories
 * @version December 9, 2022, 6:46 am UTC
*/

class FakultasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode',
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
        return Fakultas::class;
    }
}
