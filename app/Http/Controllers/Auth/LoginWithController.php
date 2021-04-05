<?php

namespace App\Http\Controllers\Auth;

use App\Events\Auth\RegisteredViaProvider;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginWithController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepo;

    /**
     * Create a new controller instance.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('guest')->except('logout');
        $this->userRepo = $userRepository;
    }

    /**
     * Redirect the user to the GitHub authentication page.
     * @param $provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback($provider)
    {
        $userSocial = Socialite::driver($provider)->user();
        $data = [
            'name' => $userSocial->getName(),
            'email' => $userSocial->getEmail(),
            'image' => $userSocial->getAvatar(),
            'provider_id' => $userSocial->getId(),
            'provider' => $provider,
            'provider_token' => $userSocial->token,
            'provider_refreshToken' => $userSocial->refreshToken, // not always provided
            'provider_expiresIn' => $userSocial->expiresIn,
            'password' => null
        ];

        $user = $this->userRepo->first('email', $data['email']);

        if ($user) {
            Auth::login($user);
            toast('Welcome back, ' . $data['name'],'success');
            return redirect()->route('dashboard');

        } else {
            $user = $this->userRepo->create($data);
            Auth::login($user);
            event(new RegisteredViaProvider($user, $provider));
            toast('Welcome, ' . $userSocial->getName(),'success');
            return redirect()->route('dashboard');
        }
    }
}
