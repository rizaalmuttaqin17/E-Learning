<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role;
use App\Repositories\BaseRepository;

/**
 * Class RolesRepository
 * @package App\Repositories
 * @version December 12, 2022, 2:40 am UTC
*/

class RolesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'guard_name'
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
        return Role::class;
    }
}
