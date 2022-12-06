<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version June 20, 2022, 5:59 am UTC
*/

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_prodi',
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'nim_nip',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'telepon',
        'jenis_kelamin',
        'foto',
        'agama'
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
        return User::class;
    }
}
