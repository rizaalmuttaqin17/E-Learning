<?php

namespace App\Repositories;

use App\Models\Kategori;
use App\Repositories\BaseRepository;

/**
 * Class KategoriRepository
 * @package App\Repositories
 * @version December 11, 2022, 11:58 pm UTC
*/

class KategoriRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'slug',
        'deskripsi',
        'photos',
        'is_active'
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
        return Kategori::class;
    }
}
