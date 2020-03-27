<?php

namespace App\Repositories;

use App\Models\Login;
use App\Repositories\BaseRepository;

/**
 * Class LoginRepository
 * @package App\Repositories
 * @version March 27, 2020, 9:46 pm UTC
*/

class LoginRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email',
        'password'
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
        return Login::class;
    }
}
