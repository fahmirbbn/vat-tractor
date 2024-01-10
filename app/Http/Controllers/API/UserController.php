<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validation logic for registration
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User registered successfully',
            'data' => $user,
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized',
                'data' => [],
            ], 401);
        }

        $user = Auth::user(); // Use Auth::user() to get the authenticated user

        // Generate and return the Bearer token
        $token = $user->createToken('authToken')->accessToken;

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'token' => [
                'access_token' => $token,
                'token_type' => 'Bearer',
                'expires_at' => $user->tokens->first()->expires_at, // Include the token expiration time if needed
            ],
            'data' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'status' => true,
            'message' => 'User logged out successfully',
            'data' => [],
        ]);
    }
}
