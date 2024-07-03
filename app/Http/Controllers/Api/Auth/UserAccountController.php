<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;

class UserAccountController extends Controller
{
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        return response()->json([
            'status' => true,
            'data' => auth('api')->user()
        ], 200);
    }
}
