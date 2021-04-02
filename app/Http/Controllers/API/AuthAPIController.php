<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateLoginAPIRequest;
use App\Http\Requests\API\CreateRegisterAPIRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;


/**
 * Class LoginController
 * @package App\Http\Controllers\API\Mobile
 */
class AuthAPIController extends AppBaseController
{

    /**
     *  Login.
     * GET|HEAD /logins
     *
     * @param CreateLoginAPIRequest $request
     * @return Response
     * @throws ValidationException
     */
    public function login(CreateLoginAPIRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // todo clear old tokens
        // $user->tokens->each->delete();

        return $this->sendResponse(
            array_merge($user->toArray(),['token' => $user->createToken($user->email)->plainTextToken]),
            'Logged in successfully '
        );
    }

    /**
     *  Register,Create User.
     * GET|HEAD /register
     *
     * @param CreateRegisterAPIRequest $request
     * @return Response
     */
    public function register(CreateRegisterAPIRequest $request)
    {
        $data = $request->all();
        //        event(new Registered($user = $this->create($request->all())));
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        //        return $user->createToken($user->email)->plainTextToken;
        return $this->sendResponse(
            array_merge($user->toArray(),['token' => $user->createToken($user->email)->plainTextToken]),
            'Registered successfully '
        );
    }

    public function logout(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->tokens->each->delete();
        return $this->sendSuccess('Logged out successfully');
    }
}
