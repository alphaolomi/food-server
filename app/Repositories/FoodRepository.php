<?php

namespace App\Repositories;

use App\Models\Food;
use App\Repositories\BaseRepository;

/**
 * Class FoodRepository
 * @package App\Repositories
 * @version January 11, 2020, 12:43 am UTC
*/

class FoodRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'subTitle',
        'info',
        'price',
        'rating'
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
        return Food::class;
    }
}
