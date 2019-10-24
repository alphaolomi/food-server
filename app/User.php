<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * Class User
 * @package App\Models
 * @version August 17, 2019, 10:34 am UTC
 *
 * @property string fullName
 * @property string username
 * @property string password
 * @property string email
 * @property string position
 * @property string phoneNo
 * @property string address
 */
class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;

    public $table = 'users';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'username',
        'position',
        'phoneNo',
        'address',
        'email',
        'password',

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'username' => 'string',
        'password' => 'string',
        'email' => 'string',
        'position' => 'string',
        'phoneNo' => 'string',
        'address' => 'string',
        'email_verified_at' => 'datetime',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'password' => 'required',
        'email' => 'required',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
