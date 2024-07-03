<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\DeleteAccountRequest;
use Illuminate\Support\Facades\Hash;

class DeleteAccountController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DeleteAccountRequest $request)
    {
        // Retrieve the authenticated user
        $user = auth('api')->user();

        // Check if the provided password matches the stored hashed password
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'error' => 'You provided an incorrect password'
            ], 401);
        }

        $request->user('api')->delete();

        return response()->json([
            'status' => true,
            'message' => 'Account successfully deleted'
        ], 200);
    }
}
