<?php

namespace App\Models;

use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Food
 * @package App\Models
 * @version January 11, 2020, 12:43 am UTC
 *
 * @property string title
 * @property string subTitle
 * @property string info
 * @property number price
 * @property integer rating
 */
class Food extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasMediaTrait;
    use SoftDeletes;

    public $table = 'foods';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


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
