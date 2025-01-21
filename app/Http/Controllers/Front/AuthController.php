<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'password' => bcrypt($request->input('password')),
            ]);
            return response()->json([
                'Message' => 'Registered successfully',
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'Error' => $ex->getMessage(),
            ], 401);
        }
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            // Check if the user exists
            $user = User::where('email', $credentials['email'])->first();
            if (! $user) {
                return response()->json([
                    'Error' => 'User does not exist',
                ], 404);
            }
            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'Error' => 'Invalid Credentials',
                ], 401);
            }
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            $cookie = cookie('jwt', $token, 60 * 24);
            return response()->json([
                'Message' => 'Logged in successfully',
                'token' => $token,
            ], 200)->withCookie('cookie');
        } catch (Exception $ex) {
            return response()->json([
                'Error' => $ex->getMessage(),
            ], Response::HTTP_UNAUTHORIZED);
        }
    }
}