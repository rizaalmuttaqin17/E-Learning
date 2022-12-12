<?php

namespace App\Repositories;

use App\Models\Soal;
use App\Repositories\BaseRepository;

/**
 * Class SoalRepository
 * @package App\Repositories
 * @version December 12, 2022, 12:00 am UTC
*/

class SoalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_ujian',
        'id_tipe_soal',
        'pertanyaan',
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
        return Soal::class;
    }
}
