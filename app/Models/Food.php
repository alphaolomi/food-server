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
 * @version January 11, 2020, 12:31 am UTC
 *
 * @property string image
 * @property string title
 * @property string subTitle
 * @property string thumbnail
 * @property integer price
 * @property integer comments
 * @property integer rating
 * @property string description
 * @property boolean showHome
 */
class Food extends Model
{
    use \OwenIt\Auditing\Auditable;
    use HasMediaTrait;
    use SoftDeletes;

    public $table = 'foods';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'image' => 'string',
        'title' => 'string',
        'subTitle' => 'string',
        'thumbnail' => 'string',
        'price' => 'integer',
        'comments' => 'integer',
        'rating' => 'integer',
        'description' => 'string',
        'showHome' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'image' => 'required',
        'title' => 'required',
        'subTitle' => 'required',
        'thumbnail' => 'required',
        'price' => 'required',
        'comments' => 'required',
        'rating' => 'required',
        'description' => 'required',
        'showHome' => 'required'
    ];


}
