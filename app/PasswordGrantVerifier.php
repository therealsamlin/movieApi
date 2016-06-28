<?php
/**
 * Created by PhpStorm.
 * User: samlin
 * Date: 25/06/2016
 * Time: 11:59 PM
 */

namespace App;

use Illuminate\Support\Facades\Auth;

class PasswordGrantVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }

}