<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpdatePasswordRequest;

class UpdatePasswordController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdatePasswordRequest $request)
    {
        $request->user('api')->update(['password' => bcrypt($request->password)]);

        return response()->json([
            'status' => true,
            'message' => 'Password successfully updated'
        ], 200);
    }
}
