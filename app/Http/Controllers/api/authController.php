<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Apiresource;
<<<<<<< HEAD
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
=======
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
>>>>>>> d1466008155c9fdac68c50282f68b8bdd982c6c4

class authController extends Controller
{
    public function login(Request $request)
<<<<<<< HEAD
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return new Apiresource(
                401,
                "Login Gagal",
                false
            );
        }

        $token = $user->createToken('auth-token', 
        $user->getAllPermissions()->pluck('name')->toArray())->plainTextToken;

        return new Apiresource(
            ['token' => $token],
            "Login Berhasil",
            true
        );
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Log Out Sukses',
        ]);
    }
}
=======
{
    $request->validate([
        "email" => "required|email",
        "password" => "required",
    ]);

    $user = User::where("email", $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return new Apiresource(401, "Login Gagal", false);
    }

    $token = $user->createToken('auth-token', $user->getAllPermissions()->pluck('name')->toArray())->plainTextToken;

    return new Apiresource(['token' => $token], "Login berhasil", true);
}

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return new Apiresource(
            null, "Log Out Berhasil", true
        );
    }
}
    



>>>>>>> d1466008155c9fdac68c50282f68b8bdd982c6c4
