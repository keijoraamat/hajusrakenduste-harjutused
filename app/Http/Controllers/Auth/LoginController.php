<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function verifyPassword(string $password)
    {
        $options = ['cost' => 12 ];
        $hash = password_hash("1234", PASSWORD_BCRYPT, $options);
        return password_verify($password, $hash);
    }
    public function logIn (Request $request) {
        $hasRights = false;
        if ($this->verifyPassword($request->password)){
            $hasRights = true;
        }
        return redirect('/map', $hasRights);
    }
}
