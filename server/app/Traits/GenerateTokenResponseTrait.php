<?php

namespace App\Traits;

trait GenerateTokenResponseTrait
{
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token, $request): array
    {
        return response()->json([
            'status' => true,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $request->user()->factory()->getTTL() * 60
        ]);
    }
}
