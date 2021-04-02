<?php

namespace App\Models;


use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *  * Class Food
 * @package App\Models
 * @version January 11, 2020, 12:43 am UTC
 *
 * @property string title
 * @property string subTitle
 * @property string info
 * @property number price
 * @property integer rating
 *
 * @SWG\Definition(
 *      definition="Food",
 *      required={"title", "subTitle", "info", "price", "rating"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="title",
 *          description="title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="subTitle",
 *          description="subTitle",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="info",
 *          description="info",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="price",
 *          description="price",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="rating",
 *          description="rating",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="deleted_at",
 *          description="deleted_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Food extends Model
{
    use SoftDeletes;

    public $table = 'foods';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'subTitle',
        'info',
        'price',
        'rating'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'subTitle' => 'string',
        'info' => 'string',
        'price' => 'float',
        'rating' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'subTitle' => 'required',
        'info' => 'required',
        'price' => 'required',
        'rating' => 'required'
    ];


}
