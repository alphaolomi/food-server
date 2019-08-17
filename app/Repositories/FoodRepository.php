<?php

namespace App\Repositories;

use App\Models\Food;

/**
 * Class FoodRepository
 * @package App\Repositories
 * @version August 9, 2019, 7:53 pm UTC
 */
class FoodRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image',
        'title',
        'subTitle',
        'thumbnail',
        'price',
        'comments',
        'rating',
        'description',
        'showHome'
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
