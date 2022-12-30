<?php

namespace App\Repositories;

use App\Models\Jawaban;
use App\Repositories\BaseRepository;

/**
 * Class JawabanRepository
 * @package App\Repositories
 * @version December 12, 2022, 12:07 am UTC
*/

class JawabanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_pilihan',
        'id_soal',
        'id_user',
        'jawaban',
        'nilai_jwb'
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
        return Jawaban::class;
    }
}
