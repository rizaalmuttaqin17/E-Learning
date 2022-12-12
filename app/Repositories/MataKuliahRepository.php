<?php

namespace App\Repositories;

use App\Models\MataKuliah;
use App\Repositories\BaseRepository;

/**
 * Class MataKuliahRepository
 * @package App\Repositories
 * @version December 12, 2022, 12:02 am UTC
*/

class MataKuliahRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_mk',
        'nama',
        'dosen_pengampu'
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
        return MataKuliah::class;
    }
}
