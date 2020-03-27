<?php

namespace App\Repositories;

use App\Models\Food;
use App\Repositories\BaseRepository;

/**
 * Class FoodRepository
 * @package App\Repositories
 * @version March 27, 2020, 9:28 pm UTC
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
