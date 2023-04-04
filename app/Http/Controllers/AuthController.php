<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = request(['email', 'password']);
        if (!auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'The given data was invalid. Please check your credentials and try again.',
                'errors' => [
                    'credentials' => [
                        'Invalid credentials',
                    ],
                ],
            ], 422);
        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('user-token', [
            'post.show',
            'post.create',
            'post.update'
        ])->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ];

        if ($request->wantsJson()) {
            return response()->json($request->user());
        }

        return response($response, 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();
        auth()->guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // return response()->json([
        //     'message' => 'Logged out | Token destroyed',
        //     'token' => 'null',
        // ]);

        if ($request->wantsJson()) {
            return response()->noContent();
        }

        return redirect('/');
    }
}
