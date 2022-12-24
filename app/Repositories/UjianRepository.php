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
        'tipe_ujian',
        'sifat_ujian',
        'tanggal_ujian',
        'percobaan',
        'jumlah_soal',
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
