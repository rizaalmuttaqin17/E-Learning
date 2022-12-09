<?php

namespace App\Repositories;

use App\Models\ProgramStudi;
use App\Repositories\BaseRepository;

/**
 * Class ProgramStudiRepository
 * @package App\Repositories
 * @version December 9, 2022, 7:17 am UTC
*/

class ProgramStudiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_fakultas',
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
        return ProgramStudi::class;
    }
}
