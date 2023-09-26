<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function updatePassword(UpdateUserPasswordRequest $request) {
        $user = auth()->user();

        if (!Hash::check($request->password_old, $user->password)) {
            return response()->json([
                'message' => 'The current password is incorrect. Please try again.',
                'errors' => [
                    'password_old' => [
                        'Incorrect password'
                    ]
                ],
            ], 422);
        }

        $user->password = bcrypt($request->password);
        $user->save();

        $response = [
            'user' => $user,
            'message' => 'Password updated successfully.'
        ];

        return response($response, 201);
    }
}
