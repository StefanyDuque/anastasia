<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class Login extends Controller
{
    function init(Request $request){
        $credentials = $request->only('usuario', 'password');

        if (User::attempt($credentials)) {
            // Authentication passed...
            return Response()->json(USer::get());
        }
    }
}
