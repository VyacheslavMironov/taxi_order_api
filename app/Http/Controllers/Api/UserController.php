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
        $user->code = '';
        $user->fio = $request->fio;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->rating = $request->rating;
        $user->role = $request->role;
        $user->save();
        return $user;
    }

    public function get_code(string $phone)
    {
        $code = '000000';
        $user = User::where('phone', $phone)->first();
        $user->code = $code;
        $user->save();
        return $user;
    }

    public function signIn(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();
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
