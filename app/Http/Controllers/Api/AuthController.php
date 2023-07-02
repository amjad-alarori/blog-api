<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Authenticate the user and return a JWT token.
     */
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if ($token = Auth::guard('api')->attempt($credentials)) {
            return response()->json([
                'access' => $token,
                'refresh' => '', // Optionally, you can implement refresh tokens as well
            ]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
