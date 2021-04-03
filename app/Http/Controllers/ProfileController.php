<?php

namespace App\Http\Controllers;

use App\Events\ChangePassword;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laracasts\Flash\Flash;

class ProfileController extends Controller
{

    public function show()
    {
        return view('profile.show', [
            'activities' => Auth::user()->actions
        ]);
    }


    public function changePassword(ChangePasswordRequest $request)
    {
        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        Flash::success('Changed password successfully.');
        event(new ChangePassword(auth()->user()));
        return back();
    }

    public function billing()
    {
        return view('profile.billing');
    }

}
