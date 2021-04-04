<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Organisation;
use App\Repositories\BaseRepository;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version November 9, 2020, 3:30 pm UTC
 */

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token'
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


    //* @return \Illuminate\Database\Eloquent\Model
    /**
     * Create model record
     * @param $input
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public function create($input)
    {

        $org = Organisation::create([]);
        $input['organisation_id'] = $org->id;
        $input['password'] = $input['password'] ?? Hash::make($input['password']);

        $model = $this->model->newInstance($input);
        $model->save();

        $model->assignRole('user');

        activity('auth')
                ->withProperties(['ip' => request()->ip(), 'agent' => request()->header('user-agent')])
                ->causedBy(auth()->user())->log('You have registered using password');


        return $model;
    }

    /**
     *
     */
    public function first($key, $value)
    {
        $query = $this->model->newQuery();

        return  $query->where($key, $value)->first();
    }
}
