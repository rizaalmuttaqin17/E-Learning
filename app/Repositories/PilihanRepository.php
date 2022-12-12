<?php

namespace App\Repositories;

use App\Models\Pilihan;
use App\Repositories\BaseRepository;

/**
 * Class PilihanRepository
 * @package App\Repositories
 * @version December 12, 2022, 12:00 am UTC
*/

class PilihanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_soal',
        'pilihan',
        'benar',
        'nilai'
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
        return Pilihan::class;
    }
}
