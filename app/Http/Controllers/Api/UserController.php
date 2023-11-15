<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function signUp(Request $request)
    {
        $user = new User();
        $user->fio = $request->fio;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->rating = $request->rating;
        $user->role = $request->role;
        $user->save();
        return $user;
    }

    public function signIn(Request $request, User $user)
    {
        if ($user->code == $request->code)
        {
            return [
                "user" => $user,
                "token" => User::createBearerToken($user)
            ];
        }
    }

    public function logout(User $user)
    {
        return User::deleteBearerToken($user);
    }
}
