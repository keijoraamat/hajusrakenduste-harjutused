<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function verifyPassword(string $password)
    {
        $options = ['cost' => 12 ];
        $hash = password_hash("1234", PASSWORD_BCRYPT, $options);
        return password_verify($password, $hash);
    }
    public function loggIn (Request $request) {
        dd($request);
        if ($request) {
            $hasRights = true;
        }
        //return redirect('/map', $hasRights);
    }
}
