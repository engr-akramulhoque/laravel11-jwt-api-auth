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
        if (!Hash::check(auth('api')->user()->password, $request->password)) {
            return response()->json([
                'status' => false,
                'error' => 'You provide a incorrect password'
            ], 401);
        }
        $request->user('api')->delete();

        return response()->json([
            'status' => true,
            'message' => 'Account successfully deleted'
        ], 200);
    }
}
