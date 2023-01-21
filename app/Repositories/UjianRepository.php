<?php

namespace App\Repositories;

use App\Models\Ujian;
use App\Repositories\BaseRepository;

/**
 * Class UjianRepository
 * @package App\Repositories
 * @version December 12, 2022, 12:01 am UTC
*/

class UjianRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_mata_kuliah',
        'id_user',
        'kode',
        'nama',
        'start',
        'end',
        'jml_pg',
        'jml_essay',
        'percobaan',
        'status',
        'nilai',
        'durasi'
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
        return Ujian::class;
    }
}
