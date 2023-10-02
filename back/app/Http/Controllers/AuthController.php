<?php

namespace App\Http\Controllers;

use App\Trait\Shared;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    use Shared;

    public function login(Request $request)
    {
        // return $request->all();
        $credential = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        // return Auth::attempt($credential);
        if(!Auth::attempt($credential))
        {
            // return "ertyui";
            return $this->responseData("Email ou mot de passe incorrecte");
        }
        // return 'sjj';
        $user = Auth::user();
        $token = $user->createToken("token")->plainTextToken;
        $cookie = cookie("token", 1);
        setcookie("token", $token, 1);
        return $this->responseData("connexion reussie", ["token" => $token, "user" => $user], true);
    }

    public function logout(Request $request)
    {
        return $request->all();
    }

    public function register(Request $request)
    {
        return $request->all();
    }

}
